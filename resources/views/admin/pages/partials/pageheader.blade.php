<!-- Page header -->
<div class="page-top-section">
  <div class="overlay"></div>
  <div class="container text-right">
    <div class="page-info">
      <h2 class="editable">
        @if(Route::currentRouteName()== 'editservices')
        {!!$text->servicessection!!}
        @elseif(Route::currentRouteName()== 'editcontact')
        {!!$text->contactsection!!}
        @else
        {!!$text->blogsection!!}
        @endif
      </h2>
      @include('admin.pages.cards.partials.pageheader')
      <div class="page-links">
        <a  class="editable">{!!$text->homesection!!}</a>
        @include('admin.pages.cards.homepagename')
        @if(Route::currentRouteName()== 'editservices')
        <span>{!!$text->servicessection!!}</span>
        @elseif(Route::currentRouteName()== 'editcontact')
        <span>{!!$text->contactsection!!}</span>
        @else
        <span>{!!$text->blogsection!!}</span>
        @endif
      </div>
      
    </div>
  </div>
</div>
<!-- Page header end-->