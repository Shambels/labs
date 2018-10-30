<!-- Header section -->
<header class="header-section">
    <div class="logo">
      <img src="storage/img/logo.png" alt=""><!-- Logo -->
    </div>
    <!-- Navigation -->
    <div class="responsive"><i class="fa fa-bars"></i></div>
    <nav>
      <ul class="menu-list">
        <li class="{{Route::currentRouteName()=='home' ? 'active':''}}"><a href="/">Home</a></li>
        <li><a class="{{Route::currentRouteName()=='services'?'active':''}}"href="/services">Services</a></li>
        <li><a class="{{Route::currentRouteName()=='blog'?'active':''}}"href="/blog">Blog</a></li>
        <li><a class="{{Route::currentRouteName()=='contact'?'active':''}}"href="/contact">Contact</a></li>
      </ul>
    </nav>
  </header>
  <!-- Header section end -->