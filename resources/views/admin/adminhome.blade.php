@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@if (Gate::check('is-editor')) 
  <h1 class="m-3 text-center">What's New</h1>
@else
  <h1>Welcome {{Auth::user()->name}} !</h1>
@endif
@stop


@section('content')


@if (Gate::check('is-editor'))
@if( (count($articles)>0) || (count($comments)>0) || (count($categories)>0) || (count($tags)>0) )
<h1 class="my-2">Blog</h1>
@endif
<div class="row">
  {{-- NEW ARTICLES --}}
  @if (count($articles) >0 )
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{count($articles)}}</h3>
          <p>Articles</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/admin/list/articles" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  @endif
  @if( count($comments) >0 )
  
    {{-- NEW COMMENTS --}}
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{count($comments)}}{{-- <sup style="font-size: 20px">%</sup> --}}</h3>

          <p>Comments</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/admin/list/comments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  @endif
  @if( count($categories)>0 )
    {{-- NEW CATEGORIES --}}
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{count($categories)}}</h3>

          <p>Categories</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/admin/list/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  @endif
  @if( count($tags)>0 )
    {{-- NEW TAGS --}}
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{count($tags)}}</h3>

          <p>Tags</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/admin/list/tags" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endif
  </div>
@can ('is-admin')
@if( (count($newsmails) >0) || (count($inbox) >0) )
  <h1 class="my-2">Contact</h1>
@endif
<div class="row">
@if( count($inbox) >0 )
  <!-- NEWSLETTER E-Mails -->
  <div class="col-sm-6 col-12">
    <a href="/admin/list/inbox">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>        
        <div class="info-box-content">
          <span class="info-box-text">New Mails</span>
          <span class="info-box-number">{{count($inbox)}}</span>
        </div>
      </div>
    </a>
  </div>
 @endif 


@if( count($newsmails) >0 )
  {{-- INBOX --}}
  <div class="col-sm-6 col-12">
    <a href="/admin/list/newsletter">
      <div class="info-box">
        <span class="info-box-icon bg-teal"><i class="fas fa-user"></i></span>        
        <div class="info-box-content">
          <span class="info-box-text">New Subscribers</span>
          <span class="info-box-number">{{count($newsmails)}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
  </div>
@endif
</div>
@endcan
@endif
@stop