@extends("layout")

@section("page_content")
    @foreach($forecasts as $forecast)
        <p>City: {{ $forecast->city }}</p>
        <p>Temperature: {{ $forecast->temperature }}</p>
        <p>Weather: {{ $forecast->weather }}</p>
        <p>----------------------------------------</p>
    @endforeach
@endsection
