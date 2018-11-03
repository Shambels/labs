<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Service;
use App\Text;

class ServiceController extends Controller
{
   
    public function title(TitleRequest $request){
      $text = Text::find(1);
      $text->services = $request->title;
      $text->save();
      return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'bail|required|max:35',
          'content' => 'bail|required|max:150',
        ]);
        $service = Service::find($id);
        $service->name = $request->name;
        $service->content = $request->content;
        $service->icons_id= $request->icon;
        $service->save();
        return redirect()->back();            
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete(Service $service, $id)
    {
      $service = Service::find($id)->delete();
      return redirect()->back();
    }
}
