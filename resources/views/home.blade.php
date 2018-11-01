@extends('layouts/app')


@section('content')

<!-- Intro Section -->
    <!-- Carousel -->
    <div class="hero-section">
      <div class="hero-content">
        <div class="hero-center">
          <img src="storage/img/big-logo.png" alt="">
          <p>{{$text->carouseltext}}</p>
        </div>
      </div>
      <!-- slider -->
      <div id="hero-slider" class="owl-carousel">
        <div class="item  hero-item" data-bg="storage/img/01.jpg"></div>
        <div class="item  hero-item" data-bg="storage/img/02.jpg"></div>
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
            <p>{{$text->discoverleft}}</p>
            </div>
            <div class="col-md-6">
              <p>{{$text->discoverleft}}</p>
            </div>
          </div>
          <div class="text-center mt60">
          <a href="{{Route('blog')}}" class="site-btn">{{$text->browseblog}}</a>
          </div>
          <!-- popup video -->
          <div class="intro-video">
            <div class="row">
              <div class="col-md-8 offset-2">
                <img src="storage/img/video.jpg" alt="">
                <a href="{{$text->video}}" class="video-popup">
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
            <h2>{{$text->testimonial}}</h2>
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
          <h2>{{$text->team}}</h2>
        </div>
        <div class="row">
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
              <img src="storage/img/team/1.jpg" alt="">
              <h2>Christinne Williams</h2>
              <h3>Project Manager</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
              <img src="storage/img/team/2.jpg" alt="">
              <h2>Christinne Williams</h2>
              <h3>Junior developer</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
              <img src="storage/img/team/3.jpg" alt="">
              <h2>Christinne Williams</h2>
              <h3>Digital designer</h3>
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
            <h2>Are you ready to stand out?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.</p>
          </div>
          <div class="col-md-3">
            <div class="promo-btn-area">
            <a href="{{Route('services')}}" class="site-btn btn-2">Browse</a>
            </div>
          </div>
        </div>
      </div>
    </div>

   @include('partials/contact')
    
@stop