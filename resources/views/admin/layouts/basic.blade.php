<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ $title or "(" }}</title>
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/typicons.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/varello-theme.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/varello-skins.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/icheck-all-skins.css">
        <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/icheck-skins/flat/_all.css">
        <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300" rel="stylesheet" type="text/css">    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset(env('ADMIN')) }}/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset(env('ADMIN')) }}/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset(env('ADMIN')) }}/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset(env('ADMIN')) }}/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset(env('ADMIN')) }}/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset(env('ADMIN')) }}/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset(env('ADMIN')) }}/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(env('ADMIN')) }}/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset(env('ADMIN')) }}/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(env('ADMIN')) }}/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset(env('ADMIN')) }}/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(env('ADMIN')) }}/favicon-16x16.png">
        <link rel="manifest" href="{{ asset(env('ADMIN')) }}/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset(env('ADMIN')) }}/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="notifications top-right"></div>
        <div class="wrapper">
            <div class="page-wrapper">

                <!-- Side bar -->  
                    @include(env("ADMIN") . ".includes.sidebar", ["adminMenus" => $adminMenus])
                <!-- END Side bar -->
                        
                        
                <!-- Header Navigation -->  
                    @include(env("ADMIN") . ".includes.header")
                <!-- END Header Navigation -->
                
                
                <!-- Content -->  
                    @yield('content')
                <!-- END Content -->


                <!-- Footer -->  
                    @include(env("ADMIN") . ".includes.footer")
                <!-- END Footer -->

                </div>
            </div>
        </div>

        <script src="{{ asset(env('ADMIN')) }}/js/Chart.min.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/jquery-1.12.3.min.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/bootstrap.min.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/jquery.piety.min.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/varello-theme.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/icheck.min.js"></script>
        <script src="{{ asset(env('ADMIN')) }}/js/dropdown.js"></script>
    </body>
</html>