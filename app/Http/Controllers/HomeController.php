<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\Service;
use App\Icon;

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
   

    public function carouselText(Request $request){
      $this->validate($request, [
        'carouseltext'=> 'bail|required|max:50'
      ]);
      $text= Text::find(1);
      $text->carouseltext = $request->carouseltext;
      $text->save();
      return redirect()->back();
    }

    public function services(Request $request, $id){
      $this->validate($request, [
        'name' => 'bail|required|max:35',
        'content' => 'bail|required|max:150',
      ]);
      $service = Service::find($id);
      $service->name = $request->name;
      $service->content = $request->content;
      $service->icons_id= $request->icon;
      $service->save();
      return redirect()->back();            
    }

    public function discovertitle(Request $request){
      $this->validate($request, [
        'discovertitle'=> 'bail|required|max:75'
      ]);
      $text= Text::find(1);
      $text->discovertitle = $request->discovertitle;
      $text->save();
      return redirect()->back();
    }

    public function discoverleft(Request $request){
      $this->validate($request, [
        'discoverleft'=> 'bail|required|max:500'
      ]);
      $text= Text::find(1);
      $text->discoverleft = $request->discoverleft;
      $text->save();
      return redirect()->back();
    }
    
    public function discoverright(Request $request){
      $this->validate($request, [
        'discoverright'=> 'bail|required|max:500'
      ]);
      $text= Text::find(1);
      $text->discoverright = $request->discoverright;
      $text->save();
      return redirect()->back();
    }

    public function browseblog(Request $request){
      $this->validate($request, [
        'browseblog' => 'bail|required|max:25'
      ]);
      $text= Text::find(1);
      $text->browseblog = $request->browseblog;
      $text->save();
      return redirect()->back();
    }

    public function video(Request $request){
      $this->validate($request, [
        'video' => 'bail|required|url'
      ]);
      $text= Text::find(1);
      $text->video = $request->video;
      $text->save();
      return redirect()->back();
    }
    
    public function testimonial(Request $request){
      $this->validate($request, [
        'testimonial' => 'bail|required|max:75'
      ]);
      $text= Text::find(1);
      $text->testimonial = $request->testimonial;
      $text->save();
      return redirect()->back();
    }
}
