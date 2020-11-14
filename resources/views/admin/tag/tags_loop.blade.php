<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Description</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($tags))
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->title }}</td>

                <td>{!! Str::limit($tag->description, 80, '...') !!}</td>

                <td>
                    <form method="post" action="{{ route('tags.destroy', ['tag' => $tag]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('tags.edit', ['tag' => $tag]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $tags->appends(request()->except('_token'))->links() }}
</div>