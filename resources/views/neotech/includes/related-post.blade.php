@if ($popular_posts)
    <div class="related-posts">
        <h5 class="related-posts__title">You might like</h5>
        <div class="row row-20">
            
            @foreach ($popular_posts->take(3) as $post)
                <div class="col-md-4">
                    <article class="related-posts__entry entry">
                        <a href="{{ route('alias.show', ['alias' => $post->id] ) }}">
                            <div class="thumb-container">
                                <img src="{{ asset(env('THEME')) }}/img/blog/{{ $post->img }}" data-src="{{ asset(env('THEME')) }}/img/blog/{{ $post->img }}" alt="" class="entry__img lazyload">
                            </div>
                        </a>
                        <div class="related-posts__text-holder">   
                            <h2 class="related-posts__entry-title">
                            <a href="{{ route('alias.show', ['alias' => $post->id] ) }}">{{ $post->title }}</a>
                            </h2>
                        </div>
                    </article>
                </div>
            @endforeach

        </div>
    </div>
@endif
