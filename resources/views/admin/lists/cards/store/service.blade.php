@can ('is-admin')
  <div class="card d-none text-left ">
    <div class="card-header bg-purple">
      <h3 class="card-title">Add Service</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/addservice" method="POST">
        @csrf                   
        <div class="form-group">
          <label>Name</label>
          <input name="name" value="{{old('name')}}" required placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input name="name" value="{{old('name')}}" required placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Select Icon</label>
          <select name="icon" id="">
            <option value="{{$service->icons->id}}">
              <i class="{{$service->icons->class}}"></i>
            </option>
            @foreach ($icons as $icon)
              @if ($service->icons->id != $icon->id)
                <option value="{{$icon->id}}">
                  <i class="{!!$icon->class!!}"></i>
                </option>
              @endif
            @endforeach
          </select>
        </div>
        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
      </form>
    </div>
  </div>
@endcan