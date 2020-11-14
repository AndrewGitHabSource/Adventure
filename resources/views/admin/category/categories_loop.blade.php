<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Name</th>

            <th>Description</th>

            <th>Control</th>
        </tr>
    </thead>

    <tbody>
    @if (count($categories))
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->title }}</td>

                <td>{!! Str::limit($category->description, 80, '...') !!}</td>

                <td>
                    <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                    <a href="{{ route('categories.edit', ['category' => $category]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div class="pagination">
    {{ $categories->appends(request()->except('_token'))->links() }}
</div>