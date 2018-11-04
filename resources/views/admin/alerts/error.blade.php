@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}
        <button type="button" class="close" data-dismiss="alert">X</button>
    </li>
    @endforeach
  </ul>
</div>
@endif