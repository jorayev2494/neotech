@if ($user)
    <div class="content-wrapper">
        <div class="container-fluid">

            @include(env("ADMIN") . '.includes.errors')
            
            {!! Form::open(["url" => route('users.update', $user->id), "method" => "POST", "class" => "form-horizontal"]) !!}

                {!! Form::hidden("_method", "PUT") !!}
            
                <div class="row">
                    <div class="col-xs-12 col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ ($title) }}
                            </div>

                            <div class="panel-body">

                                <p>The basic required account information</p>
                                <div class="form-group margin-top-15">
                                    <label class="col-sm-2 col-xs-12 control-label">Name</label>
                                    <div class="col-sm-10 col-xs-12">
                                        
                                        {!! Form::hidden("id", $user->id) !!}
                                        
                                        {!! Form::text("name", $user->name, ["class" => "form-control"]) !!}
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">Email Address</label>
                                    <div class="col-sm-10 col-xs-12">

                                        {!! Form::text("email", $user->email, ["class" => "form-control"]) !!}
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">Password</label>
                                    <div class="col-sm-10 col-xs-12">

                                        {!! Form::password("password", ["class" => "form-control"]) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">Confirm Password</label>
                                    <div class="col-sm-10 col-xs-12">
                                        
                                        {!! Form::password("password_confirmation", ["class" => "form-control"]) !!}
                                    
                                    </div>
                                    </div>
                                    
                                    {!! Form::submit("Ok", ["class" => "btn btn-transparent btn-transparent-success"]) !!}
                                    
                                </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="title"><span class="fa fa-lightbulb-o">
                                    </span> Updating {{ $user->name }} profile</h4>
                            </div>
                            <div class="panel-body">
                                <p>Make sure to keep your profile information up to date.</p>
                            </div>
                        </div>
                    </div>
                </div>
            {{--  </form>  --}}

            
            {!! Form::close() !!}
            
        </div>
    </div>
@endif
