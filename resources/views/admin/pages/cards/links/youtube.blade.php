@can ('is-admin')
<div class="card col-md-8 offset-2 d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Video URL</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/homepage/video" method="POST">
      @csrf
      <div class="form-group">
        <input name="video" value="{{old('video', $text->video)}}" placeholder="Type URL here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan