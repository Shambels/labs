@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


@can ('is-editor')
<div class="card">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Tag</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/tag/{{$tag->id}}" method="POST">
      @csrf
      @can('is-admin')
        <div class="form-group">
          <label for="">Valid</label>
          <div class="radio">
            @if ($tag->valid==true)
              <label class="radio-inline"><input type="radio" value="1" name="valid" checked>Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
            @elseif ($tag->valid==false)
              <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid" checked>No</label>
            @else
              <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
            @endif
          </div>
        </div>
        @endcan
      <div class="form-group">
        <label>Name</label>
        <input name="name" value="{{old('name', $tag->name)}}" placeholder="Type here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    <form action="/admin/edit/tag/{{$tag->id}}/delete" method="post">
      @csrf
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>
</div>
@endcan







@stop