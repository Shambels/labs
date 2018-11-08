@can ('is-admin')
              <div class="card d-none m-3">
                <div class="card-header bg-purple">
                  <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                  <form action="/admin/edit/adduser" method="POST" enctype="multipart/form-data">
                    @csrf                   
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" value="{{old('name',$user->name)}}" placeholder="Type here" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="{{old('password',$user->password)}}" placeholder="Type here" type="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{old('email')}}" required placeholder="Type here" type="email" class="form-control">
                      </div>
                      <label for="">Role</label> 
                     <div class="radio">
                        <label class="radio-inline"><input type="radio" value="3" name="role" checked>Reader</label>
                        <label class="radio-inline"><input type="radio" value="2" name="role">Editor</label>
                      </div>                                 
                    <div class="form-group">
                      <label>Title</label>
                      <input name="title" value="{{old('title')}}" placeholder="Optional." type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" placeholder="Small Description of the User. Optional." type="text" class="form-control">
                            {{old('bio')}}
                        </textarea>
                      </div>
                           
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control">
                      </div>
                    <button class="btn btn-success" type="submit">OK</button>
                  </form> 
                  <form action="/admin/edit/user/{{$user->id}}/delete" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>               
                </div>
              </div>
            @endcan


            