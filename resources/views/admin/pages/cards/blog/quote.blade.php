@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Quote</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/quote" method="POST">
      @csrf
      <div class="form-group">
        <input name="content" value="{{old('content', $quote)}}" placeholder="Type here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    <form action="/admin/edit/blogpage/quote/delete" method="post">
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>
</div>
@endcan