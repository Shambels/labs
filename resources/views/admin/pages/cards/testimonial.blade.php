 {{-- Testimonial Edit Card --}}
 @can ('is-admin') 
 <div class="card card-warning d-none">
   <div class="card-header">
     <h3 class="card-title">Edit Testimonial</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
     <form action="/admin/edit/testimonial/{{$testimonial->id}}" method="POST">
       @csrf
       <!-- textarea -->
       <div class="form-group">
         <label>Testimonial Message</label>
         <textarea name="message" class="form-control" rows="3" placeholder="Type Here">{{old('message',$testimonial->message)}}</textarea>
       </div>
       <button class="btn btn-success" type="submit">OK</button>
      </form>
      <form action="/admin/edit/testimonial/{{$testimonial->id}}/delete" method="POST">
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
  </div>
@endcan