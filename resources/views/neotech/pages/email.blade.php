@extends(env("THEME") . '.layouts.form')

@section('content')
    <div class="notifications top-right">
        
    </div>
    <div class="wrapper">
        <div class="page-wrapper">
            <div id="login-hidden" style="display: none;">
                <div class="log-in-wrapper">

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                            <center>{{ session('status') }}</center>
                        </div>
                    @endif

    <h1 class="log-in-title">Forgot Password<br><small>Enter your email address below to get reset</small></h1>
    
    {!! Form::open(["url" => route("password.email"), "method" => "POST"]) !!}
    <div class="form-group">
        {!! Form::email('email', old("email"), array("class" => "form-control input-lg", "placeholder" =>"Please enter your email address...")); !!}
    </div>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    {!! Form::submit('Send me a link', array('class' => 'btn btn-transparent btn-lg btn-transparent-primary btn-block')) !!}
    
    {{-- <a href="forgot-password-success.html" class="btn btn-transparent btn-lg btn-transparent-primary btn-block">
        Send me a link
    </a> --}}
    <ul class="login-bottom-links">
        <a href="{{ route('login') }}">Remembered it now?</a>
    </ul>
    {!! Form::close() !!}
    </form>
    </div>
            </div>
        </div>
    </div>
@endsection

