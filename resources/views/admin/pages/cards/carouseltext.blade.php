@can ('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h3 class="card-title">Edit Carousel Text</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/homepage/carouseltext" method="POST">
      @csrf
      <div class="form-group">
        <input name="carouseltext" value="{{old('carouseltext', $text->carouseltext)}}" placeholder="Carousel Text" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan