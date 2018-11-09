@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="services-section spad">
  <div class="container">    
    <div class="row">
      @foreach ($services as $service)
      <!-- single service -->
      <div class="col-md-4 col-sm-6">
        <div class="service editable">
          <div class="icon">
          <i class="{{$service->icons->class}}"></i>
          </div>
          <div class="service-text">
          <h2>{{$service->name}}</h2>
            <p>{{$service->content}}</p>
          </div>
        </div>
        @include('admin.pages.cards.service')
      </div>
      @endforeach
    </div>
    <div class="text-center">
        {{$services->links()}}
        <div class="togglable" class="btn btn-light" style="font-size: 1.8rem;">
            <i class="fas fa-plus"></i>
        </div>
          @include('admin.lists.cards.store.service')
    </div>
  </div>
</div>
<!-- services section end -->

@stop