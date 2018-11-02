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
							<img src="{{$article->image}}" alt="">
							<div class="post-date">
								<h2>03</h2>
								<h3>Nov 2017</h3>
							</div>
						</div>
						<div class="post-content">
            <h2 class="post-title">{{$article->name}}</h2>
							<div class="post-meta">
								<a href="">{{$article->users->name}}</a>
								<a href="">
                    @foreach ($article->tags as $tag)
                    <span>
                        {{$tag->name}}
                    </span>
                    @if (!$loop->last) , @endif
                  @endforeach
                </a>
								<a href="">
                  {{count($article->comments)}}
                  @if ((count($article->comments)) < 2 ) 
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
								<img src="{{$article->users->image}}" alt="">
							</div>
							<div class="author-info">
								<h2>{{$article->users->name}}, <span>{{$article->users->title}}</span></h2>
								<p>{{$article->users->bio}}</p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<h2>Comments ( {{count($article->comments)}} )</h2>
							<ul class="comment-list">
                @foreach ($comments as $comment)
								<li>
									<div class="avatar">
                    {{-- <img src="{{Storage::url($comment->users->image)}}" alt=""> --}}
                    <img src="{{$comment->users->image}}" alt="">
									</div>
									<div class="commetn-text">
										<h3>{{$comment->users->name}} | {{$comment->created_at->format('d M, Y')}} | <a href="#sendCommentForm">Reply</a></h3>
										<p>{{$comment->content}}</p>
									</div>
                </li>
                @endforeach
							</ul>
						</div>
						<!-- Commert Form -->
						<div class="row">
							<div id="sendCommentForm" class="col-md-9 comment-from">
								<h2>{{$text->leavecom}}</h2>
								<form class="form-class">
									<div class="row">
										<div class="col-sm-6">
											<input type="text" name="name" placeholder="Your name">
										</div>
										<div class="col-sm-6">
											<input type="text" name="email" placeholder="Your email">
										</div>
										<div class="col-sm-12">
											<input type="text" name="subject" placeholder="Subject">
											<textarea name="message" placeholder="Message"></textarea>
											<button class="site-btn">{{$text->leavecom}}</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
        </div>
        

			@include('partials.blogsidebar')
			</div>
		</div>
	</div>
  <!-- page section end-->
  
  @include('partials/newsletter')
  @stop