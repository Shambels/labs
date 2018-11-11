@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')

@include('admin.lists.partials.blogheader')    

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
            <h5 class="">
              {{$article->name}}
              @if ($article->valid==1)
                <i class=" text-success fas fa-check"></i>
              @elseif ($article->valid==0)
                <i class=" text-danger fas fa-times"></i>          
            @endif
            </h5>
              <div class="post-meta mb-0">
                <a href="/admin/edit/blogpost/{{$article->id}}">{{$article->users->name}}</a>
                <a>
                  @include('admin.lists.partials.tags')
                </a>
                <a href="/admin/edit/blogpost/{{$article->id}}">
                  {{count($article->comments->where('valid',true))}}
                  @if ((count($article->comments->where('valid',true))) < 2 ) 
                    Comment
                  @else
                    Comments
                  @endif
                </a>
                <a href="/admin/edit/blogpost/{{$article->id}}" class="read-more">{!!$text->readmorebtn!!}</a>
              </div>             
            </div>
          </div>
          @include('admin.pages.cards.article')
        @endforeach
        <!-- Pagination -->
        <div class="page-pagination">
          {{$articles->links()}}
        </div>
      </div>
      

  @include('admin.lists.partials.blogsidebar')
    </div>
  </div>
</div>






















@stop