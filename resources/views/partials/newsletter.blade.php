<!-- newsletter section -->
<div class="newsletter-section spad" id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>{{$text->newstitle}}</h2>
            </div>
            <div class="col-md-9">
                <!-- newsletter form -->
                <form class="nl-form" action="{{route('newsletter')}}" method="POST">
                    @csrf
                    @method('POST')
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif  
                    <input type="text" placeholder="{{$text->newsplaceholder}}" name="newsemail">
                    <button type="submit" class="site-btn btn-2">{{$text->newsbtn}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- newsletter section end-->