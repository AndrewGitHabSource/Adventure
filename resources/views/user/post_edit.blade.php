@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper" style="margin-left: 0;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Profile</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                            <li class="breadcrumb-item active">Edit User Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('user.partials.user_info')

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="" id="settings">
                                        <form method="post" action="{{ route('save.user.post', ['id' => $post->id]) }}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Title</label>

                                                <div class="col-sm-10">
                                                    <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>

                                                <div class="col-sm-10">
                                                    <input value="{{ $post->date }}" name="date" type="date" class="form-control" id="inputEmail" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="info" class="col-sm-2 col-form-label">Description</label>

                                                <div class="col-sm-10">
                                                    <textarea name="description" class="textarea" id="info" placeholder="Description">{{ $post->description }}</textarea>
                                                </div>
                                            </div>

                                            <input name="user_id" value="{{ auth()->user()->id }}" type="hidden">

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

                                            <div class="form-group">
                                                <label>Tags</label>

                                                <select name="tags[]" class="select2" data-placeholder="Select a State" multiple="multiple" style="width: 100%;">
                                                    @foreach($tags as $tag)
                                                        <option @if ($post->tags->contains($tag->id))
                                                                {{ 'selected' }}
                                                                @endif value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div style="width: 400px;">
                                                <img src="{{ $post->image }}" style="max-width: 100%;">
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>

                                                <input name="image" type="file" class="form-control">
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection