@if ($videos)
    <section class="section-wrap pt-40">
        <div class="container">

        <h3 class="section-title">Latest Videos</h3>

        <div class="video-playlist">

            <div class="video-playlist__content thumb-container" >
                <div class="embed-responsive embed-responsive-16by9">
                    {{--  <iframe src="{{ asset(env('THEME')) }}/video/post/{{ $videos[0]->video }}" class="video-playlist__content-video">  
                    </iframe>  --}}

                    <video src="{{ asset(env('THEME')) }}/video/post/{{ $videos[0]->video }}" class="video-playlist__content-video" controls autoplay muted style="width: 104%;"></video>

                </div>
            </div>

            <div class="video-playlist__list">

                @forelse($videos as $video)
                    <a href="{{ asset(env('THEME')) }}/video/post/{{ $video->video }}" class="video-playlist__list-item video-playlist__list-item--active">
                        <div class="video-playlist__list-item-thumb thumb-container">
                            <img data-src="{{ asset(env('THEME')) }}/img/blog/{{ $video->img }}" src="{{ asset(env('THEME')) }}/img/blog/{{ $video->img }}" class="video-playlist__list-item-img lazyload" alt="{{ $video->img }}">
                        </div>
                        <div class="video-playlist__list-item-description">
                            <h4 class="video-playlist__list-item-title">{{ $video->title }}</h4>
                        </div>
                    </a>
                @empty
                    {{ "heeefefef" }}
                @endforelse

            </div>

        </div>        
        </div>
    </section>
@endif
