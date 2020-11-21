<table class="table table-hover text-nowrap">
    <thead>
    <tr>
        <th>Name</th>

        <th>Start date</th>

        <th>End date</th>

        <th>Status</th>
    </tr>
    </thead>

    <tbody>
    @if (count($bookings))
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->name_client }}</td>

                <td>{{ $booking->start_date }}</td>

                <td>{{ $booking->end_date }}</td>

                <td>{{ $booking->status }}</td>

                <td>
                    <form method="post" action="{{ route('available-rooms.bookings.destroy', ['available_room' => request()->available_room, 'booking' => $booking]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('available-rooms.bookings.edit', ['available_room' => request()->available_room, 'booking' => $booking]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $bookings->appends(request()->except('_token'))->links() }}
</div>