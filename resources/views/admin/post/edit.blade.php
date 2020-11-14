@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Post</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Post Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('posts.update', ['post' => $post->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Title*</label>

                                                <input value="{{ $post->title }}" required name="title" type="text" class="form-control" placeholder="Enter Title">
                                            </div>

                                            <div class="form-group">
                                                <label>Description*</label>

                                                <textarea class="textarea" required name="description">{{ $post->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Date*</label>

                                                <input value="{{ $post->date }}" required name="date" type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Categories</label>

                                                @foreach($categories as $category)
                                                    <div class="form-check">
                                                        <input @if ($post->categories->contains($category->id))
                                                            {{ 'checked' }}
                                                        @endif value="{{ $category->id }}" name="categories[]" class="form-check-input" id="cat-{{$category->id}}" type="checkbox">

                                                        <label for="cat-{{$category->id}}" class="form-check-label">{{ $category->title }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div style="width: 400px;">
                                                <img src="{{ $post->image }}" style="max-width: 100%;">
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>

                                                <input name="image" type="file" class="form-control">
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection