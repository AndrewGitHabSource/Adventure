<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Email</th>

            <th>Subject</th>

            <th>IP</th>

            <th>Message</th>
        </tr>
    </thead>

    <tbody>
    @if (count($contacts))
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>

                <td>{{ $contact->email }}</td>

                <td>{{ $contact->subject }}</td>

                <td>{{ $contact->ip }}</td>

                <td>{!! Str::limit($contact->message, 80, '...') !!}</td>

                <td>
                    <form method="post" action="{{ route('contacts.destroy', ['contact' => $contact]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('contacts.edit', ['contact' => $contact]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $contacts->appends(request()->except('_token'))->links() }}
</div>