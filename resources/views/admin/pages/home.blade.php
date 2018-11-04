@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')
@include('admin.alerts.success')
@include('admin.alerts.error')




<!-- Intro Section -->
    <!-- Carousel -->
    
    <div class="hero-section">
      <div class="hero-content" style="position:unset!important">
        <div class="hero-center">
          <img class="editable" src="storage/img/big-logo.png" alt="">
          <p class="editable">{{$text->carouseltext}}</p>
          @include ('admin.pages.cards.carousel.text')
        </div>
      </div>
    </div>
      <!-- slider -->
        @foreach ($carouselImages as $image)
          <img class="editable" src="{{Storage::url('public/images/carousel/'.$image->name)}}">
          @include('admin.pages.cards.carousel.image')
        @endforeach

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
              <div class="lab-card editable">
                <div class="icon">
                <i class="{{$service->icons->class}}"></i>
                </div>
                <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
              </div>
             @include('admin.pages.cards.service')
                </div>
            @endforeach


            <!-- single card  --col-sm-12-->
            @foreach ($servicedown as $service)
            <div class="col-md-4 col-sm-12">
              <div class="lab-card editable">
                <div class="icon">
                <i class="{{$service->icons->class}}"></i>
                </div>
              <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
              </div>
              @include('admin.pages.cards.service')
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
          <h2 class="editable">{!!$text->discovertitle!!}</h2>
          @include('admin.pages.cards.titles.discover')
          </div>
          <div class="row">
            <div class="col-md-6">
            <p class="editable">{!!$text->discoverleft!!}</p>
            @include('admin.pages.cards.discoverleft')
            </div>
            <div class="col-md-6">
              <p class="editable">{!!$text->discoverright!!}</p>
              @include('admin.pages.cards.discoverright')
            </div>
          </div>
          <div class="text-center mt60">
          <div class="site-btn editable">{!!$text->browseblog!!}</div>
          @include('admin.pages.cards.buttons.browseblog')
          </div>
          <!-- popup video -->
          <div class="intro-video">
            <div class="row">
              <div class="col-md-8 offset-2 editable">
                <img src="{{Storage::url('img/'.$YTimage->name)}}" alt="">
                <a href="{{$text->video}}" class="video-popup">
                  <i class="fa fa-play"></i>
                </a>
              </div>
              @include('admin.pages.cards.links.youtube')
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
            <h2 class="editable">{!!$text->testimonial!!}</h2>
            @include('admin.pages.cards.titles.testimonial')
            </div>
            <div class="owl-carousel" id="testimonial-slide">
              @foreach ($testimonials as $testimonial)
              <!-- single testimonial -->
              <div class="testimonial">
                <span>‘​‌‘​‌</span>
              <p class="editable">{{$testimonial->message}}</p>
              @include('admin.pages.cards.testimonial')
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
    @include('admin/pages/partials/services')
  
    <!-- Team Section -->
    <div class="team-section spad">
      <div class="overlay"></div>
      <div class="container">
        <div class="section-title">
          <h2 class="editable">{!!$text->team!!}</h2>
          @include('admin.pages.cards.titles.team')
        </div>
        <div class="row">
          <!-- single member -->
          
          <div class="col-sm-4">
            <div class="member editable">              
              <img src="{{Storage::url('images/users/mediums/'.$teammembers[0]->image)}}" alt="">
              <h2>{{$teammembers[0]->name}}</h2>
              <h3>{{$teammembers[0]->title}}</h3>
            </div>
            @can ('is-admin')
              <div class="card d-none">
                <div class="card-header">
                  <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                  <form action="/admin/edit/user/{{$teammembers[0]->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>User Image</label>
                      <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>User Name</label>
                      <input name="name" value="{{old('name', $teammembers[0]->name)}}" placeholder="Type here" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>User Title</label>
                      <input name="title" value="{{old('title', $teammembers[0]->title)}}" placeholder="Type here" type="text" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit">OK</button>
                  </form>
                  <form action="/admin/edit/testimonial/{{$testimonial->id}}/delete" method="POST">
                    @csrf
                    <button class="mt-1 btn btn-danger" type="submit">Delete</button>
                  </form>
                </div>
              </div>
            @endcan
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member editable">              
            <img src="{{Storage::url('images/users/mediums/'.$teamleader->image)}}" alt="">
              <h2>{{$teamleader->name}}</h2>
            <h3>{{$teamleader->title}}</h3>
            </div>
            @can ('is-admin')
            <div class="card d-none">
              <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <div class="card-body">
                <form action="/admin/edit/user/{{$teamleader->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>User Image</label>
                    <input name="image" type="file" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>User Name</label>
                    <input name="name" value="{{old('name', $teamleader->name)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>User Title</label>
                    <input name="title" value="{{old('title', $teamleader->title)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <button class="btn btn-success" type="submit">OK</button>
                </form>
              </div>
            </div>
            @endcan
            
          </div>
          <!-- single member -->
          <div class="col-sm-4">
            <div class="member editable">              
                <img src="{{Storage::url('images/users/mediums/'.$teammembers[1]->image)}}" alt="">
                <h2>{{$teammembers[1]->name}}</h2>
                <h3>{{$teammembers[1]->title}}</h3>
            </div>
            @can ('is-admin')
            <div class="card d-none">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <div class="card-body">
                <form action="/admin/edit/user/{{$teammembers[1]->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>User Image</label>
                    <input name="image" type="file" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>User Name</label>
                    <input name="name" value="{{old('name', $teammembers[1]->name)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>User Title</label>
                    <input name="title" value="{{old('title', $teammembers[1]->title)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <button class="btn btn-success" type="submit">OK</button>
                </form>
                <form action="/admin/edit/user/{{$teammembers[1]->id}}/delete" method="POST">
                  @csrf
                  <button class="mt-1 btn btn-danger" type="submit">Delete</button>
                </form>
              </div>
            </div>
            @endcan
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
            <h2 class="editable">{!!$text->standouttitle!!}</h2>
            @include('admin.pages.cards.titles.standout')
            <p class="editable">{!!$text->standouttext!!}</p>
            @include('admin.pages.cards.standouttext')
          </div>
          <div class="col-md-3">
            <div class="promo-btn-area editable">
              <div class="site-btn btn-2">{!!$text->browsestandout!!}</div>
            </div>
            @include('admin.pages.cards.buttons.browsestandout')
          </div>
        </div>
      </div>
    </div>

  @include('admin.pages.partials.contact')
  @include('admin.pages.partials.footer')
    
@stop