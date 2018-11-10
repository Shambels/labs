@can ('is-admin')
            <div class="card d-none">
              <div class="card-header bg-purple-gradient">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <div class="card-body">
                <form action="/admin/edit/user/{{$admin->id}}" method="POST" enctype="multipart/form-data">
                  @csrf              
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="{{old('name', $admin->name)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input name="title" value="{{old('title', $admin->title)}}" placeholder="Type here" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="{{old('email', $admin->email)}}" placeholder="Type here" type="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="{{old('password', $admin->password)}}" placeholder="Type here" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Bio</label>
                    <textarea name="bio" placeholder="Type here" type="text" class="form-control">{{old('bio', $admin->bio)}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                  </div>
                  <button class="btn btn-success" type="submit">OK</button>
                </form>
              </div>
            </div>
            @endcan