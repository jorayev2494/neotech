
@extends(env("THEME") . '.layouts.form')

    @section("content")
        <div class="notifications top-right"></div>
        <div class="wrapper">
            <div class="page-wrapper">
                <div id="login-hidden">
                    <div class="log-in-wrapper">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{-- <ul>                             --}}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach                            
                                {{-- </ul> --}}
                            </div>
                        @endif 
                        
                        <h1 class="log-in-title">Welcome to <strong class="text-primary">Neotech</strong>login<br><small>Please enter your details</small></h1>
                        
                        {!! Form::open(["url" => route('login'), "method" => "POST"]) !!}
                        
                            <div class="form-group">
                                {!! Form::text("email", old('email'), ["class" => "form-control input-lg", "id" => "email", "placeholder" => "Please enter your email address..."]) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::password("password", ["class" => "form-control input-lg", 'id' => "password", 'placeholder' => "And your password..." ]) !!}
                            </div>
                            
                            <div class="form-group">
                                
                                {!! Form::checkbox("remember", "value", "", ["id" => "remember_me"]) !!}
                                
                                <label for="remember_me" class="icheck-label">
                                Keep me signed in
                                </label>
                            </div>

                            
                            {!! Form::submit("Log in", ["class" => "btn btn-transparent btn-lg btn-transparent-primary btn-block"]) !!}
                            <ul class="login-bottom-links">
                                <a href="login/google">Login in with Google</a>
                                <li><a href="{{ route('password.request') }}">Forgot your password?</a></li>
                                <li><a href="{{ route('register') }}">Need an account?</a></li>
                            </ul>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    @endsection