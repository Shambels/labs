@can('is-admin')
<div class="card d-none">
  <div class="card-header">
    <h4 class="card-title left">Edit Button Text</h4>
  </div>
  <div class="card-body">
      <form action="/admin/edit/newsletter/button" method="post">
        @csrf
        <div class="form-group">
          <input name="buttontext" value="{{old('buttontext',$text->newsbtn)}}" placeholder="Enter Text Here" type="text" class="form-control" style="background: #FFFFFF!important; color: #000000!important; border: solid 1px #d9d9d9!important;">
        </div>
        <button class="btn btn-success" type="submit">OK</button>  
      </form>
    </div>
  </div>
@endcan