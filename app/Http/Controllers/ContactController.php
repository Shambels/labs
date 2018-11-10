<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ButtonRequest;
use App\Text;
use App\Newsmail;
use App\Mapcoord;
use Geocoder;
use GuzzleHttp;

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
      'office' => 'bail|required|max: 50',
      'address' => 'bail|required|max: 50',
      'town' => 'bail|required|max: 50',
      'phone' => 'bail|required|max: 50',
      'email' => 'bail|required|max: 50'
    ]);
    $text = Text::find(1);
    $text->contactoffice = $request->office;
    $text->contactaddress = $request->address;
    $text->contacttown = $request->town;
    $text->contactphone = $request->phone;
    $text->contactemail = $request->email;
    $text->save();
    // $mapCoord = Mapcoord::find(1);
    // $fullAddress = $text->contactaddress.','.$text->contacttown;
    // $mapCoord->fulladdress=$fullAddress;
    // dd($mapCoord);


    // $client = new GuzzleHttp\Client();
    // $geocoder = new Geocoder($client);
    // $geocoder->getCoordinatesForAddress($fullAddress, $apiKey);
    // $coords = Geocoder::getCoordinatesForAddress($fullAddress, $apiKey);
    
    /* 
      This function returns an array with keys
      "lat" =>  
      "lng" => 
      "accuracy" => "ROOFTOP"
      "formatted_address" => 
      "viewport" => [
        "northeast" => [
          "lat" => 
          "lng" => 
        ],
        "southwest" => [
          "lat" => 
          "lng" => 
        ]
      ]
    */
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

  public function subscribe (Request $request) {
    $this->validate($request,[
      'email' => 'bail|required|email'
    ]);
    $newsmail = new Newsmail;
    $newsmail->email = $request->email;
    $newsmail->save();
    $request->session()->flash('success', 'Successfully Subscribed !');
    return redirect()->back();
  }
  
}
