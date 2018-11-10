@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Logo</h3>
  </div>
  <div class="card-body">
  <form action="/admin/edit/logo" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input name="image" type="file" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan