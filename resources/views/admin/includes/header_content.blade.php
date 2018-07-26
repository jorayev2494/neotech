
@if (isset($title))
    <header class="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <h1 class="page-header-heading">
                        <span class="typcn typcn-home page-header-heading-icon"></span> {{ $title }} <small>As admin user</small>
                    </h1>
                    <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <button type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Settings</button>
                </div>
            </div>
        </div>
    </header>
@endif
