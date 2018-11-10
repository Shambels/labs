@can('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title text-purple">Add New Client</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/client/add" method="POST" enctype="multipart/form-data">           
      @csrf
      <div class="form-group">
        <label for="">Title</label>
        <input name="title" value="{{old('title')}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Name</label>
        <input name="name" value="{{old('name')}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Company</label>
        <input name="company" value="{{old('company')}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Picture</label>
        <input name="image" type="file" class="form-control">
      </div>      
      <button class="btn btn-success" type="submit">Add</button>                
    </form>
  </div>
</div>
@endcan