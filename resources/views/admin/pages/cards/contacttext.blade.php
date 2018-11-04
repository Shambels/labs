@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Text</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/contact/text" method="POST">
      @csrf
      <div class="form-group">
        <textarea name="text"  rows="5" placeholder="Type here" type="text" class="form-control">{{old('text', $text->contacttext)}}</textarea>
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan