<!-- Header section -->
<header class="header-section">
    <div class="logo">
      <img src="storage/img/logo.png" alt=""><!-- Logo -->
    </div>
    <!-- Navigation -->
    <div class="responsive"><i class="fa fa-bars"></i></div>
    <nav>
      <ul class="menu-list">
        <li class="{{Route::currentRouteName()=='home'? 'active':''}}"><a href="{{route('home')}}">Home</a></li>
        <li class="{{Route::currentRouteName()=='services'? 'active':''}}"><a href="{{route('services')}}">Services</a></li>
      <li class="{{Route::currentRouteName()=='blog'?'active':''}}"><a href="{{route('blog')}}">Blog</a></li>
      <li class="{{Route::currentRouteName()=='contact'?'active':''}}"><a href="{{'contact'}}">Contact</a></li>
      </ul>
    </nav>
  </header>
  <!-- Header section end -->