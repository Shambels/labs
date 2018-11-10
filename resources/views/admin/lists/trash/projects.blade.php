@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')

<div class="row">
    <div class="box ">
      <div class="box-header bg-purple-gradient">
        <h3 class="box-title my-2 ">Projects Trash Can</h3>        
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                         
              <th>Deleted On</th>                                                               
              <th>Image</th>                           
              <th>Name</th> 
              <th>Description</th>  
              <th></th>           
            
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as  $key=>$project)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>                          
                <td>{{$project->deleted_at->format('d M Y')}}</td> 
                <td><img src={{Storage::url('public/images/projects/thumbnails/'.$project->image)}} alt=""></td>                           
                <td>{{$project->name}}</td> 
                <td>{{$project->content}}</td>                                                                            
                <td class="user-list-btn d-flex">
                  <form action="/admin/edit/project/{{$project->id}}/restore" method="POST">
                    @csrf
                    <button type="submit" class="btn bg-purple">Restore</button>
                  </form>
                </td>
              </tr>              
            @endforeach
          </tbody>
        </table>
        {{$projects->links()}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>



@stop