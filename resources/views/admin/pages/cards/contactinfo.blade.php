@can ('is-admin')
<div class="card d-none">
  <div class="card-header bg-purple-gradient">
    <h3 class="card-title">Edit Contact Information</h3>
  </div>
  <div class="card-body">
    <form action="/admin/edit/contact/info" method="POST">
      @csrf
      <div class="form-group">
        <label>Office</label>
        <input name="office" value="{{old('office', $text->contactoffice)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>Address</label>
          <input name="address" value="{{old('address', $text->contactaddress)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>Town</label>
          <input name="town" value="{{old('town', $text->contacttown)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input name="phone" value="{{old('phone', $text->contactphone)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <div class="form-group">
          <label>E-Mail</label>
          <input name="email" value="{{old('email', $text->contactemail)}}" placeholder="Type Here" type="text" class="form-control">
      </div>
      <button class="btn btn-success" type="submit">OK</button>
    </form>
  </div>
</div>
@endcan