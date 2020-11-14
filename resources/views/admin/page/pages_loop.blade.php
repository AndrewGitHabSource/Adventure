<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Title</th>

            <th>Description</th>

            <th>Data</th>
        </tr>
    </thead>

    <tbody>
    @if (count($pages))
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>

                <td>{!! Str::limit($page->description, 80, '...') !!}</td>

                <td>{{ $page->date }}</td>

                <td>
                    <form method="post" action="{{ route('pages.destroy', ['page' => $page]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('pages.edit', ['page' => $page]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $pages->appends(request()->except('_token'))->links() }}
</div>