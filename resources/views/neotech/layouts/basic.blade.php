<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title or "(" }}</title>

        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="">

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins:400,600,700%7CRoboto:400,400i,700' rel='stylesheet'>

        <!-- Css -->
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/font-icons.css" />
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/style.css" />

        <link rel="stylesheet" href="{{ asset('css') }}/paginate.css" />

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset(env('THEME')) }}/img/favicon.ico">
        <link rel="apple-touch-icon" href="{{ asset(env('THEME')) }}/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset(env('THEME')) }}/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset(env('THEME')) }}/img/apple-touch-icon-114x114.png">

        <!-- Lazyload -->
        <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/lazysizes.min.js"></script>

    </head>

<body>

<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
    <div></div>
    </div>
</div>

<!-- Bg Overlay -->
<div class="content-overlay"></div>

<!-- Subscribe Modal -->
<div class="modal fade" id="subscribe-modal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="subscribeModalLabel">Subscribe for Newsletter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        {!! Form::open(["url" => route("subscribe"), "method" => "POST", "class" => "mc4wp-form"]) !!}
            <div class="mc4wp-form-fields">
                <p>
                    <i class="mc4wp-form-icon ui-email"></i>
                    {!! Form::text("email", "", ["placeholder" => "Your email"]) !!}
                </p>
                <p>
                    {!! Form::submit("Subscribe", ["class" => "btn btn-md btn-color"]) !!}
                </p>
            </div>
        {!! Form::close() !!}
            
        </div>
    </div>
    </div>
</div>
<!-- end subscribe modal -->

<!-- Mobile Sidenav -->    
    @include(env("THEME") . ".includes.mobile-sidenav", ["menus" => $menus])
<!-- end mobile sidenav -->

