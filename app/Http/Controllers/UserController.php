<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
      $users = User::with('role')->where('roles_id', '!=','1')->get();
      return view('admin/users/create');
    }
}
