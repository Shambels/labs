@extends('layouts/app')


@section('content')

<!-- Intro Section -->
    <!-- Carousel -->
    <div class="hero-section">
      <div class="hero-content">
        <div class="hero-center">
          <img src="storage/img/big-logo.png" alt="">
          <p>{!!$text->carouseltext!!}</p>
        </div>
      </div>
      <!-- slider -->
      <div id="hero-slider" class="owl-carousel">
        @foreach ($carouselImages as $image)
          <div class="item  hero-item" data-bg="{{Storage::url('img/'.$image->name)}}"></div>
        @endforeach
      </div>
    </div>

    <!-- About section  -- 3 Rnd Services Card-->
    <div class="about-section">
      <div class="overlay"></div>
      <!-- card section -->
      <div class="card-section">
        <div class="container">
          <div class="row">
            <!-- single card -->
            @foreach ($servicesup as $service)
            
            <div class="col-md-4 col-sm-6">
              <div class="lab-card">
                <div class="icon">
                <i class="{{$service->icons->class}}"></i>
                </div>
                <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
              </div>
            </div>
            @endforeach
            <!-- single card  --col-sm-12-->
            @foreach ($servicedown as $service)
            <div class="col-md-4 col-sm-12">
              <div class="lab-card">
                <div class="icon">
                <i class="{{$service->icons->class}}"></i>
                </div>
              <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- card section end-->
  
  
      <!-- About contant  -- discover-->
      <div class="about-contant">
        <div class="container">
          <div class="section-title">
          <h2>{!!$text->discovertitle!!}</h2>
          </div>
          <div class="row">
            <div class="col-md-6">
            <p>{!!$text->discoverleft!!}</p>
            </div>
            <div class="col-md-6">
              <p>{!!$text->discoverright!!}</p>
            </div>
          </div>
          <div class="text-center mt60">
          <a href="{{Route('blog')}}" class="site-btn">{!!$text->browseblog!!}</a>
          </div>
          <!-- popup video -->
          <div class="intro-video">
            <div class="row">
              <div class="col-md-8 offset-2">
                <img src="{{Storage::url('img/'.$YTimage->name)}}" alt="">
                <a href="{!!$text->video!!}" class="video-popup">
                  <i class="fa fa-play"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About section end -->
  
    <!-- Testimonial section -->
    <div class="testimonial-section pb100">
      <div class="test-overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-4">
            <div class="section-title left">
            <h2>{!!$text->testimonial!!}</h2>
            </div>
            <div class="owl-carousel" id="testimonial-slide">
              @foreach ($testimonials as $testimonial)
              <!-- single testimonial -->
              <div class="testimonial">
                <span>‘​‌‘​‌</span>
              <p>{{$testimonial->message}}</p>
                <div class="client-info">
                  <div class="avatar">
                    <img src="{{$testimonial->clients->image}}" alt="">
                  </div>
                  <div class="client-name">
                    <h2>{{$testimonial->clients->name}}</h2>
                  <p>{{$testimonial->clients->title}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial section end-->
  
    <!-- Services section -->
    @include('partials/services')
  
    <!-- Team Section -->
    <div class="team-section spad">
      <div class="overlay"></div>
      <div class="container">
        <div class="section-title">
          <h2>{!!$text->team!!}</h2>
        </div>
        <div class="row">
          <!-- single member -->
          
          <div class="col-sm-4">
            <div class="member">
              <img src="{{Storage::url('images/users/mediums/'.$teammembers[0]->image)}}" alt="">
              <h2>{{$teammembers[0]->name}}</h2>
              <h3>{{$teammembers[0]->title}}</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
            <img src="{{Storage::url('images/users/mediums/'.$teamleader->image)}}" alt="">
              <h2>{{$teamleader->name}}</h2>
            <h3>{{$teamleader->title}}</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
                <img src="{{Storage::url('images/users/mediums/'.$teammembers[1]->image)}}" alt="">
                <h2>{{$teammembers[1]->name}}</h2>
                <h3>{{$teammembers[1]->title}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Team Section end-->
  
  
    <!-- Promotion section -->
    <div class="promotion-section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h2>{!!$text->standouttitle!!}</h2>
            <p>{!!$text->standouttext!!}</p>
          </div>
          <div class="col-md-3">
            <div class="promo-btn-area">
            <a href="{{Route('services')}}" class="site-btn btn-2">{!!$text->browsestandout!!}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

   @include('partials/contact')
    
@stop