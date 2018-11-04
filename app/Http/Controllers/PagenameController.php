<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PagenameRequest;
use App\Text;

class PagenameController extends Controller
{
  public function home(PagenameRequest $request) {
    $text= Text::find(1);
    $text->homesection = $request->name;
    $text->save();
    $request->session()->flash('success', 'Page Name Successfully Updated !');
    return redirect()->back();
  }

  public function services(PagenameRequest $request) {
    $text= Text::find(1);
    $text->servicessection = $request->name;
    $text->save();
    $request->session()->flash('success', 'Page Name Successfully Updated !');
    return redirect()->back();
  }

  public function blog(PagenameRequest $request) {
    $text= Text::find(1);
    $text->blogsection = $request->name;
    $text->save();
    $request->session()->flash('success', 'Page Name Successfully Updated !');
    return redirect()->back();
  }
  
  public function contact(PagenameRequest $request) {
    $text= Text::find(1);
    $text->contactsection = $request->name;
    $text->save();
    $request->session()->flash('success', 'Page Name Successfully Updated !');
    return redirect()->back();
  }
 
}
