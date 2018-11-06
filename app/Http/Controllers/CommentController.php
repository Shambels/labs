<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;
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
          if(Auth::user()->roles_id=1){
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
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
