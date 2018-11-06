<div class="row">
  <div id="sendCommentForm" class="col-md-9 comment-from">
    <h2>{!!$text->leavecom!!}</h2>
    <form action="/blogpost/{{$article->id}}/comments/add" class="form-class" method="post">            
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <input type="text" name="name" placeholder="Your name">
        </div>
        <div class="col-sm-6">
          <input type="text" name="email" placeholder="Your email">
        </div>
        <div class="col-sm-12">
          <input type="text" name="subject" placeholder="Subject">
          <textarea name="message" placeholder="Message"></textarea>
          <button type="submit" class="site-btn">{!!$text->sendbtn!!}</button>
        </div>
      </div>
    </form>
  </div>
</div>