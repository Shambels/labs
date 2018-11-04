<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Storage;
use ImgInt;

class InstagramController extends Controller
{
    public function update(Request $request, $id){
      $this->validate($request,[
        'name' => 'image'
      ]);
      $instagram= Image::find($id);
      if ($request->file('image')){
        $image= $request->file('image');
        $imagename = time().$image->hashname();
        Storage::delete(['public/images/instagram/'.$instagram->name,'public/images/instagram/thumbnails/'.$instagram->name]);
        $image->storeAs('public/images/instagram/', $imagename);
        $thumbnail = ImgInt::make($image)->resize(109,109)->save();
        Storage::put('public/images/instagram/thumbnails/'.$imagename, $thumbnail);
        $instagram->name= $imagename;

      }
      $instagram->save();
      $request->session()->flash('success', 'Image Successfully Updated !');
      return redirect()->back();
    }

    public function delete(Request $request, $id){
      $instagram = Image::find($id);
      Storage::delete(['public/images/instagram/'.$instagram->name,'public/images/instagram/thumbnails/'.$instagram->name]);
      $instagram->delete();
      $request->session()->flash('success', 'Image Successfully Deleted !');
      return redirect()->back();


    }
}
