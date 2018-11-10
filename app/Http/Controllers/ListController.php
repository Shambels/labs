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
use App\Category;
use App\Tag;
use App\Testimonial;
use App\Client;
use App\Comment;
use App\Newsmail;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;


class ListController extends Controller
{

  // USERS
    public function users(){
      $admin = User::with('articles','comments')->where('roles_id',1)->first(); 
      $team = User::where('roles_id',2)->get(); 
      $users = User::where('roles_id',3)->orderBy('created_at','desc')->paginate(15);
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

    public function newsletter() {
      $newsmails = Newsmail::orderBy('created_at','desc')->paginate(20);
      return view('admin.lists.mails.newsletter',compact('newsmails'));
    }

    public function inbox() {
      $emails = Email::orderBy('created_at','desc')->paginate(20);
      return view ('admin.lists.mails.inbox',compact('emails'));
    }


    public function testimonials() {
      $testimonials = Testimonial::with('clients')->orderBy('created_at','desc')->paginate(20);
      // dd($testimonials);
      return view('admin.lists.testimonials',compact('testimonials'));
    }
    
    public function clients() {
      $clients = Client::orderBy('created_at','desc')->paginate(10);
      return view('admin.lists.clients',compact('clients'));
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

    public function categories() {
      $categories = Category::orderBy('valid','asc')->paginate(20);      
      return view ('admin.lists.categories', compact('categories'));
    }
    public function tags() {
      $tags = Tag::paginate(25);
      return view ('admin.lists.tags', compact('tags'));
    }


    public function articles () {
      $text= Text::find(1);
      $articles = Article::orderBy('created_at','desc')->paginate(5);
      $categories = Category::take(7)->get();      
      $tags= Tag::take(12)->get();            
      return view('admin.lists.articles', compact('articles','text','categories','tags'));
    }

    public function comments() {
      $comments = Comment::paginate(25);
      return view('admin.lists.comments', compact('comments'));
    }
    public function icons () {
      $icons = Icon::all();
      return view('admin.lists.icons', compact('icons'));
    }

    public function search(Request $request){
      $search = $request->search;
      return redirect('/admin/list/articles/results/'.$search);
    }

    public  function results($search,Request $request){
      $allarticles = Article::with('users','comments','tags')->orderBy('created_at','desc')->get();
    
      $tagmatch = Tag::where('name',$search)->first();
      $categorymatch = Category::where('name',$search)->first();
      $results= collect([]);
      // dd($tagmatch);
      // dd($categorymatch);
      
      foreach ($allarticles as $article) {
        // NAME Search
        if (preg_match('/\b'.$search.'\b/i', $article->name)) {
          if(!$results->contains($article)){
            $results->push($article);       
          }      
        }
        // TAGS Search
        if($tagmatch){
          foreach ($article->tags as $tag) {
            if ($tag->name==$tagmatch->name) {
              if(!$results->contains($article)){
                $results->push($article);                
              }
            }
          }
        }
        // CATEGORY Search
        if($categorymatch){
          foreach ($article->categories as $category) {
            if($category->name==$categorymatch->name) {
              if(!$results->contains($article)) {
                $results->push($article);          
              }
            }
          }
        }
      }
      
      // Collection Pagination Fix
       $currentPage = LengthAwarePaginator::resolveCurrentPage();
       $perPage = 5;
       $currentPageItems = $results->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
       $paginatedItems= new LengthAwarePaginator($currentPageItems , count($results), $perPage);
       $paginatedItems->setPath($request->url());
      $results->sortByDesc('created_at');
      $text = Text::find(1);
      $categories = Category::all();
      $tags = Tag::all();          
      // Article::orderBy('created_at');
      return view ('admin/lists/blogsearch',['results' => $paginatedItems], compact('text','articles','categories','tags','tagmatch','search'));
    }

}
