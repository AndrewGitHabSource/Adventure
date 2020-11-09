<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Country</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($cities))
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>

                <td>
                    @if ($city->country)
                        {{ $city->country->name }}
                    @endif
                </td>

                <td>
                    <form method="post" action="{{ route('cities.destroy', ['city' => $city]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('cities.edit', ['city' => $city]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $cities->appends(request()->except('_token'))->links() }}
</div>