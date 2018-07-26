<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>VarelloAdmin</title>
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/typicons.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/varello-theme.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/varello-skins.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/icheck-all-skins.css">
    <link rel="stylesheet" href="{{ asset(env('ADMIN')) }}/css/icheck-skins/flat/_all.css">
    <link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300' rel='stylesheet' type='text/css'>    <link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png">
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
    <meta name="theme-color" content="#ffffff">        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"></head>

<body class="sidebar-closed-md">
    <div class="notifications top-right"></div>
    <div class="wrapper">
        <div class="page-wrapper">
            {{--  <aside class="left-sidebar">
    <section class="sidebar-user-panel">
        <div id="user-panel-slide-toggleable">
            <div class="user-panel-profile-picture">
                <img src="../img/user-1-profile.jpg" alt="Tyrone G">
            </div>
            <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span> Logged in as <strong> Tyrone G</strong></span>
            <a href="profile/update.html" class="user-panel-action-link"><span class="fa fa-pencil"></span> Manage your account</a>
        </div>
        <!-- <button class="user-panel-toggler" data-slide-toggle="user-panel-slide-toggleable"><span class="fa fa-chevron-up" data-slide-toggle-showing></span><span class="fa fa-chevron-down" data-slide-toggle-hidden></span></button> -->
    </section>
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">
            Components
        </li>
        <li class="sidebar-nav-link ">
            <a href="../index.html">
                <span class="typcn typcn-home sidebar-nav-link-logo"></span> Dashboard
            </a>
        </li>
        <li class="sidebar-nav-link ">
            <a href="../widgets.html">
                <span class="typcn typcn-shopping-bag sidebar-nav-link-logo"></span> Widgets <span class="badge badge-primary sidebar-nav-link-badge">6</span>
            </a>
        </li>
        <li class="sidebar-nav-link sidebar-nav-link-group  active open ">
            <a data-subnav-toggle>
                <span class="typcn typcn-document sidebar-nav-link-logo"></span> Application Pages
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="../log-in.html">
                        <span class="typcn typcn-key sidebar-nav-link-logo"></span> Log In
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="../forgot-password.html">
                        <span class="typcn typcn-key-outline sidebar-nav-link-logo"></span> Forgot Password
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="../sign-up.html">
                        <span class="typcn typcn-plus-outline sidebar-nav-link-logo"></span> Sign Up
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="inbox.html">
                        <span class="typcn typcn-folder-open sidebar-nav-link-logo"></span> Inbox <span class="badge badge-info sidebar-nav-link-badge">99+</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="inbox/view.html">
                        <span class="typcn typcn-mail sidebar-nav-link-logo"></span> View Email
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="inbox/compose.html">
                        <span class="typcn typcn-arrow-forward sidebar-nav-link-logo"></span> Compose Email
                        </a>
                    </li>
                    <li class="sidebar-nav-link  active ">
                        <a href="profile.html">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Profile
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="profile/update.html">
                        <span class="typcn typcn-user-add sidebar-nav-link-logo"></span> Update Profile
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="faqs.html">
                        <span class="typcn typcn-info sidebar-nav-link-logo"></span> FAQs
                        </a>
                    </li>
                                        <li class="sidebar-nav-link ">
                        <a href="calendar.html">
                            <span class="typcn typcn-calendar sidebar-nav-link-logo"></span> Calendar
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="enquiry.html">
                            <span class="typcn typcn-message sidebar-nav-link-logo"></span> Enquiry
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="page-not-found.html">
                            <span class="typcn typcn-warning-outline sidebar-nav-link-logo"></span> 404 Message
                        </a>
                    </li>
                </ul>
        </li>
        <li class="sidebar-nav-heading">
            Fundamentals
        </li>
        <li class="sidebar-nav-link ">
            <a href="../tables.html">
                <span class="typcn typcn-th-small sidebar-nav-link-logo"></span> Tables
            </a>
        </li>
        <li class="sidebar-nav-link ">
            <a href="../forms.html">
                <span class="typcn typcn-clipboard sidebar-nav-link-logo"></span> Forms
            </a>
        </li>
        <li class="sidebar-nav-link ">
            <a href="../chart-js.html">
                <span class="typcn typcn-chart-line sidebar-nav-link-logo"></span> Chart.js <span class="badge badge-danger sidebar-nav-link-badge">3</span>
            </a>
        </li>
        <li class="sidebar-nav-link sidebar-nav-link-group ">
            <a data-subnav-toggle>
                <span class="typcn typcn-th-list sidebar-nav-link-logo"></span> UI Components
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/alerts.html">
                        <span class="typcn typcn-warning sidebar-nav-link-logo"></span> Alerts
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/buttons.html">
                        <span class="typcn typcn-th-large sidebar-nav-link-logo"></span> Buttons
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/badges-and-labels.html">
                        <span class="typcn typcn-tags sidebar-nav-link-logo"></span> Badges &amp; Labels
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/typography.html">
                        <span class="typcn typcn-sort-alphabetically sidebar-nav-link-logo"></span> Typography
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/grid-system.html">
                        <span class="typcn typcn-th-small-outline sidebar-nav-link-logo"></span> Grid System
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/panels.html">
                        <span class="typcn typcn-tabs-outline sidebar-nav-link-logo"></span> Panels &amp; Widget Boxes
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/pagination.html">
                        <span class="typcn typcn-arrow-right-outline sidebar-nav-link-logo"></span> Pagination
                        </a>
                    </li>
                    <li class="sidebar-nav-link ">
                        <a href="../ui-components/progress-bars.html">
                        <span class="typcn typcn-chart-bar sidebar-nav-link-logo"></span> Progress Bars
                        </a>
                    </li>
                </ul>
        </li>
    </ul>
</aside>             --}}
<header class="top-header"> 
    <a href="{{ route('index') }}" class="top-header-logo">
        <span class="text-primary">Neotech</span>Profile
    </a>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                {{--  <button type="button" class="navbar-sidebar-toggle" data-toggle-sidebar>
                    <span class="typcn typcn-arrow-left visible-sidebar-sm-open"></span>
                    <span class="typcn typcn-arrow-right visible-sidebar-sm-closed"></span>
                    <span class="typcn typcn-arrow-left visible-sidebar-md-open"></span>
                    <span class="typcn typcn-arrow-right visible-sidebar-md-closed"></span>
                </button>  --}}
            </div>
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <form class="navbar-left navbar-search-form">
                            <button type="submit" class="navbar-search-btn"><span class="fa fa-search"></span></button>
                            <input type="text" class="navbar-search-box" placeholder="Find something...">
                        </form>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right" data-dropdown-in="flipInX" data-dropdown-out="zoomOut">
                    {{--  <li class="hidden-sm hidden-xs hidden-md"><a href="#">Welcome to <strong>Varello</strong>Admin.</a></li>  --}}
                    <li class="item-feed dropdown">
                        {{--  <a href="#" class="item-feed-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-envelope"></span> <span class="badge badge-primary item-feed-badge">15</span></a>  --}}
                        <ul class="dropdown-menu dropdown-menu-messages">
                            {{--  <li>
                                <a class="dropdown-menu-messages-item" href="#">
                                    <div class="dropdown-menu-messages-item-image">
                                        <img src="../img/james-taylor.jpg" alt="James T">
                                    </div>
                                    <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                    <div class="dropdown-menu-messages-item-content">
                                        <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-success"></span> James Taylor</div>
                                        <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                        <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                    </div>
                                </a>
                            </li>  --}}
                            {{--  <li>
                                <a class="dropdown-menu-messages-item" href="#">
                                    <div class="dropdown-menu-messages-item-image">
                                        <img src="{{ env('ADMIN') }}/img/user-1-profile.jpg" alt="Tyrone G">
                                    </div>
                                    <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                    <div class="dropdown-menu-messages-item-content">
                                        <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-warning"></span> Tyrone G</div>
                                        <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                        <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                    </div>
                                </a>
                            </li>  --}}
                            {{--  <li>
                                <a class="dropdown-menu-messages-item" href="#">
                                    <div class="dropdown-menu-messages-item-image">
                                        <img src="{{ env('ADMIN') }}/img/user-3-profile.jpg" alt="James T">
                                    </div>
                                    <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                    <div class="dropdown-menu-messages-item-content">
                                        <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-danger"></span> Sandra Nelvo</div>
                                        <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                        <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                    </div>
                                </a>
                            </li>  --}}
                            <li>
                                <a class="dropdown-menu-link-lg" href="inbox.html">
                                    <span class="fa fa-envelope"></span> Go To Inbox
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--  <li class="item-feed dropdown">
                        <a href="#" class="item-feed-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-bell"></span> <span class="badge badge-danger item-feed-badge">7</span></a>
                        <ul class="dropdown-menu dropdown-menu-notifications">
                            <li>
                                <a class="dropdown-menu-notifications-item" href="#">
                                    <span class="dropdown-menu-notifications-item-content"><span class="fa fa-smile-o"></span> You got 3 likes</span>
                                    <span class="dropdown-menu-notifications-item-ago">3hr ago</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-menu-notifications-item" href="#">
                                    <span class="dropdown-menu-notifications-item-content"><span class="fa fa-line-chart"></span> Sales report available</span>
                                    <span class="dropdown-menu-notifications-item-ago">12hr ago</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-menu-notifications-item" href="#">
                                    <span class="dropdown-menu-notifications-item-content"><span class="fa fa-credit-card-alt"></span> 248 new subscriptions</span>
                                    <span class="dropdown-menu-notifications-item-ago">12hr ago</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-menu-link-md" href="#">
                                    <small>
                                        <span class="fa fa-bell"></span> See Notification History
                                    </small>
                                </a>
                            </li>
                        </ul>
                    </li>  --}}
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span>
                            <span class="hidden-sm hidden-xs">Log out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
        </div>
    </nav>
