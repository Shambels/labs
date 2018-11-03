<div class="services-section spad">
    <div class="container">
      <div class="section-title dark">
        <h2>{!!$text->services!!}</h2>
      </div>
      <div class="row">
        @foreach ($services as $service)
        <!-- single service -->
        <div class="col-md-4 col-sm-6">
          <div class="service">
            <div class="icon">
            <i class="{{$service->icons->class}}"></i>
            </div>
            <div class="service-text">
            <h2>{{$service->name}}</h2>
              <p>{{$service->content}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        @if (Route::currentRouteName()=='services')
          {{$services->links()}}
        @else
      <a href="{{Route('services')}}" class="site-btn">{!!$text->browseservices!!}</a>
        @endif
      </div>
    </div>
  </div>
  <!-- services section end -->