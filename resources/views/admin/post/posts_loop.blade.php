<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Title</th>

            <th>Description</th>

            <th>Data</th>
        </tr>
    </thead>

    <tbody>
    @if (count($posts))
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>

                <td>{!! Str::limit($post->description, 80, '...') !!}</td>

                <td>{{ $post->date }}</td>

                <td>
                    <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $posts->appends(request()->except('_token'))->links() }}
</div>