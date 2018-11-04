@can ('is-admin')
  <div class="card d-none">
    <div class="card-header">
      <h3 class="card-title">Edit Article</h3>
    </div>
    <div class="card-body">
      <form action="/admin/edit/article/{{$article->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Article Image</label>
          <input name="image" type="file" class="form-control">
        </div>
        <div class="form-group">
          <label>Article Name</label>
          <input name="name" value="{{old('name', $article->name)}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Article preview</label>
            <input name="preview" value="{{old('preview', $article->preview)}}" placeholder="Type here" type="text" class="form-control">
          </div>
        <div class="form-group">
          <label>Article Content</label>
          <input name="content" value="{{old('content', $article->content)}}" placeholder="Type here" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Article Tags</label>
          @foreach ($article->tags as $tag )
            <input name="tag{{$tag->id}}" value="{{old('tag'.$tag->id, $tag->name)}}" placeholder="Type here... or leave the field empty to detach the Tag" type="text" class="form-control">
          @endforeach
          <div class="tag">
            <div class="addable" class="btn btn-light"><i class="fas fa-plus"></i></div>
          </div>
        </div>
        <div class="form-group">
          <label>Article Categories</label>
          @foreach ($article->categories as $category)
            <input name="category{{$category->id}}" value="{{old('category'.$category->id, $category->name)}}" placeholder="Type here... or leave the field empty to detach the Category " type="text" class="form-control">
          @endforeach
          <div class="category">            
            <div class="addable" class="btn btn-light"><i class="fas fa-plus"></i></div>
          </div>
        </div>
        <button class="btn btn-success" type="submit">OK</button>
      </form>
      <form action="/admin/edit/article/{{$article->id}}/delete" method="POST">
        @csrf
        <button class="mt-1 btn btn-danger" type="submit">Delete</button>
      </form>
    </div>
  </div>
@endcan