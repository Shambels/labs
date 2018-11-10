<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Testimonial;
use App\Text;

class TestimonialController extends Controller
{
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */


    public function title(TitleRequest $request){
      $text = Text::find(1);
      $text->testimonial = $request->title;
      $text->save();
      $request->session()->flash('success', 'Section Title Successfully Updated !');
      return redirect()->back();
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'message' => 'bail|required|max:300',
      ]);
      $testimonial = new Testimonial;
      $testimonial->message = $request->message;
      $testimonial->valid = true;
      $testimonial->save();
      $request->session()->flash('success', 'Testimonial Successfully Added !');
      return redirect()->back(); 
    }

    public function edit(Request $request, $id) {
      $testimonial = Testimonial::find($id);
      return view('admin/lists/cards/edittestimonial',compact('testimonial'));

    }
    
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'message' => 'bail|required|max:300',
      ]);
      $testimonial = Testimonial::find($id);
      $testimonial->message = $request->message;
      $testimonial->valid = true;
      $testimonial->save();
      $request->session()->flash('success', 'Testimonial Successfully Updated !');
      return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id){
      $testimonial = Testimonial::find($id)->delete();
      $request->session()->flash('success', 'Testimonial Successfully Deleted !');
      return redirect()->back();  
    }
}
