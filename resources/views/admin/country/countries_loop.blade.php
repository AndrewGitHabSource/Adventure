<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($countries))
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>

                <td>
                    <form method="post" action="{{ route('countries.destroy', ['country' => $country]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('countries.edit', ['country' => $country]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $countries->appends(request()->except('_token'))->links() }}
</div>