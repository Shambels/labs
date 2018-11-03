<!-- Page header -->
<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>
					@if(Route::currentRouteName()== 'services')
					{!!$text->servicessection!!}
					@elseif(Route::currentRouteName()== 'contact')
					{!!$text->contactsection!!}
					@else
					{!!$text->blogsection!!}
					@endif
				</h2>
				<div class="page-links">
					<a href="{{route('home')}}">{!!$text->homesection!!}</a>
					@if(Route::currentRouteName()== 'services')
					<span>{!!$text->servicessection!!}</span>
					@elseif(Route::currentRouteName()== 'contact')
					<span>{!!$text->contactsection!!}</span>
					@else
					<span>{!!$text->blogsection!!}</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->