@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
    <div class="box ">
      <div class="box-header bg-purple">
        <h3 class="box-title my-2 ">{{$user->name}}'s Articles</h3>        
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <tr class="bg-gray">
              <th>#</th>                         
              <th>Validated</th>            
              <th>Creation Date</th>              
              <th>Go To Article</th>
              <th>Title</th>
              <th>N° of Comments</th>
              @if(Gate::check('is-admin') || Gate::check('is-author'))
              <th></th>
              @endif

            
            </tr>
          </thead>
          <tbody>
            @foreach ($user->articles as  $key=>$article)                
              <tr class="user-list-item">          
                <td>{{$key+1}}</td>              
                <td>
                  @if ($article->valid==true)
                  <span class="text-success">OK</span>
                  @elseif ($article->valid==false)
                    <span class="text-danger">DENIED </span>
                  @elseif ($article->valid==null)
                  <span class="">TBD</span>
                  @endif
                </td>
                <td>{{$article->created_at->format('d M Y')}}</td>
                <td><a href="/blogpost/{{$article->id}}"><i class="fas fa-eye"></i></a></td>
                <td>{{$article->name}}</td>                
                <td>{{count($article->comments->where('valid',true))}}</td>    
                @if(Gate::check('is-admin') || Gate::check('is-author'))
          
                  <td class="user-list-btn d-flex">

                    <a href="/admin/edit/blogpost/{{$article->id}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    <form action="/admin/edit/article/{{$article->id}}/delete" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </td>
                @endif
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