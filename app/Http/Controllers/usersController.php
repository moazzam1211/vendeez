<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{

    function usersData(){
        return view('/usersView');
    }
    function show()
    {
        $data = User::where('role_id', '!=', 3)->orWhere('role_id', null)->orderBy('id')->paginate(5);
        return view('usersView', ['users' => $data]);
    }
    function edit($id)
    {
        $data = User::find($id);
        $roles = $this->roles();
        return view('/updateUser', ['data' => $data, 'roles' => $roles]);
    }
    function update($id, Request $request)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role_id = $request->role;
        $data->update();
        return redirect('/users');
    }
    function roles(){
        return Role::all();
    }
    function userCheck(){

    }
    function UserSearch(Request $request)
    {
        $data = User::where('role_id','!=', 3)->where('name', 'like', '%' . $request->search . "%")->paginate(6);
        return view('usersView', ['users' => $data]);
    }
}
