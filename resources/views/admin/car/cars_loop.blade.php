<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Model</th>

            <th>Country</th>

            <th>City</th>

            <th>Description</th>

            <th>Date Start</th>

            <th>Date End</th>
        </tr>
    </thead>

    <tbody>
    @if (count($cars))
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->model }}</td>

                <td>{{ $car->country }}</td>

                <td>{{ $car->city }}</td>

                <td>{!! Str::limit($car->description, 80, '...') !!}</td>

                <td>{{ $car->date_start }}</td>

                <td>{{ $car->date_end }}</td>

                <td>
                    <form method="post" action="{{ route('cars.destroy', ['car' => $car]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('cars.edit', ['car' => $car]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $cars->appends(request()->except('_token'))->links() }}
</div>