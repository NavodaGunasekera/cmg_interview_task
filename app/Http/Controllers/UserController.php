<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemUser;

class UserController extends Controller
{
    //
    public function userCreateUI(){

        return view('/users/create');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'fname' => 'required',
            'email' => 'required|unique:system_users|max:255|email',
            'password' => 'required',
           
        ]);

        $data = new SystemUser();
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->save();

        return back()->with('success','user create successfully');

    }

    public function index(){

        $users = SystemUser::all();

        return view('/users/index',compact('users'));
    }

    public function edit($id){

        $user = SystemUser::find($id);

        return view('/users/edit',compact('user'));

    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'fname' => 'required',
            'password' => 'required',
           
        ]);

        $user  = SystemUser::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();

        return redirect('/')->with('success','user details update successfully');
    }

    public function delete($id){

        $user  = SystemUser::find($id);
        $user->delete();
        
        return back()->with('success','user delete successfully');
    }
}
