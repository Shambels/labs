@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')
@include('admin.pages.partials.pageheader')


<div class="map" id="map-area"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="{{asset('js/map.js')}}"></script>
{{-- <iframe src="https://www.google.com/maps/embed?pb=1m18!1m12!!!!!!!!!!!!!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!!!!!" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>  --}}

{{-- <iframe src="http://maps.google.com/maps?q=24.197611,120.780512"></iframe> --}}

@include('admin.pages.partials.contact')
@include('admin.pages.partials.footer')
@stop