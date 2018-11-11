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
          <form action="/sendmail"  method="POST" class="form-class" id="con_form" novalidate>
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <input type="text" name="name" value="{{old('name')}}" placeholder="Your name">
              </div>
              <div class="col-sm-6">
                <input type="text" name="email" value="{{old('email')}}" placeholder="Your email">
              </div>
              <div class="col-sm-12">
                <input type="text" name="subject"  value="{{old('subject')}}" placeholder="Subject">
              <textarea name="message" placeholder="Message">{{old('message')}}</textarea>
                <button class="site-btn" type="submit">{!!$text->contactformbtn!!}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>