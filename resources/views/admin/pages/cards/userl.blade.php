@can ('is-admin')
              <div class="card d-none">
                <div class="card-header">
                  <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                  <form action="/admin/edit/user/{{$teammembers[0]->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>User Image</label>
                      <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>User Name</label>
                      <input name="name" value="{{old('name', $teammembers[0]->name)}}" placeholder="Type here" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>User Title</label>
                      <input name="title" value="{{old('title', $teammembers[0]->title)}}" placeholder="Type here" type="text" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit">OK</button>
                  </form>
                  <form action="/admin/edit/testimonial/{{$testimonial->id}}/delete" method="POST">
                    @csrf
                    <button class="mt-1 btn btn-danger" type="submit">Delete</button>
                  </form>
                </div>
              </div>
            @endcan