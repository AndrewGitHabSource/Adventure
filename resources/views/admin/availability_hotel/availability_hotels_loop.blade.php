<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Email</th>

            <th>Date from</th>

            <th>Date to</th>
        </tr>
    </thead>

    <tbody>
    @if (count($availability_hotels))
        @foreach($availability_hotels as $availability_hotel)
            <tr>
                <td>{{ $availability_hotel->name }}</td>

                <td>{{ $availability_hotel->email }}</td>

                <td>{{ $availability_hotel->date_from }}</td>

                <td>{{ $availability_hotel->date_to }}</td>

                <td>
                    <form method="post" action="{{ route('availability-hotels.destroy', ['availability_hotel' => $availability_hotel]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('availability-hotels.edit', ['availability_hotel' => $availability_hotel]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $availability_hotels->appends(request()->except('_token'))->links() }}
</div>