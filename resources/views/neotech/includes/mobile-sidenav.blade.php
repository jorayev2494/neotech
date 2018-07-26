@if ($menus)
    <header class="sidenav" id="sidenav">
        <!-- Search -->
        <div class="sidenav__search-mobile">
        <form method="get" class="sidenav__search-mobile-form">
            <input type="search" class="sidenav__search-mobile-input" placeholder="Search..." aria-label="Search input">
            <button type="submit" class="sidenav__search-mobile-submit" aria-label="Submit search">
            <i class="ui-search"></i>
            </button>
        </form>
        </div>
    
        <nav>
            {{--  {{ dd($menus) }}  --}}
            <ul class="sidenav__menu" role="menubar">
                
                @foreach ($menus as $menu)
                    <li>
                        @if ($menu->parent == 0)
                            <a href="{{ $menu->link }}" class="sidenav__menu-link">{{ $menu->title }}</a>
                        @elseif($menu->parent == 1)
                            <a href="{{ $menu->link }}" class="sidenav__menu-link">{{ $menu->title }}</a>
                            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown">
                                <i class="ui-arrow-down"></i>
                            </button>
                            <ul class="sidenav__menu-dropdown">
                                <li><a href="{{ $menu->link }}" class="sidenav__menu-link">{{ $menu->title }} ***</a></li>
                                <li><a href="{{ $menu->link }}" class="sidenav__menu-link">{{ $menu->title }} **</a></li>
                                <li><a href="{{ $menu->link }}" class="sidenav__menu-link">{{ $menu->title }} *</a></li>
                            </ul>
                        @endif
                    </li>
                @endforeach
            
            </ul>
        </nav>    
    
    </header> 
@endif
