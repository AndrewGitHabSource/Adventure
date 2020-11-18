<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Address</th>

            <th>Description</th>

            <th>Price</th>

            <th>Count beds</th>
        </tr>
    </thead>

    <tbody>
    @if (count($rooms))
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>

                <td>{{ $room->address }}</td>

                <td>{!! Str::limit($room->description, 80, '...') !!}</td>

                <td>{{ $room->price }}</td>

                <td>{{ $room->count_beds }}</td>

                <td>
                    <form method="post" action="{{ route('hotels.rooms.destroy', ['hotel' => $room->hotel_id, 'room' => $room]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('hotels.rooms.edit', ['room' => $room, 'hotel' => $room->hotel_id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $rooms->appends(request()->except('_token'))->links() }}
</div>