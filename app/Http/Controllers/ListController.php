<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Project;
use App\Article;
use App\Icon;
use App\Text;
use App\Image;
use Auth;


class ListController extends Controller
{

  // USERS
    public function users(){
      $admin = User::with('articles','comments')->where('roles_id',1)->first(); 
      $team = User::where('roles_id',2)->get(); 
      $users = User::where('roles_id',3)->orderBy('created_at','desc')->get();
      // dd($users);
      return view('admin.lists.users', compact('admin','team','users'));
    }

    public function userArticles($id){
      $user= User::find($id);
      return view('admin.lists.userarticles',compact('user'));
    }

    public function userComments($id){
      $user= User::find($id);
      return view('admin.lists.usercomments',compact('user'));
    }

    // SERVICES
    public function services () {      
      // $text= Text::find(1);      
      $services = Service::paginate(9);      
      $icons = Icon::all();
      return view('admin.lists.services', compact('services','icons','text'));
    } 

    // PROJECTS
    public function projects () {
      $projects = Project::paginate(3);
      return view('admin.lists.projects', compact('projects'));
    }

    public function articles () {
      $articles = Article::all();
      return view('admin.lists.articles', compact('articles'));
    }
    public function icons () {
      $icons = Icon::all();
      return view('admin.lists.icons', compact('icons'));
    }
}
