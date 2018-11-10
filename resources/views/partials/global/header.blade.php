<!-- Header section -->
<header class="header-section">
    <div class="logo">
      <img src="{{Storage::url('public/images/logo/mini/'.$logo->name)}}" alt=""><!-- Logo -->
    </div>
    <!-- Navigation -->
    <div class="responsive"><i class="fa fa-bars"></i></div>
    <nav>
      <ul class="menu-list">
        <li class="{{Route::currentRouteName()=='home'? 'active':''}}"><a href="{{route('home')}}">{{$text->homesection}}</a></li>
        <li class="{{Route::currentRouteName()=='services'? 'active':''}}"><a href="{{route('services')}}">{{$text->servicessection}}</a></li>
        <li class="{{Route::currentRouteName()=='blog'?'active':''}}"><a href="{{route('blog')}}">{{$text->blogsection}}</a></li>
        <li class="{{Route::currentRouteName()=='contact'?'active':''}}"><a href="{{route('contact')}}">{{$text->contactsection}}</a></li>
        @auth
          @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
            <li><a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">{{ trans('adminlte::adminlte.log_out') }}</a></li>
          @else
          @can('is-editor')
            <li><a href="{{route('adminhome')}}">Editing Section</a></li>
          @endcan
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
              <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                  {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
              </form>
                @endif
                @else        
                  <li class="{{Route::currentRouteName()=='login'?'active':''}}"><a href="/login">Log In</a></li>
        @endauth
      </ul>
    </nav>
  </header>
  <!-- Header section end -->