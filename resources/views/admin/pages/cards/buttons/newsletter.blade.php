@can('is-admin')
<div class="card d-none bg-purple-gradient">
  <div class="card-header">
    <h4 class="card-title left">Edit Button Text</h4>
  </div>
  <div class="card-body">
      <form action="/admin/edit/newsletter/button" method="post">
        @csrf
        <div class="form-group">
          <textarea name="buttontext" placeholder="Enter Text Here" type="text" class="form-control">{{old('buttontext',$text->newsbtn)}}</textarea>
        </div>
        <button class="btn btn-success" type="submit">OK</button>  
      </form>
    </div>
  </div>
@endcan