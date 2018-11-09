@can ('is-admin')
  <div class="card d-none text-left ">
    <div class="card-header bg-purple">
      <h3 class="card-title">Add Project</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/addproject" method="POST" enctype="multipart/form-data">
        @csrf                   
        <div class="form-group">
          <label>Name</label>
          <input name="name" value="{{old('name')}}" required placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input name="content" value="{{old('content')}}" required placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Image</label>
          <input type="file" name="image" value={{old('image')}}>
        </div>
        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
      </form>
    </div>
  </div>
@endcan