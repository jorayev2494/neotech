@if ($footerMenus)
    <footer class="footer">
        <div class="container">
            <div class="footer__widgets">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="widget">
                        <img src="{{ asset(env('THEME')) }}/img/logo_light.png" srcset="{{ asset(env('THEME')) }}/img/logo_light.png 1x, img/logo_light@2x.png 2x" class="logo__img" alt="">
                        {{--  <p class="mt-20">We bring you the best Premium WordPress Themes.</p>  --}}
                        <br><br>
                        <ul>
                            @foreach ($footerMenus as $footerMenu)
                                <li><a href="{{ $footerMenu->link }}">{{ $footerMenu->title }}</a></li>
                            @endforeach
                        </ul>
                             
                        <div class="socials mt-20">
                            <a href="#" class="social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                            <a href="#" class="social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                            <a href="#" class="social-google-plus" aria-label="google+"><i class="ui-google"></i></a>
                            <a href="#" class="social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h4 class="widget-title white">twitter feed</h4>
                        <div class="tweets-container">
                        <div id="tweets"></div>                  
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_nav_menu">
                            <h4 class="widget-title white">Useful Links</h4>
                            <ul>
                                @foreach ($footerMenus as $footerMenu)
                                    <li><a href="{{ $footerMenu->link }}">{{ $footerMenu->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    

                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget__letter">
                            <h4 class="widget-title white">subscribe to deothemes</h4>
                            <p>Join our Newsletter</p>

                            
                            {!! Form::open(["url" => route("subscribe"), "method" => "POST"]) !!}
                            
                            <form class="mc4wp-form" method="post">
                                <div class="mc4wp-form-fields">
                                <p>
                                    <i class="mc4wp-form-icon ui-email"></i>
                                    {!! Form::text("email", "", ["placeholder" => "Your email"]) !!}
                                </p>
                                <p>
                                    {!! Form::submit("Subscribe", ["class" => "btn btn-md btn-color"]) !!}
                                </p>
                                </div>
                            </form>

                            
                            {!! Form::close() !!}
                            
                        
                        </div>
                    </div>

                </div>
            </div>    
        </div> <!-- end container -->

        <div class="footer__bottom">
            <div class="container text-center">
                <span class="copyright">
                    &copy; 2017 Neotech | Magazine WordPress theme. Made by <a href="http://deothemes.com">DeoThemes</a>
                </span>
            </div>
        </div> <!-- end bottom footer -->
    </footer>
@endif