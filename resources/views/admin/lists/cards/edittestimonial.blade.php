@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


@can ('is-admin')
<div class="card">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Testimonial</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/testimonial/{{$testimonial->id}}" method="POST">
      @csrf          
      <div class="form-group">
          <label>Message</label>          
          <input name="message" value="{{old('message', $testimonial->message)}}" placeholder="Type here" type="text" class="form-control">
        </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    <form action="/admin/edit/testimonial/{{$testimonial->id}}/delete" method="post">
      @csrf
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>
</div>
@endcan







@stop