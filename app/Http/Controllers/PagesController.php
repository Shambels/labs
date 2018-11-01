<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Text;
use App\Service;
use App\Testimonial;
use App\Teammember;
use App\User;


class PagesController extends Controller
{

    public function home(){
      $text= Text::find(1);
      $images= Image::
      $servicesup = Service::with('icons')->get()->random(2);
      $servicedown = Service::with('icons')->get()->random(1);
      $services = Service::paginate(9);
      $testimonials = Testimonial::with('clients')->get()->random(6);
      $teammembers = User::where('roles_id','2')->get()->random(2);
      $teamleader = User::where('roles_id', '1')->get()->first();
      return view ('home', compact('text','services','servicesup','servicedown','testimonials','teammembers','teamleader'));
    }

    public function services(){
      $text= Text::find(1);
      $services = Service::paginate(9);
      $servicesleft = Service::with('icons')->get()->random(3);
      $servicesright = Service::with('icons')->get()->random(3);
      // dd($servicesleft);
      return view ('services', compact('text','services','servicesleft','servicesright'));
    }

    public function blog(){
      return view ('blog');
    }
    
    public function contact(){
      return view ('contact');
    }
}
