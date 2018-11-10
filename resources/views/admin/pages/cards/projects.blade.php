@can ('is-admin')
  <div class="card d-none">
    <div class="card-header bg-purple-gradient">
      <h3 class="card-title">Edit Project</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/project/{{$project->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Project Image</label>
          <input name="image" type="file" class="form-control">
        </div>
        <div class="form-group">
          <label>Project Name</label>
          <input name="name" value="{{old('name', $project->name)}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Project Content</label>
          <input name="content" value="{{old('content', $project->content)}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">OK</button>
      </form>
      <form action="/admin/edit/project/{{$project->id}}/delete" method="POST">
        @csrf
        <button class="mt-1 btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
  </div>
@endcan