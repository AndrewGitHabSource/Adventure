@extends('layouts.app')

@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @if ($posts)
                    @foreach ($posts as $post)
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch" style="width: 100%;">
                                <a href="{{ route('post', ['slug' => $post->slug]) }}" class="block-20" style="background-image: url({{ $post->image }});"></a>

                                <div class="text">
                                    @if (count($post->categories) > 0)
                                        <span class="tag">
                                            @foreach($post->categories as $category)
                                                {{ $category->title }}
                                                @if (!$loop->last)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                    @endif

                                    <h3 class="heading mt-3">
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h3>

                                    <div class="meta mb-3">
                                        <div><a href="{{ route('post', ['slug' => $post->slug]) }}">{{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}</a></div>

                                        <div><a href="#">Admin</a></div>

                                        <div>
                                            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="meta-chat">
                                                <span class="icon-chat"></span> {{ $post->comments->count() }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection