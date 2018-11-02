@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

<!-- Intro Section -->
    <!-- Carousel -->
    
    <div class="hero-section">
      <div class="hero-content">
        <div class="hero-center">
          <img src="storage/img/big-logo.png" alt="">
          <p class="editable">{{$text->carouseltext}}</p>

          @can ('is-admin')
          <form action="/admin/edit/homepage/carouseltext" method="POST" class="d-none">
          @csrf
          <input name="carouseltext" placeholder="Carousel Text" type="text" value="{{old('carouseltext', $text->carouseltext)}}">
          <button class="btn btn-success" type="submit">OK</button>
          </form>
          @endcan

        </div>
      </div>
      <!-- slider -->
        @foreach ($carouselImages as $image)
          <img class="item  hero-item" src="storage/img/{{$image->name}}">
        @endforeach
    </div>
    {{-- MARGIN --}}
    <div style="margin: 20rem 0;"></div>

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
                <img src="{{Storage::url('img/'.$YTimage->name)}}" alt="">
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
          <h2>{!!$text->team!!}</h2>
        </div>
        <div class="row">
          <!-- single member -->
          
          <div class="col-sm-4">
            <div class="member">
              <img src="{{Storage::url($teammembers[0]->image)}}" alt="">
              <h2>{{$teammembers[0]->name}}</h2>
              <h3>{{$teammembers[0]->title}}</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
            <img src="{{Storage::url($teamleader->image)}}" alt="">
              <h2>{{$teamleader->name}}</h2>
            <h3>{{$teamleader->title}}</h3>
            </div>
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member">
                <img src="{{Storage::url($teammembers[1]->image)}}" alt="">
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
            <h2>{{$text->standouttitle}}</h2>
            <p>{{$text->standouttext}}</p>
          </div>
          <div class="col-md-3">
            <div class="promo-btn-area">
            <a href="{{Route('services')}}" class="site-btn btn-2">{{$text->browsestandout}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
{{-- CONTACT FORM --}}
<div class="contact-section spad fix" style="background: blueviolet;">
  <div class="container">
    <div class="row">
      <!-- contact info -->
      <div class="col-md-5 offset-1 contact-info col-push">
        <div class="section-title left">
          <h2>{{$text->contacttitle}}</h2>
        </div>
      <p>{{$text->contacttext}}</p>
        <h3 class="mt60">{{$text->contactoffice}}</h3>
        <p class="con-item">{{$text->contactaddress}} <br> {{$text->contacttown}} </p>
        <p class="con-item">{{$text->contactphone}}</p>
        <p class="con-item">{{$text->contactemails}}</p>
      </div>
      <!-- contact form -->
      <div class="col-md-6 col-pull">
        <form class="form-class" id="con_form">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="name" placeholder="Your name">
            </div>
            <div class="col-sm-6">
              <input type="text" name="email" placeholder="Your email">
            </div>
            <div class="col-sm-12">
              <input type="text" name="subject" placeholder="Subject">
              <textarea name="message" placeholder="Message"></textarea>
              <button class="site-btn">{{$text->contactformbtn}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
   @include('partials.global.footer')
    
@stop