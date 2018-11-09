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
    $user = User::onlyTrashed()->find($id);
    $user->restore();
    $comments = Comment::onlyTrashed()->where('users_id',$id)->get();
    foreach ($comments as $comment){      
      $comment->restore();
    }
    $articles = Article::onlyTrashed()->where('users_id',$id)->get();
    foreach ($articles as $article){      
      $article->restore();
    }
    $request->session()->flash('success', 'User Successfully Restored !');
    return redirect()->back();        
  }

  public function services () {
    $services = Service::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.services', compact('services'));
  } 
  
  public function restoreService(Request $request, $id) {
    $service = Service::find($id);
    $service->restore();    
    $request->session()->flash('success', 'Restore Successfully Restored !');
    return redirect()->back();      
  }
  public function projects () {
    $projects = Project::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.projects', compact('projects'));
  }
  
  public function restoreProject(Request $request, $id) {
    $project = Project::find($id);
    $project->restore();
    $request->session()->flash('success', 'Project Successfully Restored !');
    return redirect()->back();      
  }

  public function articles () {
    $articles = Article::onlyTrashed()->paginate(20);    
    return view('admin.lists.trash.articles', compact('articles'));
  }
  
  public function trashedUserArticles($id){
    $articles = Article::onlyTrashed()->where('users_id',$id)->paginate(20);    
    return view('admin.lists.trash.articles', compact('articles'));
  }

  public function restoreArticle(Request $request, $id) {
    $article = Article::onlyTrashed()->find($id);
    $article->restore();
    $request->session()->flash('success', 'Article Successfully Restored !');
    return redirect()->back();      
  }
  public function comments () {
    $comments = Icon::onlyTrashed()->paginate(20);
    return view('admin.lists.trash.comments', compact('comments'));
  }
  
  public function restoreComment(Request $request, $id) {
    $comment = Comment::find($id);
    $comment->restore();
    $request->session()->flash('success', 'Comment Successfully Restored !');
    return redirect()->back();      
  }
}
