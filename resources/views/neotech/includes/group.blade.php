@if ($group)
    <section class="section-wrap pb-0">
        <div class="container">
            <div class="row">
        <!-- Posts -->
        <div class="col-md-8 blog__content mb-30">   
            <h3 class="section-title" style="text-transform: capitalize;">Latest Posts: {{ $group[0]->aliases[0]->groups[0]->title or "Empty!" }}</h3>

            @forelse ($group as $groupp)
            
                @forelse ($groupp->aliases as $alias)
                
                    <article class="entry post-list">                
                        <div class="entry__img-holder post-list__img-holder">
                            <a href="{{ route('alias.show', ['alias' => $alias->id] ) }}">
                                <div class="thumb-container">
                                    <img data-src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" class="entry__img lazyload" alt="{{ $alias->img }}" />
                                    
                                    {{--  <img data-src="{{ asset(env('THEME')) }}/img/blog/list_post_img_1.jpg" src="{{ asset(env('THEME')) }}/img/blog/list_post_img_1.jpg" class="entry__img lazyload" alt="" />  --}}
                                </div>
                            </a>
                        </div>
        
                        <div class="entry__body post-list__body">
                            <div class="entry__header">

                                <a href="{{ route('alias.group', ['group' => $groupp->title] ) }}" class="entry__meta-category">{{ $groupp->title }}</a>
        
                                <h2 class="entry__title">
                                    <a href="{{ route('alias.show', ['alias' => $alias->id] ) }}">{{ $alias->title }}</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-date">
                                        {{ $alias->created_at->format("j F, Y") }}
                                    </li>
                                    <li class="entry__meta-author">
                                        by <a href="#">DeoThemes</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>{!! str_limit($alias->body, 60) !!}</p>
                            </div>
                            <p>
                                <ul class="entry__meta">
                                    <li class="entry__meta-date">
                                        {{ (count($alias->comments) != 0) ? count($alias->comments) : 'No'  }} comments.
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </article>
                @empty
                    Empty!
                @endforelse
            @empty
                Empty!
            @endforelse

            {{-- {{ $group->links() }} --}}
            

            {!! $group !!}

        </div> 
        <!-- end posts -->
        <!-- Sidebar -->                
            @include(env("THEME") . '.includes.sidebar')
        <!-- end sidebar --> 
        </div>
    </div>
    </section>

@endif
