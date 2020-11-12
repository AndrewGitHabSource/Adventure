<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Country</th>

            <th>City</th>

            <th>Address</th>

            <th>Description</th>

            <th>Rating</th>

            <th>Recommended</th>
        </tr>
    </thead>

    <tbody>
    @if (count($restaurants))
        @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->name }}</td>

                <td>{{ $restaurant->country }}</td>

                <td>{{ $restaurant->city }}</td>

                <td>{{ $restaurant->address }}</td>

                <td>{!! Str::limit($restaurant->description, 80, '...') !!}</td>

                <td>{{ $restaurant->rating }}</td>

                <td>{{ $restaurant->recommended }}</td>

                <td>
                    <form method="post" action="{{ route('restaurants.destroy', ['restaurant' => $restaurant]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $restaurants->appends(request()->except('_token'))->links() }}
</div>