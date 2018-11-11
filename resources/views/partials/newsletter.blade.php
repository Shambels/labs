<!-- newsletter section -->
<div class="newsletter-section spad" id="newsletter">
    @if(session('newslettersuccess'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4>
        <i class="icon fa fa-check"></i> 
        {{session('newslettersuccess')}}
      </h4>
      {{session('message')}}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible text-center">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4>
        {{$errors->first()}}
      </h4>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>{!!$text->newstitle!!}</h2>
            </div>
            <div class="col-md-9">
                <!-- newsletter form -->
                <form class="nl-form" action="{{route('newsletter')}}" method="POST">
                    @csrf
                    @method('POST')                                      
                  <input type="text" value="{{old('email')}}" placeholder="{!!$text->newsplaceholder!!}" name="email" required>
                    <button type="submit" class="site-btn btn-2">{!!$text->newsbtn!!}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- newsletter section end-->