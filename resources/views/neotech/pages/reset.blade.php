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

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>                            
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach                            
                        </ul>
                    </div>
                @endif 

    <h1 class="log-in-title">Forgot Password<br><small>Enter your email address below to get reset</small></h1>
    
    {!! Form::open(["url" => route("password.request"), "method" => "POST"]) !!}

    {!! Form::hidden('token', $token); !!}

    <div class="form-group">
        {!! Form::email('email', old("email"), ["class" => "form-control input-lg", "placeholder" =>"Please enter your email address..."]); !!}
    </div>

    <div class="form-group">
        {!! Form::password("password", ["class" => "form-control input-lg", 'id' => "password", 'placeholder' => "Ведите новый пороль..." ]) !!}
    </div>

    <div class="form-group">
        {!! Form::password("password_confirmation", ["class" => "form-control input-lg", 'id' => "password", 'placeholder' => "Подтвержение нового паролья..." ]) !!}
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

