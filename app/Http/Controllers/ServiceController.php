<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ButtonRequest;
use App\Service;
use App\Text;
use App\Image;
use Storage;
use ImgInt;

class ServiceController extends Controller
{
   
    public function title(TitleRequest $request){
      $text = Text::find(1);
      $text->services = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }
    
    public function title2(TitleRequest $request){
      $text = Text::find(1);
      $text->services2 = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }

    public function browseServices2(ButtonRequest $request){
      $text= Text::find(1);
      $text->browseservices2 = $request->buttontext;
      $text->save();
      $request->session()->flash('success', 'Button Text Successfully Updated !');
      return redirect()->back();
    }

    public function phone(Request $request){
      $this->validate($request, [
        'image' => 'image'
      ]);

      $phone=Image::where('folder','services')->first();
      if ($request->file('image')){
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        if ($phone->name!='device.png'){
          Storage::delete(['public/images/services/originals/'.$phone->name,'public/images/services/'.$phone->name]);
          $image->storeAs('public/images/services/originals', $imagename);
          $resized = ImgInt::make($image)->resize(240,490)->save();
          Storage::put('public/images/services/'.$imagename, $resized);
          $phone->name= $imagename;
          $request->session()->flash('success', 'Image Successfully Updated');
        } 

      } else {
        $request->session()->flash('success', 'No Image Selected');
      }
      return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request) {
      $this->validate($request, [
        'name' => 'bail|required|max:100',
        'content' => 'bail|required|max:250',
      ]);
      $service = new Service;
      $service->name = $request->name;
      $service->content = $request->content;
      $service->icons_id= $request->icon;
      $service->save();
      $request->session()->flash('success', 'Service Card Successfully Created !');
      return redirect()->back();       


    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'bail|required|max:100',
          'content' => 'bail|required|max:250',
        ]);
        $service = Service::find($id);
        $service->name = $request->name;
        $service->content = $request->content;
        $service->icons_id= $request->icon;
        $service->save();
        $request->session()->flash('success', 'Service Card Successfully Updated !');
        return redirect()->back();            
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
      $service = Service::find($id)->delete();
      $request->session()->flash('success', 'Service Card Successfully Deleted !');
      return redirect()->back();
    }
}
