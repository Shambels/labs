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
   

    public function carouselText(TitleRequest $request){
      $text= Text::find(1);
      $text->carouseltext = $request->title;
      $text->save();
      return redirect()->back();
    }

    public function discoverTitle(TitleRequest $request){
      $text= Text::find(1);
      $text->discovertitle = $request->title;
      $text->save();
      return redirect()->back();
    }
    
    public function teamTitle(TitleRequest $request){
      $text= Text::find(1);
      $text->team = $request->title;
      $text->save();
      return redirect()->back();
    }

    public function discoverLeft(ParagraphRequest $request){
      $text= Text::find(1);
      $text->discoverleft = $request->discoverleft;
      $text->save();
      return redirect()->back();
    }
    
    public function discoverRight(ParagraphRequest $request){
      $text= Text::find(1);
      $text->discoverright = $request->discoverright;
      $text->save();
      return redirect()->back();
    }

    public function browseBlog(ButtonRequest $request){
      $text= Text::find(1);
      dd($text);
      $text->browseblog = $request->buttontext;
      $text->save();
      return redirect()->back();
    }

    public function browseServices(ButtonRequest $request){
      $text= Text::find(1);
      $text->browseservices = $request->buttontext;
      $text->save();
      return redirect()->back();
    }

    public function browseStandout(ButtonRequest $request){
      $text= Text::find(1);
      $text->browsestandout = $request->buttontext;
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
    
    

  

   
    
}
