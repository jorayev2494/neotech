@extends(env("THEME") . '.layouts.form')

@section('content')

        <div class="notifications top-right"></div>
        <div class="wrapper">
            <div class="page-wrapper">
                <div id="login-hidden" style="display: none;">
                    <div class="log-in-wrapper">
                        <h1 class="log-in-title">Зарегистрироваться<br><small>Создайте учетную запись, чтобы получить доступ</small></h1>
                        
                        {!! Form::open(["url" => route('register'), "method" => "POST"]) !!}
                            <div class="form-group">
                                {!! Form::text("name", old("name"), ["class" =>"form-control input-lg", "placeholder" => "Ваше имя"]) !!}
                            </div>

                            <div class="form-group">
                                
                                {!! Form::email("email", old("email"), ["class" => "form-control input-lg", "id" => "name","placeholder" => "Ваш E-mail"]) !!}
                                {{-- <input type="text" class="form-control input-lg" name="name" id="name" placeholder=""> --}}
                            </div>

                            <div class="form-group">
                                {!! Form::password("password", ["class" => "form-control input-lg", "id" => "password", "placeholder" => "Пароль учетной записи (мин. 6 символов)"]) !!}
                                {{-- <input type="password" class="form-control input-lg" name="password" id="password" placeholder="">  --}}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::password("password_confirmation", ["class" => "form-control input-lg", "id" => "password", "placeholder" => "Подтвердите пароль (мин. 6 символов)"]) !!}
                            </div>

                            {{-- <div class="form-group">
                                <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" data-icheck>
                                <label for="terms_and_conditions" class="icheck-label">
                                        Я согласен со <a href="#">условия &amp; условий</a>
                                </label>
                            </div> --}}
                            
                            {!! Form::submit("Зарегистрироваться", ["class" => "btn btn-transparent btn-lg btn-transparent-primary btn-block"]) !!}
                            
                            <ul class="login-bottom-links">
                                <li><a href="{{ route('login') }}">У вас уже есть учетная запись?</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
