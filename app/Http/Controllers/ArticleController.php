<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;
use Storage;
use ImgInt;
use Auth;

class ArticleController extends Controller
{

  public function search(Request $request){
    
    $tagmatch = Tag::where('name',$request->search)->get()->first()->id;
    dd($tagmatch);
    $results = Article::where('tags_id',$tagmatch)->get();
    $results->save();
    return redirect('/search/result');

  }
    public function addComment(CommentRequest $request, $id){
      

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' =>  'bail|required|max:150',        
        'image' => 'image',
        'preview' => 'bail|required|max:350',
        'content' => 'bail|required|max:999'
      ]);
      $article = new Article;
      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();        
        $image->storeAs('public/images/articles/originals', $imagename);
        $resized = ImgInt::make($image)->resize(730,262)->save();
        Storage::put('public/images/articles/'.$imagename, $resized);
        $article->image = $imagename;
      } else {
        $article->image = 'blog-1.jpg';
      }
      $article->name= $request->name;
      $article->users_id = Auth::user()->id;
      $article->preview= $request->preview;
      $article->content= $request->content;

      if (Auth::user()->roles_id == 1) {
        $article->valid = true;
      }
 
     // ********  TAGS ********
 
      // $tags = Tag::all();
 
     // *** New Tags ***
     
    //   for ($i=0; $i<10;$i++) {
 
    //   $NTI='newtag'.$i;
    //  // if "New Tag" Input has a value
    //   if ($request->$NTI) {
    //      $match=false;
    //      // check if that tag already exists
    //      foreach ($tags as $tag) {
    //        if ($tag->name == $request->$NTI) {
    //          $match= true;
    //          $newtag= $tag;
    //          $newtag->save();
    //        }
    //       }

    //        // If it doesn't, create new one
    //        if ($match==false) { 
    //        $newtag= new Tag;
    //        $newtag->name = $request->$NTI; 
    //        if (Auth::user()->roles_id==1) {         
    //          $newtag->valid=true;
    //         }
    //         $newtag->save();
    //       }
    //       // Link the new Tag to the Article.
    //       $article->tags()->attach($newtag);           
    //       $article->save();
    //   }
    // }
  
 
     // ******** CATEGORIES ********
 
  //    $categories= Category::all();
 
  //    //  *** New Categories ***
 
  //    for ($i=0;$i<10;$i++) {
       
  //      $NCI = 'newcategory'.$i;
     
  //    // if "New Category" Input has a value
  //    if ($request->$NCI) {
  //      $match=false;
  //      // check if that category already exists
  //      foreach ($categories as $category) {
  //        if ($category->name == $request->$NCI) {
  //          $match = true;
  //          $newcat = $category;
  //          $newcat->save();
  //        }
  //      }
 
  //      // If it doesn't exist,
  //      if ($match==false) { 
  //        // create new category
  //        $newcat= new Category;
  //        $newcat->name = $request->$NCI;
  //        if (Auth::user()->roles_id==1) {
  //          $newcat->valid=true;
  //        }
  //        $newcat->save();
  //      }
 
  //      $linked=false;
  //      // Check if tag isn't already linked to Article
  //      foreach ($article->categories as $category) {
  //        if ($category->name == $newcat->name) {
  //          $linked = true;
  //        }
  //      }
  //      // If it isn't
  //      if ($linked==false) {
  //        //  attach new category to the article
  //      $article->categories()->attach($newcat);
  //      $article->save();
  //      }  
  //    }
  //  }
   
      $article->save();
      $request->session()->flash('success','Article Successfully Updated ! ');
      return redirect()->back();  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
     $article = Article::find($id);
     if ($request->file('image')) {       
       $image = $request->file('image');
       $imagename = time().$image->hashname();
       if($article->image!='blog-1.jpg' && $article->image!='blog-2.jpg' && $article->image!='blog-3.jpg'){
         Storage::delete(['public/images/articles/originals/'.$article->image,'public/images/articles/'.$article->image]);
        }
       $image->storeAs('public/images/articles/originals', $imagename);
       $resized = ImgInt::make($image)->resize(730,262)->save();
       Storage::put('public/images/articles/'.$imagename, $resized);
       $article->image = $imagename;
     }
     $article->name= $request->name;
     $article->preview= $request->preview;
     $article->content= $request->content;
     if($request->valid==1){       
       $article->valid = true;
     } else if( $request->valid==0){
       $article->valid = false;
     }

    // ********  TAGS ********

     $tags = Tag::all();


    // *** Current Tags ***

     foreach ($article->tags as $tag){
       // Find input ID + Value (=newname)
      $tagID=$tag->id;
      $specTag='tag'.$tagID;
      $oldmatch=false;
      // Detach Previous Tag        
      $article->tags()->detach($tag);

      // If Newname already exists
      foreach ($tags as $item){
        if ($item->name==$request->$specTag) {
          $oldmatch=true;  
          // Attach New One
          $article->tags()->attach($item);
          $article->save();
        }
      }
      // If Newname doesn't exist
      if ($oldmatch==false){
        // If Input isn't Empty
        if($request->$specTag!=null){
          // Create new One  
          $newOldTag = new Tag;      
          $newOldTag->name = $request->$specTag;
          if(Auth::user()->roles_id==1) {
            $newOldTag->valid=true;            
          }
          $newOldTag->save();
          $article->tags()->attach($newOldTag);          
        }
      }
     }

    // *** New Tags ***
    //  $i=0;
    //  ET ALORS ON VIENT CHERCHER DE L'INSPIRATION CHEZ LES AUTRES ?
    //  c'EST QUI LE PATRON ?
     for ($i=0; $i<10;$i++){

     $NTI='newtag'.$i;
    // if "New Tag" Input has a value
     if ($request->$NTI) {
        $match=false;
        // check if that tag already exists
        foreach ($tags as $tag) {
          if ($tag->name == $request->$NTI) {
            $match= true;
            $newtag= $tag;
            $newtag->save();
          }
        }
        
        // If it doesn't, create new one
        if ($match==false) { 
          $newtag= new Tag;
          $newtag->name = $request->$NTI; 
          if (Auth::user()->roles_id==1) {         
            $newtag->valid=true;
          }
          $newtag->save();
        }

        $linked=false;
        // Check if tag isn't already linked to Article
        foreach ($article->tags as $tag) {
          if ($tag->name == $newtag->name) {
            $linked=true;
          }
        }
        // If it isn't
        if ($linked==false){
          // Link the new Tag to the Article.
          $article->tags()->attach($newtag);
          $article->save();
        }
      }
    }

    // ******** CATEGORIES ********

    $categories= Category::all();


    // *** Current Categories ***
    foreach ($article->categories as $category){
      // Find Category ID + Value (=Newname)
      $catID=$category->id;
      $specCat='category'.$catID;
      $oldmatch=false;
      // Detach Previous Category
      $article->categories()->detach($category);
      
      // If Newname already Exists
      foreach ($categories as $item) {
        if ($item->name==$request->$specCat) {
          $oldmatch=true;
          // Attach new one
          $article->categories()->attach($item);
          $article->save();
        }
      }
      // If Newname doesn't exist
      if ($oldmatch==false) {
        // & If Input isn't Empty
        if ($request->$specCat!=null) {
          // Create new One
          $newOldCat = new Category;
          $newOldCat->name = $request->$specCat;
          if (Auth::user()->roles_id==1) {
            $newOldCat->valid = true;
          }
          $newOldCat->save();
          $article->categories()->attach($newOldCat);
        }
      }                   
    }

    //  *** New Categories ***

    for ($i=0;$i<10;$i++) {
      
      $NCI = 'newcategory'.$i;
    
    // if "New Category" Input has a value
    if ($request->$NCI) {
      $match=false;
      // check if that category already exists
      foreach ($categories as $category) {
        if ($category->name == $request->$NCI) {
          $match = true;
          $newcat = $category;
          $newcat->save();
        }
      }

      // If it doesn't exist,
      if ($match==false) { 
        // create new category
        $newcat= new Category;
        $newcat->name = $request->$NCI;
        if (Auth::user()->roles_id==1) {
          $newcat->valid=true;
        }
        $newcat->save();
      }

      $linked=false;
      // Check if tag isn't already linked to Article
      foreach ($article->categories as $category) {
        if ($category->name == $newcat->name) {
          $linked = true;
        }
      }
      // If it isn't
      if ($linked==false) {
        //  attach new category to the article
      $article->categories()->attach($newcat);
      $article->save();
      }  
    }
  }
  
     $article->save();
     $request->session()->flash('success','Article Successfully Updated ! ');
     return redirect()->back();   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $article= Article::find($id);
        if($article->image!='blog-1.jpg' && $article->image!='blog-2.jpg' && $article->image!='blog-3.jpg'){
        Storage::delete(['public/images/articles/originals/'.$article->image,'public/images/articles/'.$article->image]);
        }
        $article->delete();
        $request->session()->flash('success','Article Successfully Deleted ! ');
        return redirect()->back();
    }
}
