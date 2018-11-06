@extends('layouts/app')

@include('partials/pageheader')

@section('content')

<!-- page section -->
<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
          <!-- Post item -->
          @foreach ($results as $article)
          {{-- {{dd($article)}} --}}
            <div class="post-item">
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
                  <a href="/blogpost/{{$article->id}}">{{$article->users->name}}</a>
                  <a href="">
                    @foreach ($article->tags as $tag)
                      <span>
                          {{$tag->name}}
                      </span>
                      @if (!$loop->last) , @endif
                    @endforeach
                  </a>
                  <a href="/blogpost/{{$article->id}}">
                    {{count($article->comments->where('valid',true))}}
                    @if ((count($article->comments->where('valid',true))) < 2 ) 
                      Comment
                    @else
                      Comments
                    @endif
                  </a>

                </div>
                <p>{{$article->preview}}</p>
                <a href="/blogpost/{{$article->id}}" class="read-more">{!!$text->readmorebtn!!}</a>
              </div>
            </div>
          @endforeach
					<!-- Pagination -->
					<div class="page-pagination">
						{{$results->links()}}
					</div>
        </div>
        

		@include('partials.blogsidebar')
			</div>
		</div>
	</div>

@include('partials/newsletter')
@stop