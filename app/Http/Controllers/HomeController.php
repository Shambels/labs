<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ParagraphRequest;
use App\Http\Requests\ButtonRequest;
use App\Text;
use App\Service;
use App\Icon;
use App\Testimonial;
use App\Image;
use Storage;
use ImgInt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function logo(Request $request) {
      $this->validate($request, [
        'image' => 'nullable|image'
      ]);
      $logo = Image::where('folder','logo')->first();
      if ($request->file('image')) {
        $image = $request->file('image');            
        $image->storeAs('public/images/logo/original/','logo');
        $resized = ImgInt::make($image)->resize(504,148)->save();
        Storage::put('public/images/logo/logo', $resized);
        $mini= ImgInt::make($image)->resize(111,32)->save();
        Storage::put('public/images/logo/mini/logo',$mini);
        $logo->name= 'logo';        
      }
      $logo->save();
      // dd($logo);
      $request->session()->flash('success', 'Logo Successfully Updated ');
      return redirect()->back();

    }

    public function carouselText(TitleRequest $request){
      $text= Text::find(1);
      $text->carouseltext = $request->title;
      $text->save();
      $request->session()->flash('success', 'Carousel Text Successfully Updated ');
      return redirect()->back();
    }

    public function addCarouselImage(Request $request){
      $this->validate($request, [
        'image' => 'nullable|image'
      ]);

      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        $image->storeAs('public/images/carousel/originals/', $imagename);
        $resized = ImgInt::make($image)->resize(1628,796)->save();
        Storage::put('public/images/carousel/'.$imagename, $resized);
        $preview = ImgInt::make($image)->resize(548,264)->save();
        Storage::put('public/images/carousel/previews/'.$imagename, $preview); 
        $item = new Image;       
        $item->name= $imagename;
        $item->folder='carousel';
      }
      $item->save();
      $request->session()->flash('success', 'Background Image Successfully Added !');
      return redirect()->back();
    }

    public function carouselImage(Request $request, $id){
      $this->validate($request, [
        'image' => 'nullable|image'
      ]);
      $item = Image::find($id);
      if ($request->file('image')) {
        $image = $request->file('image');
        $imagename = time().$image->hashname();
        if ($item->name!='01.jpg' && $item->name!='02.jpg'){
          Storage::delete(['public/images/carousel/originals/'.$item->name,'public/images/carousel/'.$item->name,'public/images/carousel/previews/'.$item->name]);
        }
        $image->storeAs('public/images/carousel/originals/', $imagename);
        $resized = ImgInt::make($image)->resize(1628,796)->save();
        Storage::put('public/images/carousel/'.$imagename, $resized);
        $preview = ImgInt::make($image)->resize(548,264)->save();
        Storage::put('public/images/carousel/previews/'.$imagename, $preview);        
        $item->name= $imagename;
      }
      $item->save();
      $request->session()->flash('success', 'Background Image Successfully Updated !');
      return redirect()->back();
    }

    public function deleteCarouselImage(Request $request, $id) {
      $item= Image::find($id);
      Storage::delete(['public/images/carousel/originals/'.$item->name,'public/images/carousel/'.$item->name,'public/images/carousel/previews/'.$item->name]);
      $item->delete();
      $request->session()->flash('success', 'Background Image Successfully Deleted !');
      return redirect()->back();

    }

    public function discoverTitle(TitleRequest $request){
      $text= Text::find(1);
      $text->discovertitle = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }
    
    public function teamTitle(TitleRequest $request){
      $text= Text::find(1);
      $text->team = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }

    public function standoutTitle(TitleRequest $request){
      $text= Text::find(1);
      $text->standouttitle = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }

    public function standoutText(Request $request){
      $this->validate($request, [
        'text' => 'bail|required|max:120'
      ]);
      $text= Text::find(1);
      $text->standouttext = $request->text;
      $text->save();
      $request->session()->flash('success', 'Section Text Successfully Updated !');
      return redirect()->back();
    }

    public function discoverLeft(ParagraphRequest $request){
      $text= Text::find(1);
      $text->discoverleft = $request->discoverleft;
      $text->save();
      $request->session()->flash('success', 'Paragraph Successfully Updated !');
      return redirect()->back();
    }
    
    public function discoverRight(ParagraphRequest $request){
      $text= Text::find(1);
      $text->discoverright = $request->discoverright;
      $text->save();
      $request->session()->flash('success', 'Paragraph Successfully Updated !');
      return redirect()->back();
    }

    public function browseBlog(ButtonRequest $request){
      $text= Text::find(1);
      $text->browseblog = $request->buttontext;
      $text->save();
      $request->session()->flash('success', 'Button Text Successfully Updated !');
      return redirect()->back();
    }

    public function browseServices(ButtonRequest $request){
      $text= Text::find(1);
      $text->browseservices = $request->buttontext;
      $text->save();
      $request->session()->flash('success', 'Button Text Successfully Updated !');
      return redirect()->back();
    }

    public function browseStandout(ButtonRequest $request){
      $text= Text::find(1);
      $text->browsestandout = $request->buttontext;
      $text->save();
      $request->session()->flash('success', 'Button Text Successfully Updated !');
      return redirect()->back();
    }

    public function video(Request $request){
      $this->validate($request, [
        'video' => 'bail|required|url'
      ]);
      $text= Text::find(1);
      $text->video = $request->video;
      $text->save();
      $request->session()->flash('success', 'Video URL Successfully Updated !');
      return redirect()->back();
    }
    
    public function footer(Request $request){
      $this->validate($request, [
        'content' => 'bail|required|max:500',
        'link' => 'nullable' ,
        'url' => 'bail|url|nullable'
      ]);
      $text=Text::find(1);
      $text->copyright = $request->content;
      $text->copyrightlink = $request->link;
      $text->copyrighturl = $request->url;
      $text->save();
      $request->session()->flash('success', 'Video URL Successfully Updated !');
      return redirect()->back();
    }
  

   
    
}
