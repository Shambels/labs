<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Storage;
use ImgInt;

class UserController extends Controller
{
    public function index() {

      $users = User::with('role')->where('roles_id', '!=','1')->get();
      return view('admin/users/index', compact('users'));

    }


    public function create() {

      return view('admin/users/create');

    }

    public function store(StoreUser $request){

      $user= new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->roles_id = $request->role;
      if ($request->image) {
        // $user->image = ImgInt::make('resize')->imageStore($request->image, 'thumbnail', 100,100);
      }
      $user->save();
      return redirect()->route('users.index')->with([
        'status' => 'success',
        'message' => 'User created successfully'
      ]);
    }

    public function edit(User $user) {

      return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUser $request, User $user){
      $user->name = $request->name;
      $user->email= $request->email;
      $user->password = $request->password;
      $user->roles_id = $request->role;
      if ($request->image) {
        // CODE : DElETE PREVIOUS IMAGE
        $user->image = ImgInt::make('resize')->imageStore($request->image, 'thumbnail', 100,100);
      }
      $user->save();
      return redirect()->route('users.index')->with([
        'status' => 'success',
        'message' => 'User updated successfully'
      ]);
    }

    public function delete(User $user) {
      //  CODE : DELETE IMAGE (FILE)
      $user->delete();
      return redirect()->route('users.index')->with([
        'status' => 'success',
        'message' => 'User deleted successfully'
      ]);
    }
}
