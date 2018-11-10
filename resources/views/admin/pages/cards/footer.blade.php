@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Footer</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/footer" method="POST">
      @csrf
      <div class="form-group">
        <label>Content</label>
        <input name="content" value="{{old('content', $text->copyright)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>Clickable Link</label>
          <input name="link" value="{{old('link', $text->copyrightlink)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>URL</label>
          <input name="url" value="{{old('url', $text->copyrighturl)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan