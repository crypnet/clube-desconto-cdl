<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreate;
use App\Repositories\PermissionRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct(
        PermissionRepository $permissionRepository,
        Request $request
    )
    {
        $this->permissionRepository = $permissionRepository;
        $this->request= $request;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionRepository->paginate(15);
        return view('panel.permission.index')->with(compact([
            'permissions',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.permission.create');
    }

    public function store(PermissionCreate $request)
    {
        $validated = $request->validated();
        $this->permissionRepository->create($this->value($request));
        flash("Salvo Com Sucesso")->success()->important();

        return redirect()->route('permision.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = config('roles.models.defaultUser')::find(Auth()->user()->id);
        if ($user->hasPermission('permision.edit')) {
            try {
                $permission = $this->permissionRepository->where('id', $id)->first();
            } catch (ModelNotFoundException $e) {
                flash(trans('panel.text.not_found_f', ['value' => trans('panel.text.permission')]))->error()->important();
                return redirect()->route('permissions.index');
            }
            return view('panel.permission.edit')->with(compact([
                'permission',
            ]));
        }
        return redirect()->route('forbidden');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionCreate $request, $id)
    {
        $validated = $request->validated();
        $this->permissionRepository->update($this->value($request),$id);
        return redirect()->route('permision.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = config('roles.models.defaultUser')::find(Auth()->user()->id);
        if ($user->hasPermission('permision.destroy')) {
            $this->permissionRepository->delete($id);
            return redirect()->route('permision.index');
        }
        return redirect()->route('forbidden');
    }

    private function value(Request $request){
        return [
            "name" =>$request->input('display_name'),
            "slug"=>$request->input('name'),
            "description"=>$request->input('description'),
        ];
    }
}
