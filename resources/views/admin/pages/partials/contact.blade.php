{{-- CONTACT SECTION --}}
<div class="contact-section spad fix" style="background: blueviolet;">
    <div class="container">
      <div class="row">
        <!-- contact info -->
        <div class="col-md-5 offset-1 contact-info col-push">
          <div class="section-title left">
            <h2 class="editable">{!!$text->contacttitle!!}</h2>
            @include('admin.pages.cards.titles.contact')
          </div>
          <p class="editable">{!!$text->contacttext!!}</p>
          @include('admin.pages.cards.contacttext')
          <div class="editable">
            <h3 class="mt60">{!!$text->contactoffice!!}</h3>
            <p class="con-item">{!!$text->contactaddress!!} <br> {!!$text->contacttown!!} </p>
            <p class="con-item">{!!$text->contactphone!!}</p>
            <p class="con-item">{!!$text->contactemail!!}</p>
          </div>
          @include('admin.pages.cards.contactinfo')
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
                <div class="site-btn editable ">{!!$text->contactformbtn!!}</div>
                @include('admin.pages.cards.buttons.send')
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>