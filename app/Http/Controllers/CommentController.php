<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;
use Route;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, $id)
    {
        $comment = new Comment;
        $comment->articles_id= $id;

        if(Auth::user()){
          $comment->name = Auth::user()->name;
          $comment->email = Auth::user()->email;
          $comment->users_id= Auth::user()->id;
          if(Auth::user()->roles_id==1){
            $comment->valid = true;
          }
        } else {
          $comment->users_id=null;
          if ($request->name) {
            $comment->name = $request->name;
           
          } else {
            $comment->name = 'Anonymous';
          }
          if ($request->email) {
            $comment->email = $request->email;
          } else {
            $comment->email = null;
          }
        }

        $comment->subject = $request->subject;
        $comment->message = $request->message;
        $comment->save();
        $request->session()->flash('success', 'Your Comment has been sent ! ');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = Comment::find($id);
      return view('admin.lists.cards.editcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if ($request->valid == 1){
          $comment->valid = true;
        } else if ($request->valid == 0) {
          $comment->valid = false;
          
        }       
        $comment->subject = $request->subject;
        $comment->message = $request->message;
        $comment->save();
        $request->session()->flash('success','Comment Successfully Updated !');        
        // dd(Route::curentRouteName());
        // if (Route::curentRouteName()=='editblogpost'){
          // return redirect()->back();
        // } else {


      $url = url()->previous();
      $regID = '/([^.\D]*)(.edit)$/m';
      preg_match($regID,$url,$ids);     
      $regRoot = '/(.*)\b.(admin)/';
      preg_match($regRoot,$url,$root);      
      if (url()->previous()==$root[1]."/admin/edit/comment/".$ids[0]) {
        return redirect('/admin/list/users/'.$comment->users->id.'/comments');
      } else {
        return redirect()->back();
      }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $comment = Comment::find($id);
        $userID = $comment->users->id;
                
        $url = url()->previous();                 
        $regID = '/([^.\D]*)(.edit)$/m';
        preg_match($regID,$url,$ids);          
        $regRoot = '/(.*)\b.(admin)/';
        preg_match($regRoot,$url,$root);                   

        $comment->delete();       
        $request->session()->flash('success','Comment Successfully Deleted !');         

        if($ids) {          
          if (url()->previous()==$root[1].'/admin/edit/comment/'.$ids[0]) {          
            return redirect('/admin/list/users/'.$userID.'/comments');
          }
        } else {                 
          return redirect()->back();
      }
    }
}
