@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="services-card-section spad">
    <div class="container">
      <div class="row">
        <!-- Single Card -->
        @foreach ($projects as $project)
          <div class="col-md-4 col-sm-6">
            <div class="sv-card editable">
              <div class="card-img">
              <img src="{{Storage::url('public/images/projects/mediums/'.$project->image)}}" alt="">
              </div>
              <div class="card-text">
                <h2>{{$project->name}}</h2>
                <p>{{$project->content}}</p>
              </div>
            </div>
            @include('admin.pages.cards.projects')
          </div>
        @endforeach
        
      </div>
      <div class="text-center">
        {{$projects->links()}}
        <div class="togglable" class="btn btn-light" style="font-size: 1.8rem;">
            <i class="fas fa-plus"></i>
        </div>
          @include('admin.pages.cards.storeproject')
      </div>
    </div>
  </div>

@stop