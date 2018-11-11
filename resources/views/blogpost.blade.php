@extends('layouts/app')

@include('partials/pageheader')

@section('content')
<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Single Post -->
					<div class="single-post">
						<div class="post-thumbnail">
							<img src="{{Storage::url('public/images/articles/'.$article->image)}}" alt="">
							<div class="post-date">
								<h2>03</h2>
								<h3>Nov 2017</h3>
							</div>
						</div>
						<div class="post-content">
            <h2 class="post-title">{{$article->name}}</h2>
							<div class="post-meta">
								<a>{{$article->users->name}}</a>
								<a>
                  @include('partials.tags')
                </a>
								<a>
                  {{count($article->comments->where('valid',true))}}
                  @if ((count($article->comments->where('valid',true))) < 2 ) 
                    Comment
                  @else
                    Comments
                  @endif
                </a>
							</div>
							<p>{{$article->preview}}</p>
							<p>{{$article->content}}</p>
							
						</div>
						<!-- Post Author -->
						<div class="author">
							<div class="avatar">
								<img src="{{Storage::url('public/images/users/mediums/'.$article->users->image)}}" alt="article_author_avatar">
							</div>
							<div class="author-info">
								<h2>{{$article->users->name}}, <span>{{$article->users->title}}</span></h2>
								<p>{{$article->users->bio}}</p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<h2>Comments ( {{count($comments->where('valid',true))}} )</h2>
							<ul class="comment-list">
                @foreach ($comments->where('valid', true) as $comment)
                @if ($comment->users)
								<li>
									<div class="avatar">                         
                    <img src="{{Storage::url('public/images/users/mediums/'.$comment->users->image)}}" alt="comment_author_avatar">                                                           
									</div>
									<div class="comment-text">                  
										<h3>{{$comment->users->name}} | {{$comment->created_at->format('d M, Y')}} | <a href="#sendCommentForm">Reply</a></h3>
										<p>{{$comment->message}}</p>
									</div>
                </li>
                @else
                <li>
                  <div class="avatar">                         
                    <img src="{{Storage::url('public/img/avatar/0'.rand(1,3).'.jpg')}}" alt="default_avatar">                                                         
                  </div>
                  <div class="comment-text">                    
                    <h3>{{$comment->name}} | {{$comment->created_at->format('d M, Y')}} | <a href="#sendCommentForm">Reply</a></h3>
                    <p>{{$comment->message}}</p>
                  </div>
                </li>
                @endif
                @endforeach
							</ul>
						</div>
            <!-- Commert Form -->
            
        @include('admin.alerts.error')
        @include('admin.alerts.success')
				@include('partials.commentform')
					</div>
        </div>
        

			@include('partials.blogsidebar')
			</div>
		</div>
	</div>
  <!-- page section end-->
  
  @include('partials/newsletter')
  @stop