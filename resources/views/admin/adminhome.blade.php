@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@if (Gate::check('is-editor')) 
  <h1 class="m-3 text-center">What's New</h1>
@else
  <h1>Welcome, {{Auth::user()->name}}</h1>
@endif
@stop


@section('content')


@if (Gate::check('is-editor'))


<div class="row">
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
    <!-- ./col -->
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
    <!-- ./col -->
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
    <!-- ./col -->
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
    <!-- ./col -->
  </div>
  @endif
@stop