@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
    <div class="box ">
      <div class="box-header bg-purple">
        <h3 class="box-title my-2 ">Article Trash Can</h3>        
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                         
              <th>Deleted On</th>
              <th>Author</th>                                     
              <th>Title</th>                             
              <th>Preview</th>
              @can('is-admin')
              <th></th>
              @endcan
            
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as  $key=>$article)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>                          
                <td>{{$article->deleted_at->format('d M Y')}}</td>            
                <td>
                  @if (App\User::withTrashed()->find($article->users_id)->trashed())
                  <a href="/admin/trash/users">
                    {{App\User::withTrashed()->find($article->users_id)->name}}</td>
                  </a>
                  @else
                  <a href="/admin/list/users">
                    {{App\User::withTrashed()->find($article->users_id)->name}}</td>
                  </a>
                  @endif
                <td>{{$article->name}}</td>             
                <td>{{$article->preview}}</td>                                
                @can('is-admin')
                  <td class="user-list-btn d-flex">                    
                    <form action="/admin/edit/article/{{$article->id}}/restore" method="POST">
                      @csrf
                      <button type="submit" class="btn bg-purple">Restore</button>
                    </form>
                  </td>
                @endcan
              </tr>              
            @endforeach
          </tbody>
        </table>
        {{$articles->links()}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@stop





