<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ButtonRequest;
use App\Text;

class ContactController extends Controller
{

  public function title(TitleRequest $request){
    $text = Text::find(1);
    $text->contacttitle = $request->title;
    $text->save();
    $request->session()->flash('success', 'Section Title Successfully Updated !');
    return redirect()->back();
  }

  public function text(Request $request){
    $this->validate($request, [
      'text' => 'bail|required|max:500'
    ]);
    $text = Text::find(1);
    $text->contacttext = $request->text;
    $text->save();
    $request->session()->flash('success', 'Section Title Successfully Updated !');
    return redirect()->back();
  }

  public function info(Request $request) {
    $this->validate($request, [
      'office' => 'bail|required|max:35',
      'address' => 'bail|required|max:35',
      'town' => 'bail|required|max:35',
      'phone' => 'bail|required|max:35',
      'email' => 'bail|required|max:35'
    ]);
    $text = Text::find($id);
    $text->contactoffice = $request->office;
    $text->contactaddress = $request->address;
    $text->contacttown = $request->town;
    $text->contactphone = $request->phone;
    $text->contactemail = $request->email;
    $request->session()->flash('success', 'Contact Information Successfully Updated !');
    return redirect()->back();
  }
  
  public function sendButton(ButtonRequest $request){
    $text= Text::find(1);
    $text->contactformbtn = $request->buttontext;
    $text->save();
    $request->session()->flash('success', 'Button Text Successfully Updated !');
    return redirect()->back();
  }

  public function newsletterTitle(TitleRequest $request){
    $text = Text::find(1);
    $text->newstitle = $request->title;
    $text->save();
    $request->session()->flash('success', 'Section Title Successfully Updated !');
    return redirect()->back();
  }

  public function newsletterButton(ButtonRequest $request){
    $text= Text::find(1);
    $text->newsbtn = $request->buttontext;
    $text->save();
    $request->session()->flash('success', 'Button Text Successfully Updated !');
    return redirect()->back();
  }
  
}
