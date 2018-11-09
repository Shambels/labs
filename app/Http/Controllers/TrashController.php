<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Project;
use App\Article;
use App\Icon;
use App\Comment;

class TrashController extends Controller
{
  public function users(){
    $users = User::onlyTrashed()->orderBy('roles_id','asc')->paginate(20);
    return view('admin.lists.trash.users', compact('users'));
    
  }
  
  public function restoreUser(Request $request, $id) {
    $user = User::withTrashed()->find($id);
    $user->restore();
    $comments = Comment::withTrashed()->where('users_id',$id)->get();
    foreach ($comments as $comment){      
      $comment->restore();
    }
    $articles = Article::withTrashed()->where('users_id',$id)->get();
    foreach ($articles as $article){      
      $article->restore();
    }
    $request->session()->flash('success', 'Successfully Restored !');
    return redirect()->back();        
  }

  public function services () {
    $services = Service::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.services', compact('services'));
  } 
  
  public function restoreService(Request $request, $id) {
    $service = Service::find($id);
    $service->restore();    
    $request->session()->flash('success', 'Successfully Restored !');
    return redirect();      
  }
  public function projects () {
    $projects = Project::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.projects', compact('projects'));
  }
  
  public function restoreProject(Request $request, $id) {
    $project = Project::find($id);
    $project->restore();
    $request->session()->flash('success', 'Successfully Restored !');
    return redirect();      
  }

  public function articles () {
    $articles = Article::onlyTrashed()->paginate(20);    
    return view('admin.lists.trash.articles', compact('articles'));
  }
  
  public function trashedUserArticles($id){
    $articles = Article::withTrashed()->where('users_id',$id)->paginate(20);    
    return view('admin.lists.trash.articles', compact('articles'));
  }

  public function restoreArticle(Request $request, $id) {
    $article = Article::find($id);
    $article->restore();
    $request->session()->flash('success', 'Successfully Restored !');
    return redirect();      
  }
  public function icons () {
    $icons = Icon::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.icons', compact('icons'));
  }
  
  public function restoreIcon(Request $request, $id) {
    $icon = Icon::find($id);
    $icon->restore();
    $request->session()->flash('success', 'Successfully Restored !');
    return redirect();      
  }
}