<main class="main oh" id="main">
    <!-- Navigation -->
    <header class="nav">

        <div class="nav__holder nav--sticky">
            <div class="container relative">

                <div class="flex-parent">

                    <!-- Mobile Menu Button -->
                    <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open mobile menu">
                        <span class="nav-icon-toggle__box">
                        <span class="nav-icon-toggle__inner"></span>
                        </span>
                    </button> 
                    <!-- end mobile menu button -->

                    <!-- Logo -->
                    <a href="{{ route('index') }}" class="logo">
                        <img class="logo__img" src="{{ asset(env('THEME')) }}/img/{{ config('settings.site_logo') }}" srcset="{{ asset(env('THEME')) }}/img/{{ config('settings.site_logo') }} 1x, img/{{ config('settings.logo_mobile') }} 2x" alt="{{ config('settings.logo') }}">
                    </a>

                    <!-- Navigation -->
                        @yield('navigation')
                    <!-- end navigation -->

                    <!-- Nav Right -->
                    <div class="nav__right nav--align-right d-none d-lg-flex">

                    

                    @guest

                        <!-- Search -->
                        <div class="nav__right-item nav__search">
                            <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                                <i class="ui-search nav__search-trigger-icon"></i>
                            </a>
                            <div class="nav__search-box" id="nav__search-box">
                                <form class="nav__search-form">
                                    <input type="text" placeholder="Search an article" class="nav__search-input">
                                    <button type="submit" class="nav__search-button btn btn-md btn-color btn-button">
                                        <i class="ui-search nav__search-icon"></i>
                                    </button>
                                </form>
                            </div> 
                        </div>
                        
                        <!-- Socials -->
                        <div class="nav__right-item socials socials--nobase nav__socials "> 
                            @foreach ($socials as $social)
                                <a class="social-facebook" href="{{ $social->link }}">
                                    <i class="{{ $social->icon }}"></i>
                                </a>
                            @endforeach
                        </div>
                        
                        {{-- <div class="nav__right-item">
                            <a href="" class="nav__subscribe" data-toggle="modal" data-target="#subscribe-modal"> @lang("langue.subscribe") </a>
                        </div> --}}

                        <div class="nav__right-item">
                            <a href="{{ route('login') }}" class="nav__subscribe"> Вход </a>|
                            <a href="{{ route('register') }}" class="nav__subscribe"> Регистратция </a>
                        </div>
                    
                        {{-- <li><a href="{{ route('login') }}">L</a></li>
                        <li><a href="{{ route('register') }}">R</a></li> --}}
                    @else

                        <div class="nav__right-item nav__search">
                            <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                                <i class="ui-search nav__search-trigger-icon"></i>
                            </a>
                            <div class="nav__search-box" id="nav__search-box">
                                <form class="nav__search-form">
                                    <input type="text" placeholder="Search an article" class="nav__search-input">
                                    <button type="submit" class="nav__search-button btn btn-md btn-color btn-button">
                                        <i class="ui-search nav__search-icon"></i>
                                    </button>
                                </form>
                            </div> 
                        </div>

                        <nav class="flex-child nav__wrap d-none d-lg-block" style="padding-left: 0px;">              
                            <div style="width: 35px; height: 35px; border-radius: 50%; float: left; margin-right: 10px;">
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}" style="border-radius: 50px; ">
                            </div>
                            <ul class="nav__menu">
                                <li class="nav__dropdown">
                                    <a href="#" style="padding-left: 0px;" style="float: right;">{{ Auth::user()->name }}</a>
                                    <ul class="nav__dropdown-menu">
                                        <li><a href="{{ route('profile', ['user' => Auth::user()->id]) }}">Prifile</a></li>
                                        {{-- <li><a href="#">12345 ***</a></li>
                                        <li><a href="#">12345 ***</a></li> --}}
                                        
                                        @if (Auth::user()->id == 1)
                                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                        @endif
                                        
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>  
                                </li>                            
                            </ul>
                        </nav>

                        {{--  </nav>  --}}
                                
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li> --}}
                    @endguest

                    </div> 
                    <!-- end nav right -->  

                    <!-- Nav-wrap -->
                    
                    {{--  @if (isset($langs))
                        <ul class="nav__menu">
                            <li class="nav__dropdown" style="margin-left: 15px;">
                                <a href="#"> Langue *</a>
                                <ul class="nav__dropdown-menu">
                                    
                                    @foreach ($langs as $lang)
                                        <li><a href="{{ $lang->link }}">{{ $lang->title }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    @endif  --}}

                </div>
            </div> <!-- end container -->
        </div>
    </header> <!-- end navigation -->

            <div class="main-container" id="main-container">

                <!-- Hero Slider -->                
                    @yield('slider')                
                <!-- end hero slider -->

                <!-- Ad Banner 728 -->            
                    @yield('ad-banner')               

                <!-- Content -->              
                    @yield('content') 
                <!-- end content -->       

                <!-- Latest Videos -->    
                    @yield('latest-videos')
            

                <!-- Ad Banner 728 -->
                
                @if (Route::currentRouteName() == "index")
                    <div class="text-center pb-60">
                        <a href="#">
                        <img src="{{ asset(env('THEME')) }}/img/blog/placeholder_728.jpg" alt="">
                        </a>
                    </div> 
                @endif
                

                <!-- Footer -->
                    
                    @include(env("THEME") . '.includes.footer')
                    
                <!-- end footer -->

                </div> <!-- end main container -->

                <div id="back-to-top">
                    <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
                </div>
            </div>
            </main> <!-- end main-wrapper -->

            <!-- jQuery Scripts -->
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/jquery.min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/easing.min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/owl-carousel.min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/twitterFetcher_min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/modernizr.min.js"></script>
            <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/scripts.js"></script>


            <script type="text/javascript">
                // Twitter Feed
                var config1 = {
                "id": '1',
                "domId": 'tweets',
                "showUser": false,
                "showInteraction": false,
                "showPermalinks": false,
                "showTime": false,
                "maxTweets": 2,
                "enableLinks": true
                };

                twitterFetcher.fetch(config1);                    
            </script>

    </body>
</html>