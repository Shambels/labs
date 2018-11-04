<!-- newsletter section -->
<div class="newsletter-section spad" id="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h2 class="editable">{!!$text->newstitle!!}</h2>
        @include('admin.pages.cards.titles.newsletter')
      </div>
      <div class="col-md-9">
        <div class="nl-form">                            
          <input type="text" placeholder="{!!$text->newsplaceholder!!}" name="newsemail" class="m-0">
          <button onclick="preventDefault();" class="site-btn btn-2 editable">{!!$text->newsbtn!!}</button>
          @include('admin.pages.cards.buttons.newsletter')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- newsletter section end-->