<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Email</th>

            <th>Login</th>
        </tr>
    </thead>

    <tbody>
    @if (count($users))
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>{{ $user->login }}</td>

                <td>
                    <form method="post" action="{{ route('users.destroy', ['user' => $user]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('users.edit', ['user' => $user]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $users->appends(request()->except('_token'))->links() }}
</div>