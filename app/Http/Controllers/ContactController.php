<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSent;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MailRequest;
use App\Http\Requests\TitleRequest;
use App\Http\Requests\ButtonRequest;
use App\Contact;
use App\User;
use App\Text;
use App\Newsmail;
use App\Mapcoord;
use Geocoder;
use GuzzleHttp;

class ContactController extends Controller
{
  public function store(MailRequest $request)
  {
      $mail = new Contact;
      if (!$request->name) {
        $mail->name = 'Unknown';
      } else {
        $mail->name = $request->name;
      }
      if (!$request->subject) {
        $mail->subject = 'None';
      } else {
        $mail->subject = $request->subject;
      }
      $mail->from = $request->email;
      $mail->message = $request->message;
      
      $adminemail = User::where('roles_id',1)->first()->email;
      $mailable = new MailSent($mail->name, $mail->from, $mail->subject, $mail->message);
      
      Mail::to($adminemail)->send($mailable);
      
      $mail->save();
      $request->session()->flash('mailsuccess', 'Mail Successfully Sent ! ');
      return redirect()->back();
  }

  public function readMail (Request $request, $id) {    
    $mail = Contact::find($id); 

    // get previous user id
    $previous = Contact::where('id', '<', $mail->id)->max('id');
    // get next user id
    $next = Contact::where('id', '>', $mail->id)->min('id');       

    $mail->read = true;
    $mail->save();
    return view('admin.lists.mails.readmail', compact('mail','previous','next'));
  }

  public function deleteMail (Request $request, $id) {
    $mail = Contact::find($id);
    $mail->delete();
    $request->session()->flash('success', 'E-mail Successfully Deleted ! ');
    return redirect('/admin/list/inbox');
  }

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
    $request->session()->flash('newslettersuccess', 'Successfully Subscribed !');
    return redirect()->back();
  }
}
