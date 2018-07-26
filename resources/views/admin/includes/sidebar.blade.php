@if (isset($adminMenus))
    <aside class="left-sidebar">
        <section class="sidebar-user-panel">
            <div id="user-panel-slide-toggleable">
                <div class="user-panel-profile-picture">
                    <img src="{{ asset(env('ADMIN')) }}/img/user-1-profile.jpg" alt="Tyrone G">
                </div>
                <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span> Logged in as <strong> Tyrone G</strong></span>
                <a href="app-pages/profile/update.html" class="user-panel-action-link"><span class="fa fa-pencil"></span> Manage your account</a>
            </div>
            <!-- <button class="user-panel-toggler" data-slide-toggle="user-panel-slide-toggleable">
                <span class="fa fa-chevron-up" data-slide-toggle-showing></span>
                <span class="fa fa-chevron-down" data-slide-toggle-hidden></span>
            </button> -->
        </section>

        <ul class="sidebar-nav">
            <li class="sidebar-nav-heading">
                Components
            </li>

            <li class="sidebar-nav-link">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="typcn typcn-home sidebar-nav-link-logo"></span> Dashboard
                </a>
            </li>

            
            {{--  {{ dd(route(Route::currentRouteName())) }}  --}}
            {{--  {{ dd(Request::is("http://neotech.loc/admin/dashboard/*")) }}  --}}
            {{--  {{ dd(Request::getRequestUri()) }}  --}}
            {{--  {{ (Request::is(route(Route::currentRouteName()) . '/*') == route(Route::currentRouteName())) ? 'active' : '' }}  --}}
            @foreach ($adminMenus as $adminMenu)
                <li class="sidebar-nav-link">
                    <a href="{{ $adminMenu->link }}">
                            {{--  {{ dd($adminMenu->icon) }}  --}}
                        <span class="typcn sidebar-nav-link-logo" style="content: {{ $adminMenu->icon }};"></span>{{ $adminMenu->title }}
                    </a>
                </li>
            @endforeach
            


            {{--  <li class="sidebar-nav-link ">
                <a href="widgets.html">
                    <span class="typcn typcn-shopping-bag sidebar-nav-link-logo"></span> Widgets <span class="badge badge-primary sidebar-nav-link-badge">6</span>
                </a>
            </li>

            <li class="sidebar-nav-link sidebar-nav-link-group ">
                <a data-subnav-toggle>
                    <span class="typcn typcn-document sidebar-nav-link-logo"></span> Application Pages
                    <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                    <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
                </a>                
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="log-in.html">
                        <span class="typcn typcn-key sidebar-nav-link-logo"></span> Log In
                        </a>
                    </li>
                </ul>
            </li>  --}}

            <li class="sidebar-nav-heading">
                Fundamentals
            </li>
            <li class="sidebar-nav-link ">
                <a href="tables.html">
                    <span class="typcn typcn-th-small sidebar-nav-link-logo"></span> Tables
                </a>
            </li>
            <li class="sidebar-nav-link ">
                <a href="forms.html">
                    <span class="typcn typcn-clipboard sidebar-nav-link-logo"></span> Forms
                </a>
            </li>
            <li class="sidebar-nav-link ">
                <a href="chart-js.html">
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
                            <a href="ui-components/alerts.html">
                            <span class="typcn typcn-warning sidebar-nav-link-logo"></span> Alerts
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/buttons.html">
                            <span class="typcn typcn-th-large sidebar-nav-link-logo"></span> Buttons
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/badges-and-labels.html">
                            <span class="typcn typcn-tags sidebar-nav-link-logo"></span> Badges &amp; Labels
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/typography.html">
                            <span class="typcn typcn-sort-alphabetically sidebar-nav-link-logo"></span> Typography
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/grid-system.html">
                            <span class="typcn typcn-th-small-outline sidebar-nav-link-logo"></span> Grid System
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/panels.html">
                            <span class="typcn typcn-tabs-outline sidebar-nav-link-logo"></span> Panels &amp; Widget Boxes
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/pagination.html">
                            <span class="typcn typcn-arrow-right-outline sidebar-nav-link-logo"></span> Pagination
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="ui-components/progress-bars.html">
                            <span class="typcn typcn-chart-bar sidebar-nav-link-logo"></span> Progress Bars
                            </a>
                        </li>
                    </ul>
            </li>
        </ul>
    </aside>  
@endif