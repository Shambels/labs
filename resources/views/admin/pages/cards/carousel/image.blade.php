@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Carousel Background Image</h3>
  </div>
  <div class="card-body">
  <form action="/admin/edit/homepage/carouselimage/{{$image->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input name="image" type="file" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    <form action="/admin/edit/homepage/carouselimage/{{$image->id}}/delete" method="POST" enctype="multipart/form-data">
      @csrf
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
  </div>
</div>
@endcan