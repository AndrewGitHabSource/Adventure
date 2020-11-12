<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Country</th>

            <th>City</th>

            <th>Address</th>

            <th>Description</th>

            <th>Price</th>

            <th>Rating</th>

            <th>Popular</th>

            <th>Period</th>
        </tr>
    </thead>

    <tbody>
    @if (count($places))
        @foreach($places as $place)
            <tr>
                <td>{{ $place->name }}</td>

                <td>{{ $place->country }}</td>

                <td>{{ $place->city }}</td>

                <td>{{ $place->address }}</td>

                <td>{!! Str::limit($place->description, 80, '...') !!}</td>

                <td>{{ $place->price }}</td>

                <td>{{ $place->rating }}</td>

                <td>{{ $place->popular }}</td>

                <td>{{ $place->period }}</td>

                <td>
                    <form method="post" action="{{ route('places.destroy', ['place' => $place]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('places.edit', ['place' => $place]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $places->appends(request()->except('_token'))->links() }}
</div>