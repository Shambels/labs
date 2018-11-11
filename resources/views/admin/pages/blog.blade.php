@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')
@include('admin.pages.partials.pageheader')

<!-- page section -->
<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
          <!-- Post item -->
          @foreach ($articles as $article)
          {{-- {{dd($article)}} --}}
            <div class="post-item editable">
              <div class="post-thumbnail">
              <img src="{{Storage::url('public/images/articles/'.$article->image)}}" alt="">
                <div class="post-date">
                  <h2>{{$article->created_at->format('d')}}</h2>
                  <h3>{{$article->created_at->format('M Y')}}</h3>
                </div>
              </div>
              <div class="post-content">
              <h2 class="post-title">{{$article->name}}</h2>
                <div class="post-meta">
                  <a href="/admin/edit/blogpost/{{$article->id}}">{{$article->users->name}}</a>
                  <a>
                   @include('partials.tags')
                  </a>
                  <a href="/admin/edit/blogpost/{{$article->id}}">
                    {{count($article->comments->where('valid',true))}}
                    @if ((count($article->comments->where('valid',true))) < 2 ) 
                      Comment
                    @else
                      Comments
                    @endif
                  </a>

                </div>
                <p>{{$article->preview}}</p>
                <a href="/admin/edit/blogpost/{{$article->id}}" class="read-more">{!!$text->readmorebtn!!}</a>
              </div>
            </div>
            @include('admin.pages.cards.article')
          @endforeach
					<!-- Pagination -->
					<div class="page-pagination">
						{{$articles->links()}}
          </div>
          <div class="togglable mt-5 arrowable" class="btn btn-light">
            <i style="font-size: 3rem;" class="fas fa-plus demitour"></i>
          </div>
          @include('admin.pages.cards.storearticle')         
        </div>      
	  	@include('admin.pages.partials.blogsidebar')
		</div>
	</div>
</div>


@include('admin.pages.partials.newsletter')
@include('admin.pages.partials.footer')
@stop