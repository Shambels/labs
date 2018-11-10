@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
    <div class="box ">
      <div class="box-header bg-purple-gradient">
        <h3 class="box-title my-2 ">User Trash Can</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>
              <th>Rank</th>            
              <th>Deleted On</th>
              <th>Name</th>            
              <th>Email</th>   
              <th>Articles</th>           
              <th>Comments</th>
              <th>Bio</th>
              @can('is-admin')
              <th></th>
              @endcan
            
            </tr>
          </thead>
          <tbody>
            @foreach ($users as  $key=>$user)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>
                <td>
                  @if ($user->roles_id==2)
                    Editor
                  @elseif ($user->roles_id==3)
                    Reader
                  @endif
                </td>                
                <td>{{$user->deleted_at->format('d M Y')}}</td>            
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>  
                <td>
                  <a href="/admin/list/users/trashed/{{$user->id}}/articles">                  
                    {{count(App\Article::withTrashed()->where('users_id',$user->id)->get())}}
                  </a>
                </td>            
                <td>
                  <a href="/admin/list/users/trashed/{{$user->id}}/comments">
                    {{count(App\Comment::withTrashed()->where('users_id',$user->id)->get())}}
                  </a>
                </td>
                <td class="font-italic">{{substr($user->bio, 0,55)}}...</td>
                @can('is-admin')
                  <td class="user-list-btn d-flex">                    
                    <form action="/admin/edit/user/{{$user->id}}/restore" method="POST">
                      @csrf
                      <button type="submit" class="btn bg-purple">Restore</button>
                    </form>
                  </td>
                @endcan
              </tr>              
            @endforeach
          </tbody>
        </table>
        {{$users->links()}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@stop