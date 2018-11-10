		<!-- Sidebar area -->
    <div class="col-md-4 col-sm-5 sidebar" {{-- style="position: fixed; right:0; width: 350px; "--}}>
      <!-- Single widget -->
      <div class="widget-item">
        <form action="/admin/list/articles/search" class="search-form" method="POST">
          @csrf
          <input name="search" type="text" placeholder="Search">
          <button class="search-btn" type="submit"><i class="flaticon-026-search"></i></button>
        </form>
      </div>
      <!-- Categories -->
      <div class="widget-item">
        <h2 class="widget-title @can('is-admin') editable @endcan">{!!$text->categories!!}</h2>
        @include('admin.pages.cards.titles.blog.categories')
        <ul>
          @foreach ($categories as $category)
          <li>
            <a class="editable">
              <span>{{$category->name}}</span>
              <span>
                @if ($category->valid==1)
                  <i class=" text-success fas fa-check"></i>
                @elseif ($category->valid==0)
                  <i class=" text-danger fas fa-times"></i>
                </span>
                @endif
            </a>
            @include('admin.pages.cards.blog.category')
          </li>
          @endforeach
          <li><a href="/admin/list/categories">...</a></li>
          <div class="togglable arrowable" class="btn btn-light">
            <i class="fas fa-plus"></i>
          </div>
          @include('admin.pages.cards.blog.store.category')
          
      
        </ul>
      </div>
      <!-- Tags -->
      <div class="widget-item">          
        <h2 class="widget-title @can('is-admin') editable @endcan">{!!$text->tags!!}</h2>
        @include('admin.pages.cards.titles.blog.tags')
        <div class="togglable arrowable" class="btn btn-light">
            <i class="fas fa-plus"></i>
          </div>
          @include('admin.pages.cards.blog.store.tag')
        <ul class="tag">
          @foreach ($tags as $tag)
            <li>
              <a class="editable">{{$tag->name}}    
                @if ($tag->valid==1)
                  <i class=" text-primary fas fa-check"></i>
                @elseif ($tag->valid==0)
                  <i class=" text-danger fas fa-times"></i>
                </span>
                @endif</a>
              @include('admin.pages.cards.blog.tag')
            </li>
          @endforeach 
          <li><a href="/admin/list/tags">...</a></li>  
        </ul>
      </div>
      {{-- {{$tags->links()}}          --}}
    </div>