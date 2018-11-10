@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Page Name</h3>
  </div>
  <div class="card-body">
    @if(Route::currentRouteName()== 'editservices')
      <form action="/admin/edit/pagename/services" method="POST">
        @csrf
        <div class="form-group">
          <input name="name" value="{{old('name', $text->servicessection)}}" placeholder="Type Here" type="text" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">OK</button>
      </form>
    @elseif(Route::currentRouteName()== 'editcontact')
      <form action="/admin/edit/pagename/contact" method="POST">
        @csrf
        <div class="form-group">
          <input name="name" value="{{old('name', $text->contactsection)}}" placeholder="Type Here" type="text" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">OK</button>
      </form>
    @else
    <form action="/admin/edit/pagename/blog" method="POST">
      @csrf
      <div class="form-group">
        <input name="name" value="{{old('name', $text->blogsection)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
    @endif
  </div>
</div>
@endcan


