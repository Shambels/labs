@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
  <div class="box ">
    <div class="box-header bg-purple-gradient">
      <h3 class="box-title my-2 ">Clients</h3>      
    </div>
    <div class="togglable arrowable" class="btn btn-light">
        <i class="fas fa-plus"></i>
      </div>
     @include('admin.lists.cards.store.client')
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <thead>
          <tr class="bg-gray">
            <th>#</th>
            <th>Picture</th>                                                
            <th>Title</th>
            <th>Name</th>    
            <th>Company</th>                        
            <th>Actions</th>          
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as  $key=>$client)                
            <tr class="user-list-item">          
              <td>{{$key+1}}</td>
              <td><img src="{{Storage::url('public/images/clients/thumbnails/'.$client->image)}}" alt=""></td>                                                  
              <td>{{$client->title}}</td>
              <td>{{$client->name}}</td>
              <td>{{$client->company}}</td>                      
              <td class="user-list-btn d-flex">
                <a class="btn btn-secondary" href="/admin/edit/client/{{$client->id}}"><i class="fas fa-edit"></i></a>                
                <form action="/admin/edit/client/{{$client->id}}/delete" method="POST">
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
  {{$clients->links()}}
  <!-- /.box -->
</div>

@stop