<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ParagraphRequest;
use App\Text;
use App\Testimonial;

class BlogController extends Controller
{
    public function categoriesTitle (TitleRequest $request){
      $text = Text::find(1);
      $text->categories = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function instagramTitle (TitleRequest $request){
      $text = Text::find(1);
      $text->instagram = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function tagsTitle (TitleRequest $request){
      $text = Text::find(1);
      $text->tags = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function quoteTitle (TitleRequest $request){
      $text = Text::find(1);
      $text->quote = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function adTitle(TitleRequest $request){
      $text = Text::find(1);
      $text->ad = $request->title;
      $text->save();
      $request->session()->flash('success', 'Title Successfully Updated !');
      return redirect()->back();
    }

    public function quote(Request $request, $id){
      $this->validate($request, [
        'content' => 'bail|required|max:300'
      ]);
      $quote = Testimonial::find($id);
      $quote->message = $request->content;
      $quote->save();
      $request->session()->flash('success', 'Testimonial Successfully Updated !');
      return redirect()->back();
    }

    public function quoteDelete(Request $request, $id){
      $quote = Testimonial::find($id);
      $quote->delete();
      $request->session()->flash('success', 'Testimonial Successfully Deleted !');
      return redirect()->back();
    }

}
