<?php

namespace App\Http\Controllers;

use App\Client;
use ImgInt;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
class ClientController extends Controller
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
    public function store(ClientRequest $request)
    {
        $client = new Client;
        $client->title = $request->title;
        $client->name = $request->name;
        $client->company = $request->company;
        if ($request->file('image')) {
          $image = $request->file('image');
          $imagename = time().$image->hashname();
          $image->storeAs('public/images/clients/originals/', $imagename);
          $thumbnail = ImgInt::make($image)->resize(100,100)->save();
          Storage::put('public/images/clients/thumbnails/'.$imagename, $thumbnail);
          $client->image = $imagename;          
        } 
        
        $client->save();
        $request->session()->flash('success', 'Client Successfully Added !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::find($id);   
      return view('admin.lists.cards.editclient',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
      $client = Client::find($id);
      $client->title = $request->title;
      $client->name = $request->name;
      $client->company = $request->company;
      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        if($client->image!='01.jpg' && $client->image!='02.jpg' && $client->image!='03.jpg'){
          Storage::delete(['public/images/clients/thumbnails/'.$client->image,'public/images/clients/originals/'.$client->image]);
        }
        $image->storeAs('public/images/clients/originals/', $imagename);
        $thumbnail = ImgInt::make($image)->resize(100,100)->save();
        Storage::put('public/images/clients/thumbnails/'.$imagename, $thumbnail);
        $client->image = $imagename;          
      } 
      
      $client->save();
      $request->session()->flash('success', 'Client Successfully Updated !');
      return redirect('/admin/list/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id) 
    {
        $client = Client::find($id);        
        $client->delete();
        $request->session()->flash('success','Client Successfully Deleted ! ');
        return redirect('/admin/list/clients');
    }
}
