@if(session()->has('success'))
<div class="alert alert-success"> 
  {{session()->get('success')}}
  <button type="button" class="close" data-dismiss="alert">X</button>
</div>
@endif