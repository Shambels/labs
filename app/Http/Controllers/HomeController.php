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

    public function services(Request $request){
      $this->validate($request, [
        'name' => 'bail|required|max:35',
        'content' => 'bail|required|max:150',
      ]);
        

    }
    
}
