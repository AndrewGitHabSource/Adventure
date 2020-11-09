@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>

                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif

                    <h2 class="mb-3">{{ $post->title }}</h2>

                    <img style="max-width: 100%;" src="{{ asset($post->image) }}">

                    {!! $post->description !!}

                    @if (count($post->tags) > 0)
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="tagcloud">
                                <span class="tag">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ route('tag', $tag->slug) }}" class="tag-cloud-link">{{ $tag->title }}</a>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    @endif

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="{{ asset($post->user->profile_photo_path) }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>

                        <div class="desc">
                            <h3>{{ $post->user->name }}</h3>

                            <p>
                                {{ $post->user->info }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">{{ $post->comments->count() }} Comments</h3>

                        @include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>

                            <form action="{{ route('send.comment') }}" method="post" class="p-5 bg-light">
                                @csrf

                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input name="author" type="text" class="form-control" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input name="email" type="email" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="text" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form name="search" method="get" action="{{ route('search.post') }}" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>

                                <input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>

                    @if (count($categories) > 0)
                        <div class="sidebar-box ftco-animate">
                            <div class="categories">
                                <h3>Categories</h3>

                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('category', $category->slug) }}">{{ $category->title }} <span>({{ $category->posts->count() }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (count($post->child_posts) > 0)
                        <div class="sidebar-box ftco-animate">
                            <h3>Recent Blog</h3>

                            @foreach ($post->child_posts as $child_post)
                                <div class="block-21 mb-4 d-flex">
                                    <a class="blog-img mr-4" style="background-image: url({{ asset($child_post->image) }});"></a>
                                    <div class="text">
                                        <h3 class="heading">
                                            <a href="{{ route('post', ['slug' => $child_post->slug]) }}">{{ $child_post->title }}</a>
                                        </h3>

                                        <div class="meta">
                                            <div>
                                                <a href="{{ route('post', ['slug' => $child_post->slug]) }}">
                                                    <span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}
                                                </a>
                                            </div>

                                            <div>
                                                <a href="{{ route('post', ['slug' => $child_post->slug]) }}">
                                                    <span class="icon-person"></span> {{ $child_post->user->name }}
                                                </a>
                                            </div>

                                            <div>
                                                <a href="#"><span class="icon-chat"></span> {{ $child_post->comments->count() }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (count($tags) > 0)
                        <div class="sidebar-box ftco-animate">
                            <h3>Tag Cloud</h3>

                            <div class="tagcloud">
                                @foreach($tags as $tag)
                                    <a href="{{ route('tag', $tag->slug) }}" class="tag-cloud-link">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique,
                            inventore eos fugit cupiditate numquam!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection