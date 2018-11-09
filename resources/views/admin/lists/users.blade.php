@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')
@can('is-admin')
<h1 class="mb-3">Admin</h1>
<div class="box box-widget widget-user editable">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-purple">
    <h2 class="widget-user-username text-orange ">{{$admin->name}}</h2>
    <h5 class="widget-user-desc">{{$admin->title}}</h5>
    <h6 class="widget-user-desc font-italic">{{$admin->email}}</h5>
  </div>
  <div class="widget-user-image">
    <img class="rounded-circle" src="{{Storage::url('public/images/users/mediums/'.$admin->image)}}" alt="User Avatar">
  </div>
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-6">
        <a href="/admin/list/users/{{$admin->id}}/articles">
          <div class="description-block">
            <h5 class="description-header">{{count($admin->articles)}}</h5>
            <span class="description-text">
              @if (count($admin->articles)<2) 
              Article
              @else
              Articles
              @endif
            </span>
          </div>
        </a>
      </div>      
      <div class="col-sm-6">
        <a href="/admin/list/users/{{$admin->id}}/comments">
          <div class="description-block">
            <h5 class="description-header">{{count($admin->comments)}}</h5>
            <span class="description-text">
              @if (count($admin->comments)<2)
              Comment
              @else
              Comments
              @endif
            </span>
          </div>
        </a>
      </div>      
    </div>
  </div>
</div>
@include('admin.lists.cards.edit.admin')

{{-- TEAM --}}
<h1 class="mb-3">Team Members</h1>
  @foreach ($team->chunk(3) as $chunk)
    <div class="row">
      @foreach ($chunk as $user)        
        <div class="col-md-4">      
          <div class="box box-widget widget-user-2 editable collapsed-box">
            <div class="widget-user-header bg-gray">
              <div class="widget-user-image">
                <img class="img-circle" src="{{Storage::url('public/images/users/thumbnails/'.$user->image)}}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username text-purple">{{$user->name}}</h3>
              <h5 class="widget-user-desc">{{$user->title}}</h5>
              <h6 class="widget-user-desc py-1 font-italic">{{$user->email}}</h6>
              <h6 class="widget-user-desc">           
                <button type="button" class="btn bg-gray arrowable" data-widget="collapse">
                  <i class="fa fa-arrow-down"></i>
                </button>                
                <div class="box-body" style="display: none;">
                    Bio: <br>
                    {{$user->bio}}
                  </div>               
              </h6>
            </div>            
            <div class="box-body" style="display:none">
              <ul class="nav-stacked" style="list-style-type: none;">
                <li class="py-2"><a href="/admin/list/users/{{$user->id}}/articles">Articles <span class="pull-right badge bg-blue">{{count($user->articles->where('valid',true))}}</span></a></li>
                <li class="py-2"><a href="/admin/list/users/{{$user->id}}/comments">Comments<span class="pull-right badge bg-aqua">{{count($user->comments->where('valid',true))}}</span></a></li>
                
                
              </ul>
            </div>
          </div>
          @include('admin.lists.cards.edit.user')
        </div>
      @endforeach
    </div>
  @endforeach
{{--  --}}
<h1 >Users</h1>
<div class="togglable" class="btn btn-light" style="font-size: 1.8rem;">
  <i class="fas fa-plus"></i>
</div>
@include('admin.lists.cards.store.user')
@endcan

<div class="row">
    <div class="box ">
      <div class="box-header bg-purple">
        <h3 class="box-title my-2 ">User List</h3>

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
              <th>Name</th>            
              <th>Creation Date</th>
              <th>Email</th>              
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
                <td>{{$user->name}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->email}}</td>              
                <td>
                  <a href="/admin/list/users/{{$user->id}}/comments">
                    <span class="text-purple">{{count($user->comments->where('valid',true))}}</span>
                    <span >({{count($user->comments->where('valid',false))}})</span>
                  </a>
                </td>
                <td class="font-italic">{{substr($user->bio, 0,55)}}...</td>
                @can('is-admin')
                  <td class="user-list-btn d-flex">
                    <a href="/admin/edit/user/{{$user->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    <form action="/admin/edit/user/{{$user->id}}/delete" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </form>
                  </td>
                @endcan
              </tr>              
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>


@stop