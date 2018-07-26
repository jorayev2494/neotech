@if (Auth::check())

        @if ($errors->any())
        <div id="errors"  class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session()->has("comment_success"))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                <li>{{ session()->pull("comment_success") }}</li>
            </ul>
        </div>
        @endif

        <div id="comment" id="respond" class="comment-respond">
            <h5 class="comment-respond__title" >Post a comment</h5>
            <p class="comment-respond__subtitle">Your email address will not be published. Required fields are marked*</p>
        {{--  {{ dd(Auth::user()->id)}}  --}}

    

        {{-- <div class="comment-body"> --}}
        <div class="comment-avatar">
            <img alt="" src="{{ (Auth::user()->avatar) }}" width="40" height="40" style="border-radius: 50%;">
        </div>
        <div class="comment-text">
            <h6 class="comment-author">{{ Auth::user()->name }}</h6>
                                 
            {{-- <a href="{{ $comm->id }}" class="comment-reply">Ответить {{ $comm->id }}</a> --}}
        </div>
            {{-- <br><br> --}}

        {{-- </div>         --}}

        {!! Form::open(["url" => route("comment", ["user" => Auth::user()->id]), "method" => "POST", "class" => "comment-form"]) !!}
            
            {!! Form::hidden("_alias_id", $alias->id) !!}
            
            <p class="comment-form-comment">
                <label for="comment">Add Comment</label>
                <textarea id="comment" name="comment" rows="5"></textarea>
            </p>

            

        

            {{--  <div class="row row-20">
                <div class="col-lg-4">
                    <label for="name">Name*</label>
                    <input name="name" id="name" type="text">
                </div>
                
                <div class="col-lg-4">
                    <label for="email">Email*</label>
                    <input name="email" id="email" type="email">
                </div>
                
                <div class="col-lg-4">
                    <label for="email">Website</label>
                    <input name="website" id="website" type="text">
                </div>
            </div>  --}}

            <p class="comment-form-submit">
                
                {!! Form::submit("Post Comment", ["class" => "btn btn-lg btn-color btn-button"]) !!}
                
                {{--  <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment" id="submit-message">  --}}
            </p>
            
        {{--  </form>  --}}

        {!! Form::close() !!}


    </div>
@endif
