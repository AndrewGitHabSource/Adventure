<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Email</th>

            <th>Start date</th>

            <th>End date</th>

            <th>Hotel</th>
        </tr>
    </thead>

    <tbody>
    @if (count($user_bookings))
        @foreach($user_bookings as $booking)
            <tr>
                <td>{{ $booking->name }}</td>

                <td>{{ $booking->email }}</td>

                <td>{{ $booking->start_date }}</td>

                <td>{{ $booking->end_date }}</td>

                <td>{{ $booking->hotel->name }}</td>

                <td>
                    <form method="post" action="{{ route('user_bookings.destroy', ['user_booking' => $booking]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('user_bookings.edit', ['user_booking' => $booking]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $user_bookings->appends(request()->except('_token'))->links() }}
</div>