</header>            <div class="content-wrapper">
                <div class="content-dimmer"></div>
                <header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="fa fa-circle text-success page-header-heading-icon"></span> Tyrone G <small>User Profile</small></h1>
                <p class="page-header-description">Tyrone is <strong>online now</strong>.</p>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-xs-12 col-lg-9 col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-clipboard"></span>&nbsp;&nbsp;User Details
                </div>
                <div class="panel-body">
                    <div class="profile-details">
                        <div class="profile-details-profile-picture">
                            <img src="{{ Auth::user()->avatar_original }}" alt="Tyrone Gary">
                        </div>
                        <div class="profile-details-info">
                            <h2 class="profile-details-info-name">{{ Auth::user()->name }} {{ (Auth::user()->last_name != 'no-last-name') ? Auth::user()->last_name : '' }} <small>CEO at AdminCorp</small></h2>
                            <p class="profile-details-info-summary">Running the corporation, moving the money &amp; doing my best to contribute to society.</p>
                            <ul class="profile-details-info-contact-list">
                                <li class="profile-details-info-contact-list-item"><a href="mailto:{{ Auth::user()->email }}"><span class="fa fa-envelope profile-details-info-contact-list-item-icon"></span>{{ Auth::user()->email }}</a></li>
                                <li class="profile-details-info-contact-list-item"><span class="fa fa-phone profile-details-info-contact-list-item-icon"></span> +0 1234 56879</li>
                                <li class="profile-details-info-contact-list-item"><a href="#"> <span class="fa fa-twitter profile-details-info-contact-list-item-icon"></span>@tgexample</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-info-circle"></span>&nbsp;&nbsp;Personal Information
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Based In</th>
                            <td>United Kingdom</td>
                        </tr>
                        <tr>
                            <th>Works For</th>
                            <td>AdminCorp</td>
                        </tr>
                        <tr>
                            <th>Job Role</th>
                            <td>Chief Executive Officer</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-star"></span>&nbsp;&nbsp;Contributions
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Projects</th>
                            <td class="text-right"><strong>392</strong></td><td><small><span class="text-success">152 Complete</span> - <span class="text-warning">240 Ongoing</span></small></td>
                        </tr>
                        <tr>
                            <th>Articles</th>
                            <td class="text-right"><strong>56</strong></td><td><small><span class="text-success"><span class="fa fa-eye"></span> 1,573,283 Unique Views</span></small></td>
                        </tr>
                        <tr>
                            <th>Resources</th>
                            <td class="text-right"><strong>14</strong></td><td><small><span class="text-success"><span class="fa fa-download"></span> 291,489 Downloads</span></small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-download"></span>&nbsp;&nbsp;Resources
                </div>
                <div class="panel-body">
                    <p>Tyrone has provided some free resources for you to download. These are all licensed under the MIT License, unless stated otherwise in the document.</p>
                    <ul class="profile-resource-list">
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            Report on Lorem Ipsum
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            User Guide to sit amet
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            Report on Lorem Ipsum
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            User Guide to sit amet
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            Report on Lorem Ipsum
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                        <li class="profile-resource-list-item">
                            <span class="fa fa-file-o profile-resource-list-item-icon"></span>
                            User Guide to sit amet
                            <button class="btn btn-xs btn-transparent btn-transparent-primary pull-right"><span class="fa fa-download"></span> Download</button>
                            <button class="btn btn-xs btn-transparent btn-transparent-info pull-right"><span class="fa fa-info-circle"></span> File Info</button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-lg-3 col-md-5">
            <a href="inbox/compose.html" class="btn btn-info btn-block"><span class="fa fa-paper-plane"></span> Send message</a>
            <a href="inbox/compose.html" class="btn btn-faded-blue btn-block"><span class="fa fa-users"></span> Add to contacts</a>
            <a href="inbox/compose.html" class="btn btn-danger btn-faded btn-block"><span class="fa fa-ban"></span> Block communications</a>
            <div class="panel panel-default margin-top-15">
                <div class="panel-heading">
                    User Statistics
                </div>

                <ul class="list-group">
                    <li class="list-group-item"><span class="fa fa-comment"></span>&nbsp;&nbsp;<strong>215</strong> forum posts</li>
                    <li class="list-group-item"><span class="fa fa-thumbs-up"></span>&nbsp;&nbsp;<strong>5,123</strong> karma</li>
                    <li class="list-group-item"><span class="fa fa-clock-o"></span>&nbsp;&nbsp;<strong>4 years 2 months</strong> since they joined</li>
                    <li class="list-group-item"><span class="fa fa-eye"></span>&nbsp;&nbsp;<strong>152,923</strong> profile views</li>
                </ul>
            </div>
        </div>
    </div>
</div>
  
            </div>
        </div>
    </div>
<script src="{{ asset(env('ADMIN')) }}/js/Chart.min.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/jquery-1.12.3.min.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/bootstrap.min.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/jquery.piety.min.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/varello-theme.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/icheck.min.js"></script>
<script src="{{ asset(env('ADMIN')) }}/js/dropdown.js"></script></body>
</html>