<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Project;
use App\Article;
use App\Icon;

class ListController extends Controller
{
    public function users(){
      $users = User::all();
      return view('admin.lists.users', compact('users'));
    }

    public function services () {
      $services = Service::all();
      return view('admin.lists.services', compact('services'));
    } 
    public function projects () {
      $projects = Project::all();
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
