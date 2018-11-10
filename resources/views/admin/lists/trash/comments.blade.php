@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')



<div class="row">
    <div class="box ">
      <div class="box-header bg-purple">
        <h3 class="box-title my-2 ">Comments Trash Can</h3>       
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                                                 
              <th>Deleted On</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Article</th>
              <th>Author</th>
              <th></th>
            
            </tr>
          </thead>
          <tbody>
            @foreach ($comments as  $key=>$comment)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>                            
                <td>{{$comment->deleted_at->format('d M Y')}}</td>
                <td>{{substr($comment->subject,0,30)}}...</td>
                <td>{{substr($comment->message,0,30)}}...</td>                
                <td>
                  @if ($comment->articles)
                    @if (Auth::user()->id==1)
                    <a href="/admin/edit/blogpost/{{$comment->articles->id}}"><i class="fas fa-search text-purple"></i></a>
                    @else
                    <a href="/blogpost/{{$comment->articles->id}}"><i class="fas fa-search text-purple"></i></a>
                    @endif
                  @else
                    <span class="text-gray">Deleted</span>
                  @endif

                </td>
                <td class="user-list-btn d-flex">
                  <form action="/admin/edit/comment/{{$comment->id}}/restore" method="POST">
                    @csrf
                    <button type="submit" class="btn bg-purple">Restore</button>
                  </form>
                </td>
              </tr>              
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>













@stop