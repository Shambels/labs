@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


@can ('is-editor')
  <div class="card m-3">
    <div class="card-header bg-purple-gradient">
      <h3 class="card-title">Edit Comment</h3>
    </div>
    <div class="card-body">
      {{-- <form action="/search" method="POST" class="form-group">
        @csrf 
        <input type="hidden" name="search" value="{{$comment->articles->name}}"> 
      </form>  --}}                    
     
      <form action="/admin/edit/comment/{{$comment->id}}/update" method="POST" enctype="multipart/form-data">
        @csrf                   
          <h5>Valid</h5>
          @can('is-admin')
          <div class="radio">
          @if ($comment->valid==true)
            <label class="radio-inline"><input type="radio" value="1" name="valid" checked>Yes</label>
            <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
            @elseif ($comment->valid==false)
            <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
            <label class="radio-inline"><input type="radio" value="0" name="valid" checked>No</label>
            @elseif ($comment->valid==null)
              <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
          @endif
          </div>
          @endcan                                 
        <div class="form-group">
          <h5>Subject</h5>
          <input name="subject" value="{{old('subject',$comment->subject)}}" placeholder="Comment Title. Optional." type="text" class="form-control">
        </div>
        <div class="form-group">
          <h5>Message</h5>
          <textarea name="message"  rows="3" placeholder="Comment Message. Max 500 Characters." type="text" class="form-control">{{old('message',$comment->message)}}</textarea>
          
        </div>               
        <h4 class="mb-2"><a href="/admin/edit/blogpost/{{$comment->articles->id}}">Go To Article</a></h4>
        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
      </form> 
      <form action="/admin/edit/comment/{{$comment->id}}/delete" method="POST">
        @csrf
        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
      </form>               
    </div>
  </div>
@endcan


            
@stop