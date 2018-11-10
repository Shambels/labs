@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Page Name</h3>
  </div>
  <div class="card-body">
      <form action="/admin/edit/pagename/home" method="POST">
        @csrf
        <div class="form-group">
          <input name="name" value="{{old('name', $text->homesection)}}" placeholder="Type Here" type="text" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">OK</button>
      </form>
  </div>
</div>
@endcan


