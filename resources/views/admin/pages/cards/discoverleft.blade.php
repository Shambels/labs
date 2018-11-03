@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Discover Left Paragraph</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/homepage/discoverleft" method="POST">
      @csrf
      <div class="form-group">
        <textarea name="paragraph" rows="6" placeholder="Type Here" type="text" class="form-control">
            {{old('paragraph', $text->discoverleft)}}
        </textarea>
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan