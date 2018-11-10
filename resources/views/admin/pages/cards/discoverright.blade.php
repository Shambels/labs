@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Discover Right Paragraph</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/homepage/discoverright" method="POST">
      @csrf
      <div class="form-group">
        <textarea name="paragraph" placeholder="Type Here" type="text" class="form-control">
          {{old('paragraph', $text->discoverright)}}
        </textarea>
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan