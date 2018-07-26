@extends(env("THEME") . '.layouts.basic')

@section('navigation')    
    @include(env("THEME") . '.includes.navigation')  
@endsection

{{-- @section('slider')    
    @include(env("THEME") . '.includes.slider')    
@endsection
    
@section('ad-banner')        
    @include(env("THEME") . '.includes.ad-banner')        
@endsection     --}}

@section('content')    
    @include(env("THEME") . '.includes.single-post')    
@endsection

{{-- @section('latest-videos')    
    @include(env("THEME") . '.includes.latest-videos')    
@endsection --}}



