@can('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h4 class="card-title">Edit Button Text</h4>
    <div class="card-body">
      <form action="/admin/edit/homepage/browseblog">
        <div class="form-group">
          <input name="browseblog" value="{{old('browseblog',$text->browseblog)}}" placeholder="Enter Text Here" type="text" class="form-control">
        </div>
        <button class="btn btn-success" type="submit">OK</button>  
      </form>
    </div>
  </div>
</div>
@endcan