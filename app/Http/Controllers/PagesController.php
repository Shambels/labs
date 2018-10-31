<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
      return view ('home');
    }
    public function services(){
      $services = Service::paginate(9);
      $lphoneservices = Service::get()->random(3);
      $rphoneservices = Service::get()->random(3);
      return view ('services', compact('services,lphoneservice,rphoneservices'));
    } 
    public function blog(){
      return view ('blog');
    }
    public function contact(){
      return view ('contact');
    }
}
