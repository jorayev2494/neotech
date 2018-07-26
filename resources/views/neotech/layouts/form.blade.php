<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VarelloAdmin</title>
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/typicons.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/varello-theme.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/varello-skins.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/icheck-all-skins.css">
        <link rel="stylesheet" href="{{ asset(env('THEME')) }}/login/css/icheck-skins/flat/_all.css">
        <link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset(env('THEME')) }}/login/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset(env('THEME')) }}/login/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset(env('THEME')) }}/login/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset(env('THEME')) }}/login/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset(env('THEME')) }}/login/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset(env('THEME')) }}/login/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset(env('THEME')) }}/login/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset(env('THEME')) }}/login/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(env('THEME')) }}/login/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset(env('THEME')) }}/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="{{ asset(env('THEME')) }}/login/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        @yield("content")    

        <script src="{{ asset(env('THEME')) }}/js/Chart.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/jquery-1.12.3.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/bootstrap.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/jquery.piety.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/varello-theme.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/icheck.min.js"></script>
        <script src="{{ asset(env('THEME')) }}/login/js/dropdown.js"></script>    
    </body>
</html>