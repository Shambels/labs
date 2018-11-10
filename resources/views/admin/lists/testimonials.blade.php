@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content')

@include('admin.alerts.success')
@include('admin.alerts.error')


<div class="row">
  <div class="box ">
    <div class="box-header bg-purple-gradient">
      <h3 class="box-title my-2 ">Subscribers</h3>      
    </div>
    <div class="togglable arrowable" class="btn btn-light">
        <i class="fas fa-plus"></i>
      </div>
      @can('is-editor')
        <div class="card d-none">
          <div class="card-header">
            <h3 class="card-title text-purple">Add New Testimonial</h3>
          </div>
          <div class="card-body">
            <form action="/admin/edit/testimonial/add" method="POST">           
              @csrf
              <div class="form-group">
                <input name="name" value="{{old('name')}}" placeholder="Type Here" type="text" class="form-control">
              </div>
              <button class="btn btn-success" type="submit">Add</button>                
            </form>
          </div>
        </div>
      @endcan
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <thead>
          <tr class="bg-gray">
            <th>#</th>                                     
            <th>Date</th>
            <th>Author</th>                        
            <th>Message</th>
            <th>Actions</th>          
          </tr>
        </thead>
        <tbody>
          @foreach ($testimonials as  $key=>$testimonial)                
            <tr class="user-list-item">          
              <td>{{$key+1}}</td>                                          
              <td>{{$testimonial->created_at->format('d M Y')}}</td>
              <td>@if( $testimonial->clients)
                {{$testimonial->clients->name}}
                @endif
              </td>  
              <td>{{$testimonial->message}}</td>                                          
              <td class="user-list-btn d-flex">
              <a class="btn btn-secondary" href="/admin/edit/testimonial/{{$testimonial->id}}/edit"><i class="fas fa-edit"></i></a>
                <form action="/admin/edit/testimonial/{{$testimonial->id}}/delete" method="POST">
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
  {{$testimonials->links()}}
  <!-- /.box -->
</div>

@stop