<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Route;

class CategoryController extends Controller
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

    public function edit($id) {
      $category = Category::find($id);
      return view ('admin.lists.cards.editcategory', compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
      $category= new Category;
      $category->name = $request->name;
      if(Auth::user()->id==1){
        $category->valid=true;
      }      
      $category->save();
      $request->session()->flash('success', 'Category Successfully Created !');
      return redirect()->back(); 
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $category= Category::find($id);
        $category->name = $request->name;      
        if ($request->valid == 1 ){
          $category->valid=true;
        } else if ($request->valid == 0 ) {
          $category->valid=false;
        }
        $category->save();
        $request->session()->flash('success', 'Category Successfully Updated !');
        if (\Request::is('admin/edit/category/*')) {           
          return redirect('/admin/list/categories');
          } else {
            return redirect()->back();
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash('success', 'Category Successfully Deleted !');
        return redirect()->back();

    }
}
