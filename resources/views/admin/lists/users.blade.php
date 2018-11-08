@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')

<h1>Admin</h1>
<div class="box box-widget widget-user">
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
          <div class="description-block">
            <h5 class="description-header">{{count($admin->articles)}}</h5>
            <span class="description-text">Articles</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <div class="description-block">
            <h5 class="description-header">{{count($admin->comments)}}</h5>
            <span class="description-text">Comments</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
<h1>Team Members</h1>
@foreach ($team->chunk(3) as $chunk)
  <div class="row">
    @foreach ($chunk as $user)        
      <div class="col-md-4">      
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header bg-purple">
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="Admin Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username text-warning">{{$user->name}}</h3>
            <h5 class="widget-user-desc">{{$user->title}}</h5>
            <h6 class="widget-user-desc py-1 font-italic">{{$user->email}}</h6>
            <h6 class="widget-user-desc">           
              <button type="button" class="btn btn" data-widget="collapse">
                <i class="fa fa-arrow-down"></i>
              </button>                
              <div class="box-body" style="display: none;">
                  Bio: <br>
                  {{$user->bio}}
                </div>
                <!-- /.box-body -->
              {{-- </div> --}}
            </h6>
          </div>
          
          <div class="box-body" style="display:none">
            <ul class="nav-stacked" style="list-style-type: none;">
              <li class="py-2"><a href="#">Articles <span class="pull-right badge bg-blue">31</span></a></li>
              <li class="py-2"><a href="#">Comments<span class="pull-right badge bg-aqua">5</span></a></li>
             
             
            </ul>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endforeach
<h1>Users</h1>
@stop