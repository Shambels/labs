<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Text;

class BlogController extends Controller
{
    public function categories (TitleRequest $request){
      $text = Text::find(1);
      $text->categories = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function instagram (TitleRequest $request){
      $text = Text::find(1);
      $text->instagram = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function tags (TitleRequest $request){
      $text = Text::find(1);
      $text->tags = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function quote (TitleRequest $request){
      $text = Text::find(1);
      $text->quote = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function ad(TitleRequest $request){
      $text = Text::find(1);
      $text->ad = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

}
