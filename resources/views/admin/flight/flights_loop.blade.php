<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>From</th>

            <th>Where</th>

            <th>Description</th>

            <th>Time</th>

            <th>Price</th>

            <th>Date start</th>

            <th>Date end</th>
        </tr>
    </thead>

    <tbody>
    @if (count($flights))
        @foreach($flights as $flight)
            <tr>
                <td>{{ $flight->from }}</td>

                <td>{{ $flight->where }}</td>

                <td>{!!  $flight->description !!}</td>

                <td>{{ $flight->time }}</td>

                <td>{{ $flight->price }}</td>

                <td>{{ $flight->date_start }}</td>

                <td>{{ $flight->date_end }}</td>

                <td>
                    <form method="post" action="{{ route('flights.destroy', ['flight' => $flight]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('flights.edit', ['flight' => $flight]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $flights->appends(request()->except('_token'))->links() }}
</div>