@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Title</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/blogpage/titles/quote" method="POST">
      @csrf
      <div class="form-group">
        <input name="title" value="{{old('title', $text->quote)}}" placeholder="Type here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan