<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\Service;
use App\Testimonial;
use App\Teammember;
use App\User;


class PagesController extends Controller
{
    public function home(){
      $text= Text::find(1);
      $servicesup = Service::with('icons')->get()->random(2);
      $servicedown = Service::with('icons')->get()->random(1);
      $testimonials = Testimonial::with('clients')->get()->random(6);
      $teammmembers = User::where('roles_id','2')->get()->random(2);
      $teamleader = User::where('roles_id', '1')->get();
      return view ('home', compact('text','servicesup','servicedown','testimonials','teammembers','teamleader'));
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
