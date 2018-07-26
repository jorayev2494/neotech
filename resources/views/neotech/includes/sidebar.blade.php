@if ($popular_posts)
    <aside class="col-md-4 sidebar sidebar--right">
                    
        <!-- Widget Popular Posts -->
        <div class="widget widget-popular-posts">
            <h4 class="widget-title sidebar__widget-title">Popular Posts</h4>
            <ul class="widget-popular-posts__list">

                <?php $num = 0; ?>
                
                @forelse ($popular_posts as $key => $popular_post) 
                    {{-- {{ dd($popular_post) }} --}}
                    <li>
                        <article class="clearfix">
                            <div class="widget-popular-posts__img-holder">
                                <span class="widget-popular-posts__number">{{ ++$num }}</span>
                                <div class="thumb-container">
                                <a href="{{ route('alias.show', ['alias' => $popular_post->id]) }}">
                                    <img data-src="{{ asset(env('THEME')) }}/img/blog/{{ $popular_post->img }}" src="{{ asset(env('THEME')) }}/img/blog/{{ $popular_post->img }}" alt="" class="lazyload">
                                    
                                    {{--  <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_1.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_1.jpg" alt="" class="lazyload">  --}}
                                </a>
                                </div>
                            </div>
                            <div class="widget-popular-posts__entry">
                                <h3 class="widget-popular-posts__entry-title">
                                    <a href="{{ route('alias.show', ['alias' => $popular_post->id]) }}">{{ str_limit($popular_post->title, 65) }}</a>
                                </h3>
                                <ul class="entry__meta">
                                    <li class="entry__meta-date">
                                        {{ $popular_post->created_at->format("j F, Y") }}
                                        <br>
                                        {{ (count($popular_post->comments) != 0) ? count($popular_post->comments) : 'No'  }} comments.
                                    </li>
                                </ul>
                            </div>                      
                        </article>
                    </li>
                @empty
                    
                @endforelse
                

                {{--  <li>
                    <article class="clearfix">
                    <div class="widget-popular-posts__img-holder">
                        <span class="widget-popular-posts__number">1</span>
                        <div class="thumb-container">
                        <a href="single-post.html">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_1.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_1.jpg" alt="" class="lazyload">
                        </a>
                        </div>
                    </div>
                    <div class="widget-popular-posts__entry">
                        <h3 class="widget-popular-posts__entry-title">
                        <a href="single-post.html">How to get better Apple Watch battery life</a>
                        </h3>
                    </div>                      
                    </article>
                </li>
                
                <li>
                    <article class="clearfix">
                    <div class="widget-popular-posts__img-holder">
                        <span class="widget-popular-posts__number">2</span>
                        <div class="thumb-container">
                        <a href="single-post.html">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_2.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_2.jpg" alt="" class="lazyload">
                        </a>
                        </div>
                    </div>
                    <div class="widget-popular-posts__entry">
                        <h3 class="widget-popular-posts__entry-title">
                        <a href="single-post.html">8 Hidden Costs of Starting and Running a Business</a>
                        </h3>
                    </div>                      
                    </article>
                </li>
                
                <li>
                    <article class="clearfix">
                    <div class="widget-popular-posts__img-holder">
                        <span class="widget-popular-posts__number">3</span>
                        <div class="thumb-container">
                        <a href="single-post.html">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_3.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_3.jpg" alt="" class="lazyload">
                        </a>
                        </div>
                    </div>
                    <div class="widget-popular-posts__entry">
                        <h3 class="widget-popular-posts__entry-title">
                        <a href="single-post.html">The iPhone of Drones Is Being Built by This Teenager</a>
                        </h3>
                    </div>                      
                    </article>
                </li>
                
                <li>
                    <article class="clearfix">
                    <div class="widget-popular-posts__img-holder">
                        <span class="widget-popular-posts__number">4</span>
                        <div class="thumb-container">
                        <a href="single-post.html">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_4.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_4.jpg" alt="" class="lazyload">
                        </a>
                        </div>
                    </div>
                    <div class="widget-popular-posts__entry">
                        <h3 class="widget-popular-posts__entry-title">
                        <a href="single-post.html">Check Out This Video of Apples New Futuristic Campus, Shot by a Drone</a>
                        </h3>
                    </div>                      
                    </article>
                </li>
                
                <li>
                    <article class="clearfix">
                    <div class="widget-popular-posts__img-holder">
                        <span class="widget-popular-posts__number">5</span>
                        <div class="thumb-container">
                        <a href="single-post.html">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/popular_post_5.jpg" src="{{ asset(env('THEME')) }}/img/blog/popular_post_5.jpg" alt="" class="lazyload">
                        </a>
                        </div>
                    </div>
                    <div class="widget-popular-posts__entry">
                        <h3 class="widget-popular-posts__entry-title">
                        <a href="single-post.html">The New Media Moguls of Southeast Asia</a>
                        </h3>
                    </div>                      
                    </article>
                </li>  --}}

            </ul>
        </div> <!-- end widget popular posts -->

        <!-- Widget Newsletter -->
        <div class="widget widget_mc4wp_form_widget">
            <h4 class="widget-title">Subscribe for Neotech news and receive daily updates</h4>
            
            {!! Form::open(["url" => route("subscribe"), "method" => "POST", "class" => "mc4wp-form"]) !!}
                <div class="mc4wp-form-fields">
                    <p>
                    <i class="mc4wp-form-icon ui-email"></i>
                        {!! Form::text("email", "", ["placeholder" => "Your email"]) !!}
                    </p>
                    <p>
                        
                        {!! Form::submit("Subscribe", ["class" =>"btn btn-md btn-color"]) !!}
                        
                    </p>
                </div>
            {!! Form::close() !!}
            
        </div>
        <!-- end widget newsletter -->

        <!-- Widget socials -->
        {{-- <div class="widget widget-socials">
            <h4 class="widget-title">Keep up with Neotech</h4>
            <ul class="socials">
            <li>
                <a class="social-facebook" href="#" title="facebook" target="_blank">
                <i class="ui-facebook"></i>
                <span class="socials__text">Facebook</span>
                </a>
            </li>
            <li>
                <a class="social-twitter" href="#" title="twitter" target="_blank">
                <i class="ui-twitter"></i>
                <span class="socials__text">Twitter</span>
                </a>
            </li>
            <li>
                <a class="social-google-plus" href="#" title="google" target="_blank">
                <i class="ui-google"></i>
                <span class="socials__text">Google+</span>
                </a>
            </li>
            <li>
                <a class="social-instagram" href="#" title="instagram" target="_blank">
                <i class="ui-instagram"></i>
                <span class="socials__text">Instagram</span>
                </a>
            </li>
            </ul>
        </div>  --}}
        <!-- end widget socials -->

        {{--  <!-- Widget Banner -->            
            @include(env("THEME") . '.includes.sidebar-widget-banner')            
        <!-- end widget banner -->  --}}

    </aside> 
    <!-- end sidebar -->
@endif
