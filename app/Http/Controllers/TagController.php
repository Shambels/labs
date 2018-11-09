<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Auth;

class TagController extends Controller
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
    public function store(CategoryRequest $request)
    {
      $tag= new Tag;
      $tag->name = $request->name;
      if(Auth::user()->id==1){
        $tag->valid=true;
      }
      $tag->save();
      $request->session()->flash('success', 'Category Successfully Created !');
      return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view ('admin.lists.cards.edittag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)
    {
      $tag= Tag::find($id);
      $tag->name = $request->name;
      if($request->valid==1){
        $tag->valid=true;
      } else {
        $tag->valid=false;
      }
      $tag->save();
      $request->session()->flash('success', 'Tag Successfully Updated !');
      if (\Request::is('admin/edit/tag/*')) {           
        return redirect('/admin/list/tags');
        } else {
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
      $tag = Tag::find($id);
      $tag->delete();
      $request->session()->flash('success', 'Tag Successfully Deleted !');
      return redirect()->back();
    }
}
