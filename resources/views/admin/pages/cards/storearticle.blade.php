@can ('is-editor')
  <div class="card d-none">
    <div class="card-header">
      <h3 class="card-title">Add Article</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/article/add" method="POST" enctype="multipart/form-data">
        @csrf      
        <div class="form-group">
          <label>Article Image</label>
          <input name="image" type="file" class="form-control">
        </div>
        <div class="form-group">
          <label>Article Name</label>
          <input name="name" value="{{old('name')}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Article preview</label>
            <textarea name="preview" placeholder="Type here" type="text" class="form-control">{{old('preview')}}</textarea>
          </div>
        <div class="form-group">
          <label>Article Content</label>
          <textarea name="content" rows="8" placeholder="Type here" type="text" class="form-control">{{old('content')}}</textarea>
        </div>      
        <button class="btn btn-success" type="submit">OK</button>
      </form>
      <form action="/admin/edit/article/{{$article->id}}/delete" method="POST">
        @csrf
        <button class="mt-1 btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
  </div>
@endcan