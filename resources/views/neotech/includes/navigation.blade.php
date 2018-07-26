@if ($menus)

    <!-- Nav-wrap -->
    <nav class="flex-child nav__wrap d-none d-lg-block" style="padding-left: 32px;">              
        <ul class="nav__menu">

            <li class="nav__dropdown">
                <a href="{{ route('index') }}">Home</a>
            </li>

            @foreach ($menus as $menu)
                <li class="nav__dropdown">
                    {{-- {{ dd($menu->title) }} --}}
                    @if ($menu->action == 1)
                        <a href="{{ route('alias.group', ['group' => $menu->title]) }}">{{ $menu->title }}</a>
                    {{--  @elseif ($menu->parent == 1)
                        <a href="{{ $menu->link }}">{{ $menu->title }} *</a>
                        <ul class="nav__dropdown-menu">
                            <li><a href="{{ $menu->link }}">{{ $menu->title }} ***</a></li>
                            <li><a href="{{ $menu->link }}">{{ $menu->title }} **</a></li>
                            <li><a href="{{ $menu->link }}">{{ $menu->title }} *</a></li>
                        </ul>  --}}
                    @endif
                </li>
            @endforeach

            {{--  <li class="nav__dropdown">
                <a href="#">{{  Lang::get("langue.lang")  }}</a>
            </li>  --}}
        </ul>
    </nav>

@endif