<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
      return view ('home');
    }
    public function services(){
      return view ('services');
    } 
    public function blog(){
      return view ('blog');
    }
    public function contact(){
      return view ('contact');
    }
    
}
