@extends("layout")

@section("page_content")
    <form action="/send-new-forecast" method="post">
        {{ csrf_field() }}
        <input name="city" type="text" placeholder="Enter the name of city" required>
        <input name="temperature" type="number" placeholder="Enter the temperature" required>
        <input name="weather" type="text" placeholder="Enter the weather" required>
        <button>Save</button>

    </form>
@endsection
