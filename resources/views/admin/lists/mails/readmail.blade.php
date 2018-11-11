@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')



<div class="box">
    <div class="box-header bg-purple-gradient">
      <h3 class="box-title">Read Mail</h3>      
      <div class="box-tools pull-right d-flex">
        @if ($previous)
        <form action="/admin/edit/mail/{{$previous}}/read" method="post">
          @csrf          
          <button type="submit" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></button>
        </form>
        @endif
        @if($next)
        <form action="/admin/edit/mail/{{$next}}/read" method="post">
          @csrf              
          <button type="submit" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></button>
        </form>
        @endif
      </div>
    </div>    
    <div class="box-body no-padding">
      <div class="mailbox-read-info bg-gray-light">
        <h3>@if ($mail->subject!= 'None'){{$mail->subject}} @endif</h3>
        <h5>From: <span class="font-italic">{{$mail->from}}</span> @if ($mail->name!= 'Unknown') ---  "{{$mail->name}}" @endif 
          <span class="mailbox-read-time pull-right">{{$mail->created_at->format('d M Y \a\t H\:m\:s')}}</span></h5>
      </div>          
      <div class="mailbox-read-message">
      <p>{{$mail->message}}</p>
      </div>      
    </div>    
    <div class="box-footer">
      <ul class="mailbox-attachments clearfix">       
      </ul>
    </div>    
    <div class="box-footer">
      <div class="pull-right">
        <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
        <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
      </div>
      <form action="/admin/edit/mail/{{$mail->id}}/delete" method="post">
      @csrf
        <button type="submit" class="btn btn-default"><i class="text-danger fas fa-trash-alt"></i></button>
        <button type="button" class="btn btn-default"><i class="fa fa-print"></i></button>
      </form>
    </div>    
  </div>















  @stop