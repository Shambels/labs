@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
  <div class="box ">
    <div class="box-header bg-purple-gradient">
      <h3 class="box-title my-2 ">Subscribers</h3>      
      </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <thead>
          <tr class="bg-gray">
            <th>#</th>                         
            <th>New</th>            
            <th>Creation Date</th>
            <th>From</th>
            <th>Subject</th>                        
            <th>Message</th>
            <th>Actions</th>          
          </tr>
        </thead>
        <tbody>
          @foreach ($emails as  $key=>$email)                
            <tr class="user-list-item">          
              <td>{{$key+1}}</td>              
              <td>
                @if ($email->old==null)
                <span class="text-danger"><i class="fas fa-exclamation"></i></span>                              
                @endif
              </td>
              <td>{{$email->created_at->format('d M Y')}}</td>
              <td>{{$email->author}}</td>
              <td>{{$email->subject}}</td>
              <td>{{$email->message}}</td>                                            
              <td class="user-list-btn d-flex">
                <form action="/admin/edit/newsletter/{{$email->id}}/confirm" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                </form>
                <form action="/admin/edit/newsletter/{{$email->id}}/delete" method="POST">
                @csrf
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
              </td>
            </tr>              
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  {{$emails->links()}}
  <!-- /.box -->
</div>

@stop