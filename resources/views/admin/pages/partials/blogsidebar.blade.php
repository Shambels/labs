		<!-- Sidebar area -->
    <div class="col-md-4 col-sm-5 sidebar">
        <!-- Single widget -->
        <div class="widget-item">
          <form action="#" class="search-form">
            <input type="text" placeholder="Search">
            <button class="search-btn"><i class="flaticon-026-search"></i></button>
          </form>
        </div>
        <!-- Categories -->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->categories!!}</h2>
          @include('admin.pages.cards.titles.blog.categories')
          <ul>
            @foreach ($categories as $category)
            <li><a href="#">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <!-- Instagram-->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->instagram!!}</h2>
          @include('admin.pages.cards.titles.blog.instagram')
          <ul class="instagram">
            @foreach ($instagrams as $instagram)
              <li><img src="{{Storage::url($instagram->name)}}" alt=""></li>
            @endforeach
          </ul>
        </div>
        <!-- Tags -->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->tags!!}</h2>
          @include('admin.pages.cards.titles.blog.tags')
          <ul class="tag">
            @foreach ($tags as $tag)
              <li><a href="">{{$tag->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <!-- Quote-->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->quote!!}</h2>
          @include('admin.pages.cards.titles.blog.quote')
          <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p>{{$quote}}</p>
          </div>
        </div>
        <!-- Ad -->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->ad!!}</h2>
          @include('admin.pages.cards.titles.blog.ad')
          <div class="add">
            <a href=""><img src="{{Storage::url($ad->name)}}" alt=""></a>
          </div>
        </div>
      </div>