@can ('is-editor')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Category</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/category/{{$category->id}}" method="POST">
      @csrf
      @can('is-admin')
        <div class="form-group">
          <label for="">Valid</label>
          <div class="radio">
            @if ($article->valid==true)
              <label class="radio-inline"><input type="radio" value="1" name="valid" checked>Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
            @elseif ($article->valid==false)
              <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid" checked>No</label>
            @else
              <label class="radio-inline"><input type="radio" value="1" name="valid">Yes</label>
              <label class="radio-inline"><input type="radio" value="0" name="valid">No</label>
            @endif
          </div>
        </div>
        @endcan
      <div class="form-group">
        <input name="name" value="{{old('name', $category->name)}}" placeholder="Type here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    <form action="/admin/edit/category/{{$category->id}}/delete" method="post">
      @csrf
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>
</div>
@endcan