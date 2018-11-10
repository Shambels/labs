@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


@can('is-admin')
<div class="card d">
  <div class="card-header">
    <h3 class="card-title text-purple">Edit Client</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/client/{{$client->id}}/update" method="POST" enctype="multipart/form-data">           
      @csrf
      <div class="form-group">
        <label for="">Title</label>
        <input name="title" value="{{old('title',$client->title)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Name</label>
        <input name="name" value="{{old('name',$client->name)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Company</label>
        <input name="company" value="{{old('company',$client->company)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Picture</label>
        <input name="image" type="file" class="form-control">
      </div>      
      <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>                
    </form>
  </div>
</div>
@endcan


            
@stop