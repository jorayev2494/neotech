@if ($socials)
    <div class="nav__right-item socials socials--nobase nav__socials "> 
        @foreach ($socials as $social)
            <a class="social-facebook" href="#" target="_blank">
                <i class="{{ $social->icon }}"></i>
            </a>
        @endforeach
        
        {{-- <a class="social-twitter" href="#" target="_blank">
        <i class="ui-twitter"></i>
        </a>
        <a class="social-youtube" href="#" target="_blank">
        <i class="ui-youtube"></i>
        </a> --}}
    </div>
@endif
{!! $socials or "Empty Socials!" !!}