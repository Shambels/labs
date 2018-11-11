<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Storage;
use ImgInt;


class ProjectController extends Controller
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
    public function store(ProjectRequest $request)
    { 
      $project = new Project;
      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        if ($project->image!='card-1.jpg' && $project->image!='card-2.jpg' && $project->image!='card-3.jpg'){
          Storage::delete(['public/images/projects/thumbnails/'.$project->image,'public/images/projects/originals/'.$project->image,'public/images/projects/mediums/'.$project->image,]);
        }
        $image->storeAs('public/images/projects/originals/', $imagename);
        $resized = ImgInt::make($image)->resize(350,260)->save();
        Storage::put('public/images/projects/mediums/'.$imagename, $resized);
        $thumbnail = ImgInt::make($image)->resize(100,100)->save();
        Storage::put('public/images/projects/thumbnails/'.$imagename, $thumbnail);
        $project->image = $imagename; 
      }

      $project->name = $request->name;
      $project->content = $request->content;
      $project->save();
      $request->session()->flash('success', 'Project Successfully Created !');
      return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
      $project = Project::find($id);
      
      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        if ($project->image!='card-1.jpg' && $project->image!='card-2.jpg' && $project->image!='card-3.jpg'){
        Storage::delete(['public/images/projects/thumbnails/'.$project->image,'public/images/projects/originals/'.$project->image,'public/images/projects/mediums/'.$project->image,]);
        }
        $image->storeAs('public/images/projects/originals/', $imagename);
        $resized = ImgInt::make($image)->resize(350,253)->save();
        Storage::put('public/images/projects/mediums/'.$imagename, $resized);
        $thumbnail = ImgInt::make($image)->resize(100,100)->save();
        Storage::put('public/images/projects/thumbnails/'.$imagename, $thumbnail);
        $project->image = $imagename; 
      }

      $project->name = $request->name;
      $project->content = $request->content;
      $project->save();
      $request->session()->flash('success', 'Project Successfully Updated !');
      return redirect()->back();

    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $project = Project::find($id);
        if ($project->image!='card-1.jpg' && $project->image!='card-2.jpg' && $project->image!='card-3.jpg'){
          Storage::delete(['public/images/projects/thumbnails/'.$project->image,'public/images/projects/originals/'.$project->image,'public/images/projects/mediums/'.$project->image,]);
          }        
        $project->delete();
        $request->session()->flash('success', 'Project Successfully Deleted !');
        return redirect()->back();
    }
}
