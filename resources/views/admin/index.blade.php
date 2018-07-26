@extends(env("ADMIN") . '.layouts.basic')

@section('content')
    {!! $content or "Empty Index Content" !!}
@endsection
