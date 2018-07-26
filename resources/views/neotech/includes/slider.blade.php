@if (isset($sliders) && (Route::currentRouteName() == "index"))
    <section class="hero">
        <div id="owl-hero" class="owl-carousel owl-theme">    
            
            @forelse ($sliders as $slider)

                
                @foreach ($slider->groups as $group)
                            {{--  {{ dd($group->title) }}  --}}


                    <div class="hero__slide">
                        <article class="hero__slide-entry entry">
                        <div class="thumb-bg-holder" style="background-image: url({{ asset(env('THEME')) }}/img/blog/{{ $slider->img }})">
                            <a href="{{ route('alias.show', ['show' => $slider->id] ) }}" class="thumb-url"></a>
                            <div class="bottom-gradient"></div>
                        </div>
                        
                        <div class="thumb-text-holder">
                            <a href="{{ route('alias.group', ['group' => $group->title] ) }}" class="entry__meta-category entry__meta-category--label">{{ (true) ? $group->title : lang("langue.startups") }}</a>   
                            <h2 class="thumb-entry-title">
                                <a href="{{ route('alias.show', ['show' => $slider->id] ) }}">{{ $slider->title }}</a>
                            </h2>
                        </div>
                        </article>          
                    </div>
                @endforeach
                
            @empty
                {{-- "No!" --}}
            @endforelse
            
        </div> 
        <!-- end owl -->
    </section> 
@endif




