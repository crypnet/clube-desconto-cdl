<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function __construct(
        Request $request,
        UserRepository $userRepository,
         RoleRepository $role_repository
    )
    {
        $this->request= $request;
        $this->userRepository = $userRepository;
        $this->role_repository = $role_repository;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = config('roles.models.defaultUser')::find(Auth()->user()->id);
        $users = $this->userRepository->paginate(15);
        return view('panel.user.index')->with(compact([
            'users',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role_repository->getRoles();

        return view('panel.user.create')->with(compact([
            'roles',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreate $request)
    {
        $validated = $request->validated();
        $user = config('roles.models.defaultUser')::create($this->values($request, 'store'));
        $user->attachRole($request->input('role'));
        flash(trans('panel.text.store_success_m', ['value' => trans('panel.text.user')]))->success()->important();

        return redirect()->route('users.index');
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
    {
        try {
            $user = $this->userRepository->where('id', $id)->first();
        } catch (ModelNotFoundException $e) {
            flash(trans('panel.text.not_found_f', ['value' => trans('panel.text.permission')]))->error()->important();

            return redirect()->route('permissions.index');
        }
        $roles = $this->role_repository->getRoles();
        return view('panel.user.edit')->with(compact([
            'user',
            'roles',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $validated = $request->validated();
        $user = config('roles.models.defaultUser')::find($id);
        $user->detachAllRoles();
        $this->userRepository->deleteById($id);
        $userf = config('roles.models.defaultUser')::create($this->values($request, 'store'));
        $userf->attachRole($request->input('role'));
        flash(trans('panel.text.update_success_m', ['value' => trans('panel.text.user')]))->success()->important();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->deleteById($id);

        flash(trans('panel.text.destroy_success_m', ['value' => trans('panel.text.user')]))->success()->important();

        return redirect()->route('users.index');
    }

    public function values($request, $type)
    {
        $values = [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
        ];
        if ($type == 'store') {
            $values['password'] = bcrypt($request->input('password'));
            $values['password_confirmation'] = bcrypt($request->input('password_confirmation'));
        } elseif (!is_null($request->input('password'))) {
            $values['password'] = bcrypt($request->input('password'));
            $values['password_confirmation'] = bcrypt($request->input('password_confirmation'));
        }
        return $values;
    }
}
