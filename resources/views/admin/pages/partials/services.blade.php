<div class="services-section spad">
  <div class="container">
    <div class="section-title dark">
      <h2 class="editable">{!!$text->services!!}</h2>
      @include('admin.pages.cards.titles.services')
    </div>
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
      @if (Route::currentRouteName()=='editservices')
        {{$services->links()}}
        <div class="togglable arrowable" class="btn btn-light" style="font-size: 1.8rem;">
            <i class="fas fa-arrow-up demitour"></i>
        </div>
          @include('admin.lists.cards.store.service')
      @else
    <div class="site-btn editable">{!!$text->browseservices!!}</div>
    @include('admin.pages.cards.buttons.browseservices')
      @endif
    </div>
  </div>
</div>
<!-- services section end -->