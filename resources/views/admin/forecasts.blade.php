<form method="POST" action="{{ route("forecasts.entry") }}">
    {{ csrf_field() }}
    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>
    <input type="number" name="temperature" placeholder="Enter temperature">
    <select name="weather_type">
        <option>Rainy</option>
        <option>Sunny</option>
        <option>Cloudy</option>
    </select>
    <input type="number" name="probability" placeholder="Enter probability for rain">
    <input type="date" name="date">
    <button>Save</button>
</form>


@foreach(\App\Models\ForecastsModel::all()->unique('city_id') as $place)
    <p> {{ $place->cities->name }} </p>
    @foreach(\App\Models\ForecastsModel::all() as $forecast)
        @if($forecast->city_id == $place->city_id)
            <ul style="padding-left:10px; list-style-type:circle">
                <li>{{ $forecast->date}} - {{ $forecast->temperature }}</li>
            </ul>
        @endif
    @endforeach
@endforeach

