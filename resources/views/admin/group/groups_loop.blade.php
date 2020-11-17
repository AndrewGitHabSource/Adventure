<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Rules</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($groups))
        @foreach($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>

                <td>{{ $group->rules }}</td>

                <td>
                    <form method="post" action="{{ route('groups.destroy', ['group' => $group]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('groups.edit', ['group' => $group]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $groups->appends(request()->except('_token'))->links() }}
</div>