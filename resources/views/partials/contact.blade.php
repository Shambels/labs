<div class="contact-section spad fix">
    <div class="container">
      <div class="row">
        <!-- contact info -->
        <div class="col-md-5 offset-1 contact-info col-push">
          <div class="section-title left">
            <h2>{!!$text->contacttitle!!}</h2>
          </div>
        <p>{!!$text->contacttext!!}</p>
          <h3 class="mt60">{!!$text->contactoffice!!}</h3>
          <p class="con-item">{!!$text->contactaddress!!} <br> {!!$text->contacttown!!} </p>
          <p class="con-item">{!!$text->contactphone!!}</p>
          <p class="con-item">{!!$text->contactemails!!}</p>
        </div>
        <!-- contact form -->
        <div class="col-md-6 col-pull">
            @if(session('mailsuccess'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>
                <i class="icon fa fa-check"></i> 
                {{session('mailsuccess')}}
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
          <form action="/sendmail"  method="POST" class="form-class" id="con_form">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <input type="text" name="name" value="{{old('name')}}" placeholder="Your name">
              </div>
              <div class="col-sm-6">
                <input type="text" name="email" required value="{{old('email')}}" placeholder="Your email">
              </div>
              <div class="col-sm-12">
                <input type="text" name="subject"  value="{{old('subject')}}" placeholder="Subject">
              <textarea name="message" required placeholder="Message">{{old('message')}}</textarea>
                <button class="site-btn" type="submit">{!!$text->contactformbtn!!}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>