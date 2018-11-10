@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
    <div class="box ">
      <div class="box-header bg-purple-gradient">
        <h3 class="box-title my-2 ">Services Trash Can</h3>        
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                         
              <th>Deleted On</th> 
              <th>Icon</th>                                                 
              <th>Name</th>                             
              <th>Description</th>  
              <th></th>           
            
            </tr>
          </thead>
          <tbody>
            @foreach ($services as  $key=>$service)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>                          
                <td>{{$service->deleted_at->format('d M Y')}}</td>            
                <td><i class="{{$service->icons->class}}"></i></td>                 
                <td>{{$service->name}}</td> 
                <td>{{$service->content}}</td>                                                                            
                <td class="user-list-btn d-flex">
                  <form action="/admin/edit/service/{{$service->id}}/restore" method="POST">
                    @csrf
                    <button type="submit" class="btn bg-purple">Restore</button>
                  </form>
                </td>
              </tr>              
            @endforeach
          </tbody>
        </table>
        {{$services->links()}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@stop