@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')
@include('admin.pages.partials.pageheader')
@include('admin/pages/partials/services')

<!-- features section  == Services2-->
<div class="team-section spad">
  <div class="overlay"></div>
  <div class="container">
    <div class="section-title">
      <h2 class="editable">{!!$text->services2!!}</h2>
      @include('admin.pages.cards.titles.services2')
    </div>
    <div class="row">
      <!-- LEFT SERVICE COLUMN -->
      <div class="col-md-4 col-sm-4 features">
        @foreach ($servicesleft as $service)
          <div class="icon-box light left editable">
            <div class="service-text">
              <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
            </div>
            <div class="icon">
              <i class="{{$service->icons->class}}"></i>
            </div>
          </div>
          @include('admin.pages.cards.service')
        @endforeach
      </div>
      <!-- PHONE -->
      <div class="col-md-4 col-sm-4 devices">
        <div class="text-center">
          <img  class="editable" src="{{Storage::url('public/images/services/'.$phoneimage->name)}}" alt="">
          @include('admin.pages.cards.phone')
        </div>
      </div>
      <!-- RIGHT SERVICE COLUMN -->
      <div class="col-md-4 col-sm-4 features">
        @foreach ($servicesright as $service)
          <div class="icon-box light left editable">
            <div class="service-text">
              <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
            </div>
            <div class="icon">
              <i class="{{$service->icons->class}}"></i>
            </div>
          </div>
          @include('admin.pages.cards.service')
        @endforeach
      </div>
    </div>
    <div class="text-center mt100">
      <div class="site-btn editable">{!!$text->browseservices2!!}</div>
      @include('admin.pages.cards.buttons.browseservices2')
    </div>
  </div>
</div>
  <!-- features section end-->



<!-- services card section == PROJECTS -->
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
  </div>
</div>
	<!-- services card section end-->

@include('admin.pages.partials.newsletter')
@include('admin.pages.partials.contact')
@include('admin.pages.partials.footer')
@stop