<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Email</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($subscribers))
        @foreach($subscribers as $subscriber)
            <tr>
                <td>{{ $subscriber->email }}</td>

                <td>
                    <form method="post" action="{{ route('subscribers.destroy', ['subscriber' => $subscriber]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('subscribers.edit', ['subscriber' => $subscriber]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $subscribers->appends(request()->except('_token'))->links() }}
</div>