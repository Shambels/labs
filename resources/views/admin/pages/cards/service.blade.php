 {{-- Service Edit Card --}}
 @can ('is-admin') 
 <div class="card card-warning d-none">
   <div class="card-header bg-purple-gradient">
     <h3 class="card-title">Edit Service</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
     <form action="/admin/edit/service/{{$service->id}}" method="POST">
       @csrf
       <!-- text input -->
       <div class="form-group">
         <label>Service Name</label>
         <input name="name" value="{{old('name',$service->name)}}" type="text" class="form-control" placeholder="Service Name">
       </div>
       <!-- textarea -->
       <div class="form-group">
         <label>Service Content</label>
         <textarea name="content" class="form-control" rows="3" placeholder="Service Description">{{old('content',$service->content)}}</textarea>
       </div>
       <!-- select -->
       <div class="form-group">
         <label>Select Icon</label>
         <select name="icon" id="">
           <option value="{{$service->icons->id}}">
               <i class="{{$service->icons->class}}"></i>
             </option>
             @foreach ($icons as $icon)
             @if ($service->icons->id != $icon->id)
             <option value="{{$icon->id}}">
                 <i class="{!!$icon->class!!}"></i>
               </option>
               @endif
               @endforeach
             </select>
           </div>
           <button class="btn btn-success" type="submit">OK</button>
         </form>
         <form action="/admin/edit/service/{{$service->id}}/delete" method="POST">
          @csrf  
          <button class="btn btn-danger" type="submit">Delete</button>
         </form>
       </div>
       <!-- /.card-body -->
     </div>
     @endcan