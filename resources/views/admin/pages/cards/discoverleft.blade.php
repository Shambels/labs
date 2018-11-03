@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Discover Left Paragraph</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/homepage/discoverleft" method="POST">
      @csrf
      <div class="form-group">
        <textarea name="discoverleft" rows="6" placeholder="Discover Left Paragraph" type="text" class="form-control">
            {{old('discoverleft', $text->discoverleft)}}
        </textarea>
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan