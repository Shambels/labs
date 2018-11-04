@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')
@include('admin.pages.partials.pageheader')




@include('admin.pages.partials.newsletter')
@include('admin.pages.partials.footer')
@stop