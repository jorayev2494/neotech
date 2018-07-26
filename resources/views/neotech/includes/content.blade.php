@if ($aliases)
        <section class="section-wrap pb-0" id="alert">
            <div class="container">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>                            
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach                            
                        </ul>
                    </div>
                @endif 

                @if (session()->has("subscribe-success"))
                    <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 9999999;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            <li>{{ session()->pull("subscribe-success") }}</li>
                        </ul>
                    </div>
                @endif 

                <div class="row">
            <!-- Posts -->
            <div class="col-md-8 blog__content mb-30">   
                <h3 class="section-title">Latest Posts</h3>
                @forelse ($aliases as $alias)
                {{--  {{ dd($alias    ) }}  --}}
                    
                    @foreach ($alias->groups as $group)
                        {{-- {{ dd(count($alias->comments)) }} --}}
                        {{--  {{ dd($alias) }}  --}}
                        <article class="entry post-list">                
                            <div class="entry__img-holder post-list__img-holder">
                                <a href="{{ route('alias.show', ['alias' => $alias->id] ) }}">
                                    <div class="thumb-container">
                                        <img data-src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" src="{{ asset(env('THEME')) }}/img/blog/{{ $alias->img }}" class="entry__img lazyload" alt="{{ $alias->img }}"/>
                                        
                                        {{--  <img data-src="{{ asset(env('THEME')) }}/img/blog/list_post_img_1.jpg" src="{{ asset(env('THEME')) }}/img/blog/list_post_img_1.jpg" class="entry__img lazyload" alt="" />  --}}
                                    </div>
                                </a>
                            </div>
                            
                            <div class="entry__body post-list__body">
                                <div class="entry__header">
                                    
                                    {{--  {{ dd($alias) }}  --}}
                                    <a href="{{ route('alias.group', ['group' => $group->title] ) }}" class="entry__meta-category">{{ $group->title }}</a>
        
        
                                    <h2 class="entry__title">
                                        <a href="{{ route('alias.show', ['alias' => $alias->id] ) }}">{{ $alias->title }}</a>
                                    </h2>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-date">
                                            {{ $alias->created_at->format("j F, Y") }}
                                        </li>
                                        <li class="entry__meta-author">
                                              by <a href="#">Admin</a> {{-- DeoThemes  --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry__excerpt">
                                    <p>{!! str_limit($alias->body, 58) !!}</p>
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
                    @endforeach
                    
                @empty
                    "Pizdes!"
                @endforelse

                {{--  <ul>
                        <li>{{ $aliases->links() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        <li>{{ $aliases->currentPage() }}</li>
                        

                        
                </ul>  --}}

                {{ $aliases->links() }}

                {{-- {!! $aliases !!} --}}

            </div> 

            <!-- end posts -->

            <!-- Sidebar -->                
                @include(env("THEME") . '.includes.sidebar')
            <!-- end sidebar --> 

            </div>
        </div>
    </section>
@endif
