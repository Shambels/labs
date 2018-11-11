@extends('layouts/app')

@include('partials/pageheader')

@section('content')
@if (Auth::user()->id == $comment->users->id)
<div class="card m-3">
    <div class="card-header bg-purple-gradient">
      <h3 class="card-title">Edit Comment</h3>
    </div>
    <div class="card-body">   
      <form action="/personal/comment/update/{{$comment->id}}" method="POST" enctype="multipart/form-data">
        @csrf                                                                 
        <div class="form-group">
          <h5>Subject</h5>
          <input name="subject" value="{{old('subject',$comment->subject)}}" placeholder="Comment Title" type="text" class="form-control">
        </div>
        <div class="form-group">
          <h5>Message</h5>
          <textarea name="message"  rows="3" placeholder="Comment Message. Max 500 Characters." type="text" class="form-control">{{old('message',$comment->message)}}</textarea>
          
        </div>                       
        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
      </form> 
      <form action="/personal/comment/delete/{{$comment->id}}" method="POST">
        @csrf
        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
      </form>               
    </div>
  </div>
  @else

  <h1>Sorry You are allowed to access this page  :(
    <a href="/">Go Home !</a>
  </h1>
  @endif