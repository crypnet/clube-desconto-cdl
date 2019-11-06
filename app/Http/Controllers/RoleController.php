<?php

namespace App\Http\Controllers;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(
        Request $request,
        PermissionRepository $permission_repository,
        RoleRepository $role_repository
    )
    {
        $this->request= $request;
        $this->role_repository = $role_repository;
        $this->permission_repository = $permission_repository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role_repository->paginate(15);
        return view('panel.role.index')->with(compact([
            'roles',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {try {
        $role = $this->role_repository->where('id', $id)->first();
    } catch (ModelNotFoundException $e) {
        flash(trans('panel.text.not_found_f', ['value' => trans('panel.text.permission')]))->error()->important();

        return redirect()->route('permissions.index');
    }
        $permissions = $this->permission_repository->all();
        $role_permissions = $this->permission_repository->getRolePermissionsArray($id);
        return view('panel.role.edit')->with(compact([
            'role',
            'permissions',
            'role_permissions',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
