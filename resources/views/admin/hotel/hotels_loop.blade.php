<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Address</th>

            <th>Price</th>

            <th>Country</th>

            <th>City</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($hotels))
        @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->name }}</td>

                <td>{{ $hotel->address }}</td>

                <td>{{ $hotel->price }}</td>

                <td>{{ $hotel->country }}</td>

                <td>{{ $hotel->city }}</td>

                <td>
                    <form method="post" action="{{ route('hotels.destroy', ['hotel' => $hotel]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('hotels.edit', ['hotel' => $hotel]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $hotels->appends(request()->except('_token'))->links() }}
</div>