@can('is-editor')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Add New Category</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/category/store" method="POST">           
      @csrf
      <div class="form-group">
        <input name="name" value="{{old('name')}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">Add</button>                
    </form>
  </div>
</div>
@endcan