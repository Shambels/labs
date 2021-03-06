@extends('layouts/app')


@section('content')

@include('partials/pageheader')
@include('partials/services')

<!-- features section  == Services2-->
<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{!!$text->services2!!}</h2>
			</div>
			<div class="row">
        <!-- LEFT SERVICE COLUMN -->
				<div class="col-md-4 col-sm-4 features">
          @foreach ($servicesleft as $service)
            <div class="icon-box light left">
              <div class="service-text">
                <h2>{{$service->name}}</h2>
                <p>{{$service->content}}</p>
              </div>
              <div class="icon">
                <i class="{{$service->icons->class}}"></i>
              </div>
            </div>
          @endforeach
				</div>
				<!-- PHONE -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="text-center">
						<img src="{{Storage::url('public/images/services/'.$phoneimage->name)}}" alt="">
					</div>
				</div>
				<!-- RIGHT SERVICE COLUMN -->
				<div class="col-md-4 col-sm-4 features">
          @foreach ($servicesright as $service)
            <div class="icon-box light left">
              <div class="service-text">
                <h2>{{$service->name}}</h2>
                <p>{{$service->content}}</p>
              </div>
              <div class="icon">
                <i class="{{$service->icons->class}}"></i>
              </div>
            </div>
          @endforeach
				</div>
			</div>
			<div class="text-center mt100">
				<a href="" class="site-btn">{!!$text->browseservices2!!}</a>
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
            <div class="sv-card">
              <div class="card-img">
              <img src="{{Storage::url('public/images/projects/mediums/'.$project->image)}}" alt="">
              </div>
              <div class="card-text">
                <h2>{{$project->name}}</h2>
                <p>{{$project->content}}</p>
              </div>
            </div>
          </div>
        @endforeach
			</div>
		</div>
	</div>
	<!-- services card section end-->

@include('partials/newsletter')
@include('partials/contact')

@stop