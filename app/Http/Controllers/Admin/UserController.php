<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Admin\UserFormRequest;

use App\User;
use App\Role;

use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::searchAndPaginate();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    public function store(UserFormRequest $request)
    {
        $rules = [
            'password' => 'required|max:255|confirmed',
            'password_confirmation' => 'required'
        ];

        $request->validate($rules);

        $request['password'] = Hash::make($request->password);
        $role = $request->role;
        unset($request['role']);

        $user = User::create($request->all());
        $user->assignRole($role);

        $message = ['type' => 'success', 'text' => 'Usuario agregado correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserFormRequest $request, User $user)
    {
        $rules = [
            'password' => 'required|max:255|confirmed',
            'password_confirmation' => 'required'
        ];
        
        if ($request->password != null) {
            $request->validate($rules);
            $request['password'] = Hash::make($request->password);
        } else {
            $request['password'] = $user->password;
        }

        $role = $request->role;
        unset($request['role']);

        isset($user->roles[0]['name']) ? $user->removeRole($user->roles[0]['name']) : "";

        $user->update($request->all());
        $user->assignRole($role);

        $message = ['type' => 'success', 'text' => 'Usuario actualizado correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
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
