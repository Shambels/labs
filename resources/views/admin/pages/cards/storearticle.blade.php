@can ('is-editor')
  <div class="card d-none">
    <div class="card-header bg-purple-gradient">
      <h3 class="card-title">Add Article</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/article/add" method="POST" enctype="multipart/form-data">
        @csrf      
        <div class="form-group">
          <label>Image</label>
          <input name="image" type="file" class="form-control">
        </div>
        <div class="form-group">
          <label>Title</label>
          <input name="name" value="{{old('name')}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Preview</label>
            <textarea name="preview" placeholder="Type here" type="text" class="form-control">{{old('preview')}}</textarea>
          </div>
        <div class="form-group">
          <label>Content</label>
          <textarea name="content" rows="8" placeholder="Type here" type="text" class="form-control">{{old('content')}}</textarea>
        </div>      
        <button class="btn btn-success" type="submit">OK</button>
      </form>
    </div>
  </div>
@endcan