@extends(env("THEME") . '.layouts.basic')

@section('navigation')    
    @include(env("THEME") . '.includes.navigation')  
@endsection

@section('content')    
    @include(env("THEME") . '.includes.group')    
@endsection