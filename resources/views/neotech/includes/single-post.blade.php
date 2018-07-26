@if ($alias && $popular_posts)    

<!-- Content -->
<section class="section-wrap pt-60 pb-20">
    <div class="container">
        <div class="row">

            <!-- post content -->
            <div class="col-md-8 blog__content mb-30">

                <!-- standard post -->
                <article class="entry">
            
                    <div class="single-post__entry-header  entry__header">
                        
                        <h1 class="single-post__entry-title">{{ $alias->title }}</h1>
                        
                        <ul class="single-post__entry-meta entry__meta">
                        <li>
                            <div class="entry-author">
                            <a href="#" class="entry-author__url">
                                <img src="{{ \App\User::where('email', 'admin@admin.com')->first()->avatar }}" class="entry-author__img" alt="" width="40" height="40" style="border-radius: 50%;">
                                <span>by: Admin</span>
                                {{-- <span class="entry-author__name">Ross Green</span> --}}
                            </a>
                            </div>
                        </li>
                        <li class="entry__meta-date">{{ $alias->created_at->format("j F, Y") }}</li>
                        <li>
                            <span>in</span>
                            <a href="{{ route('alias.group', ['group' => $alias->groups[0]->title]) }}" class="entry__meta-category">{{ $alias->groups[0]->title }}</a>
                        </li>
                        </ul>
                    </div>

                    <div class="entry__img-holder">
                        <figure>
                            <img src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" alt="{{ $alias->img }}" class="entry__img">
                            <figcaption>A photo collection samples</figcaption>
                        </figure>
                    </div>

                    <div class="entry__article-holder">

                        <!-- Share -->
                        <div class="entry__share">
                            <div class="entry__share-inner">
                                <div class="socials">
                                <a href="#" class="social-facebook entry__share-social" aria-label="facebook"><i class="ui-facebook"></i></a>
                                <a href="#" class="social-twitter entry__share-social" aria-label="twitter"><i class="ui-twitter"></i></a>
                                <a href="#" class="social-google-plus entry__share-social" aria-label="google+"><i class="ui-google"></i></a>
                                <a href="#" class="social-instagram entry__share-social" aria-label="instagram"><i class="ui-instagram"></i></a>
                                </div>
                            </div>                    
                        </div> <!-- share -->

                        <div class="entry__article">
                            <p>Namira is a very slick and clean e-commerce template with endless possibilities. <a href="#">Check out these</a> clothes store with this Theme is easy than you can imagine.</p>
                                {!! $alias->body !!}

                            <figure>
                                <img src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" alt="{{ $alias->img }}" class="entry__img">
                                <figcaption>A photo collection samples</figcaption>
                            </figure>
                    
                            {!! $alias->body !!}
                            {{-- {{ dd($menus) }} --}}
                            <!-- tags -->
                            <div class="entry__tags">
                                Tags: 
                                    @foreach ($menus as $menu)
                                        <a href="{{ route('alias.group', ['groups' => $menu->title]) }}" rel="tag">{{ $menu->title }}</a>
                                    @endforeach
                            </div> 
                            <!-- end tags -->

                        </div> <!-- end entry article -->
                    </div>

                    <!-- Newsletter -->
                    {{-- <div class="newsletter-wide widget widget_mc4wp_form_widget">
                        <div class="newsletter-wide__text">
                            <h4 class="widget-title">Subscribe for Neotech news and receive daily updates</h4>
                        </div>

                        <div class="newsletter-wide__form">
                            <form class="mc4wp-form" method="post">
                                <div class="mc4wp-form-fields">
                                <i class="mc4wp-form-icon ui-email"></i>
                                <input type="email" name="EMAIL" placeholder="Your email" required="">
                                <input type="submit" class="btn btn-md btn-color" value="Subscribe">
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <!-- End 
                        Newsletter -->
                    <!-- Related Posts -->                
                        @include(env("THEME") . '.includes.related-post', ["popular_posts", $popular_posts])                
                    <!-- end related posts -->                

                </article> <!-- end standard post -->

                {{--  {{ dd($comments) }}  --}}

                <!-- Comments -->
                <div class="entry-comments mt-30">
                    <h5 class="entry-comments__title">{{ (count($comments) != 0) ?  count($comments) : 'No '}} comments</h5>
                             
                            <ul class="comment-list">
                                <li class="comment">
                                    @foreach ($comments as $comment)
                                        @foreach ($comment as $comm)

                                            @if ($comm->parent_id !== null)
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                
                                                            <div class="comment-avatar">
                                                                <img alt="" src="{{ asset(env('THEME')) }}/img/blog/comment_1.png">
                                                            </div>
                                                
                                                            <div class="comment-text">
                                                                <h6 class="comment-author">{{ $comm->name }} {{ $comm->id }}</h6>
                                                                <div class="comment-metadata">
                                                                    <span class="comment-date">{{ $comm->created_at->format("F j, Y a g:i") }}</span>  
                                                                </div>                      
                                                                <p>{{ $comm->text }}</p>
                                                                {{-- <a href="{{ $comm->id }}" class="comment-reply">{{ $comm->id }} Ответить</a> --}}
                                                            </div>
                                                
                                                        </div>
                                                    </li>
                                                    <!-- end reply comment -->
                                                    {{--  @include(env('THEME') . '.includes.comment_children')  --}}
                                                </ul>

                                                @break
                                            @endif
                                                {{--  @continue  --}}
                                                
                                                {{-- @if ($comm->author != 1)
                                                    {{ dd(\App\User::find($comm->author)->avatar) }}
                                                    
                                                @endif --}}
                                                
                                            <div class="comment-body"> 
                                                {{-- {{ dd(\App\User::where("email", $comm->email)->first()->avatar) }} --}}
                                                <div class="comment-avatar">{{-- dd(\App\User::where("email", $comm->email)->first()) --}}
                                                    <img alt="#" src="{{ \App\User::find($comm->author)->avatar }}" width="40" height="40" style="border-radius: 50%;">
                                                    
                                                    {{-- <img alt="" src="{{ isset(Auth::user()->avatar) ? Auth::user()->avatar : \App\User::where('email', $comm->email)->first()->avatar }}" width="40" height="40" style="border-radius: 50%;"> --}}
                                                </div>
                                                
                                                <div class="comment-text">
                                                    <h6 class="comment-author">{{ $comm->name }}</h6>
                                                    <div class="comment-metadata">
                                                        {{--  <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>  --}}
                                                        <span class="comment-date">{{ $comm->created_at->format("F j, Y a g:i") }}</span>
                                                    </div>                      
                                                    <p>{{ $comm->text }}</p>
                                                    {{-- <a href="{{ $comm->id }}" class="comment-reply">Ответить {{ $comm->id }}</a> --}}
                                                </div>                                              

                                            </div>

                                        @endforeach
                                        
                                    @endforeach
                                </li>   
                            </div>
                        </ul>         
                    <!-- end comments -->

                <!-- Comment Form -->
                    @include(env("THEME") . '.includes.comment_form')
                <!-- end comment form -->

                </div>
        <!-- end col -->
      
        <!-- Sidebar -->                
            @include(env("THEME") . '.includes.sidebar')
        <!-- end sidebar --> 

    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end content -->

@endif