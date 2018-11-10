<?php

namespace App\Http\Controllers;

use App\Newsmail;
use Illuminate\Http\Request;

class NewsmailController extends Controller
{
    public function confirm(Request $request, $id) {
      $subscriber = Newsmail::find($id);
      $subscriber->old = true;
      $subscriber->save();
      $request->session()->flash('success', 'Email Address Confirmed !');
      return redirect()->back();
    }

    public function delete(Request $request, $id) {
      $subscriber = Newsmail::find($id);      
      $subscriber->delete();
      $request->session()->flash('success', 'Email Address Confirmed !');
      return redirect()->back();
    }
}
