<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Storage;
use ImgInt;

class ArticleController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
       Storage::delete(['public/images/articles/originals/'.$article->image,'public/images/articles/'.$article->image]);
       $image->storeAs('public/images/articles/originals', $imagename);
       $resized = ImgInt::make($image)->resize(730,262)->save();
       Storage::put('public/images/articles/'.$imagename, $resized);
       $article->image = $imagename;
     }
     $article->name= $request->name;
     $article->preview= $request->preview;
     $article->content= $request->content;
     foreach ($article->tags as $tag){
      $tagID=$tag->id;
      $specTag='tag'.$tagID;
      $tag->name = $request->$specTag;
      if($tag->name!=null){
        $tag->save();
      } else {
        $tag->delete();
      }
     }
     if($request->newtag){
        $newtag= new Tag;
        $newtag->name = $request->newtag;
        $newtag->save();
        $article->tags()->attach($newtag);
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
        Storage::delete(['public/images/articles/originals/'.$article->image,'public/images/articles/'.$article->image]);
        $article->delete();
        $request->session()->flash('success','Article Successfully Deleted ! ');
        return redirect()->back();
    }
}
