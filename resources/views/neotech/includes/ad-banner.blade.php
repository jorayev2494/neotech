@if (Route::currentRouteName() == "index")
    <div class="text-center">
        <a href="#">
        <img src="{{ asset(env('THEME')) }}/img/blog/placeholder_728.jpg" alt="">
        </a>
    </div> 
@endif
