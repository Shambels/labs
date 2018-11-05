@extends('layouts/app')

@include('partials/pageheader')

@section('content')
{{-- <div class="map" id="map-area"></div> --}}
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.693327187696!2d4.3390363157460925!3d50.855362979533275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sen!2sbe!4v1541413555770" width="100%" height="80%" frameborder="0" style="border:0" allowfullscreen></iframe>
@include('partials/contact')


@stop