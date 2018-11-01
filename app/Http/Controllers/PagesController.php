<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Text;
use App\Service;
use App\Testimonial;
use App\Project;
use App\User;


class PagesController extends Controller
{

    public function home(){
      $text= Text::find(1);
      $carouselImages = Image::where('folder','carousel')->get();
      $YTimage = Image::where('folder','youtube')->get()->first();
      $servicesup = Service::with('icons')->get()->random(2);
      $servicedown = Service::with('icons')->get()->random(1);
      $services = Service::paginate(9);
      $testimonials = Testimonial::with('clients')->get()->random(6);
      $teammembers = User::where('roles_id','2')->get()->random(2);
      $teamleader = User::where('roles_id', '1')->get()->first();
      // dd($carouselImages);
      return view ('home', compact('carouselImages','YTimage','text','services','servicesup','servicedown','testimonials','teammembers','teamleader'));
    }

    public function services(){
      $text= Text::find(1);
      $services = Service::paginate(9);
      $servicesleft = Service::with('icons')->get()->random(3);
      $servicesright = Service::with('icons')->get()->random(3);
      $projects= Project::orderBy('created_at')->get()->take(3);
      return view ('services', compact('text','services','servicesleft','servicesright','projects'));
    }

    public function blog(){
      $text = Text::find(1);
      return view ('blog', compact('text'));
    }
    
    public function contact(){
      $text = Text::find(1); 
      return view ('contact', compact('text'));
    }
}
