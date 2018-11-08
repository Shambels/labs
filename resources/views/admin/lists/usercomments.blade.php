@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')



<div class="row">
    <div class="box ">
      <div class="box-header bg-purple">
        <h3 class="box-title my-2 ">{{$user->name}}'s Comments</h3>

        <form class="box-tools">
          @csrf
          <div class="input-group input-group-sm p-2" style="">
            <input type="text" name="table_search" class="form-control pull-right mr-2 rounded" placeholder="Search">
            {{-- <div class="input-group-btn"> --}}
              <button type="submit" class="btn bg-purple"><i class="fa fa-search"></i></button>
            {{-- </div> --}}
          </div>
        </form>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                         
              <th>Validated</th>            
              <th>Creation Date</th>
              <th>Article</th>
              <th>Subject</th>
              <th>Message</th>
              <th></th>
            
            </tr>
          </thead>
          <tbody>
            @foreach ($user->comments as  $key=>$comment)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>
                <td>
                    <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">

                </td>
                {{-- <td>
                  @if ($comment->valid==null)
                    <span class="">TBD</span>
                  @elseif ($comment->vaid==true)
                    <span class="text-success">OK</span>
                  @else
                    <span class="text-danger">DENIED </span>
                  @endif
                </td> --}}
                <td>{{$comment->created_at}}</td>
                <td>{{substr($comment->articles->name,0,35)}}...</td>
                <td>{{$comment->subject}}</td>
                <td><a href="">{{count($user->articles->where('valid',true))}}</a></td>
                <td class="user-list-btn d-flex">
                  <a href="/admin/edit/user/{{$user->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                  <form action="/admin/edit/user/{{$user->id}}/delete" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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