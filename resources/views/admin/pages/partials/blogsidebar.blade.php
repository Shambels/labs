		<!-- Sidebar area -->
    <div class="col-md-4 col-sm-5 sidebar">
        <!-- Single widget -->
        <div class="widget-item">
          <form action="/admin/search" class="search-form" method="POST">
            @csrf
            <input name="search" type="text" placeholder="Search">
            <button class="search-btn" type="submit"><i class="flaticon-026-search"></i></button>
          </form>
        </div>
        <!-- Categories -->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->categories!!}</h2>
          @include('admin.pages.cards.titles.blog.categories')
          <ul>
            @foreach ($categories as $category)
            <li>
              <a class="editable">{{$category->name}}</a>
              @include('admin.pages.cards.blog.category')
            </li>
            @endforeach
            <div class="togglable arrowable" class="btn btn-light">
              <i class="fas fa-plus demitour"></i>
            </div>
            @include('admin.pages.cards.blog.store.category')
        
          </ul>
        </div>
        <!-- Instagram-->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->instagram!!}</h2>
          @include('admin.pages.cards.titles.blog.instagram')
          <ul class="instagram">
            @foreach ($instagrams as $instagram)
              <li class="editable">
                <img src="{{Storage::url('public/images/instagram/thumbnails/'.$instagram->name)}}" alt="">
              </li>
              @include('admin.pages.cards.blog.instagram')
            @endforeach
          </ul>
        </div>
        <!-- Tags -->
        <div class="widget-item">          
          <h2 class="widget-title editable">{!!$text->tags!!}</h2>
          @include('admin.pages.cards.titles.blog.tags')
          <div class="togglable arrowable" class="btn btn-light">
              <i class="fas fa-plus demitour"></i>
            </div>
            @include('admin.pages.cards.blog.store.tag')
          <ul class="tag">
            @foreach ($tags as $tag)
              <li>
                <a class="editable">{{$tag->name}}</a>
                @include('admin.pages.cards.blog.tag')
              </li>
            @endforeach            
          </ul>
        </div>
        
        <!-- Quote-->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->quote!!}</h2>
          @include('admin.pages.cards.titles.blog.quote')
          <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p class="editable">{{$quote->message}}</p>
            @include('admin.pages.cards.blog.quote')
          </div>
        </div>
        <!-- Ad -->
        <div class="widget-item">
          <h2 class="widget-title editable">{!!$text->ad!!}</h2>
          @include('admin.pages.cards.titles.blog.ad')
          <div class="add">
            <a>
              <img class="editable" src="{{Storage::url('public/images/ad/'.$ad->name)}}" alt="">
              @include('admin.pages.cards.blog.ad')
            </a>
          </div>
        </div>
      </div>