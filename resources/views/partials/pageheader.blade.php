<!-- Page header -->
<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>
					@if(Route::currentRouteName()== 'services')
					Services
					@elseif(Route::currentRouteName()== 'contact')
					Contact
					@else
					Blog
					@endif
				</h2>
				<div class="page-links">
					<a href="{{route('home')}}">Home</a>
					@if(Route::currentRouteName()== 'services')
					<span>Services</span>
					@elseif(Route::currentRouteName()== 'contact')
					<span>Contact</span>
					@else
					<span>Blog</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->