@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
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
                            <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>

                        <div class="desc">
                            <h3>George Washington</h3>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                                consectetur similique, inventore eos fugit cupiditate numquam!
                            </p>
                        </div>
                    </div>

                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">6 Comments</h3>

                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                </div>

                                <div class="comment-body">
                                    <h3>John Doe</h3>

                                    <div class="meta">October 03, 2018 at 2:21pm</div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>

                                    <p>
                                        <a href="#" class="reply">Reply</a>
                                    </p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                </div>

                                <div class="comment-body">
                                    <h3>John Doe</h3>

                                    <div class="meta">October 03, 2018 at 2:21pm</div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>

                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>

                                            <div class="meta">October 03, 2018 at 2:21pm</div>

                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia,
                                                fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit
                                                necessitatibus, nihil?
                                            </p>

                                            <p>
                                                <a href="#" class="reply">Reply</a>
                                            </p>
                                        </div>

                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>

                                                    <div class="meta">October 03, 2018 at 2:21pm</div>

                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia,
                                                        fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit
                                                        necessitatibus, nihil?
                                                    </p>

                                                    <p>
                                                        <a href="#" class="reply">Reply</a>
                                                    </p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                                        </div>

                                                        <div class="comment-body">
                                                            <h3>John Doe</h3>

                                                            <div class="meta">October 03, 2018 at 2:21pm</div>

                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                                autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                                Quam voluptas earum impedit necessitatibus, nihil?
                                                            </p>

                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                                </div>

                                <div class="comment-body">
                                    <h3>John Doe</h3>

                                    <div class="meta">October 03, 2018 at 2:21pm</div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                        laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                        enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>

                                    <p>
                                        <a href="#" class="reply">Reply</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>

                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
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
{{--                            @csrf--}}

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

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>

                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_1.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading">
                                    <a href="#">Even the all-powerful Pointing has no control about the blind texts</a>
                                </h3>

                                <div class="meta">
                                    <div>
                                        <a href="#">
                                            <span class="icon-calendar"></span> July 12, 2018
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#">
                                            <span class="icon-person"></span> Admin
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#"><span class="icon-chat"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_2.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading">
                                    <a href="#">Even the all-powerful Pointing has no control about the blind texts</a>
                                </h3>

                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>

                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>

                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>

                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('images/image_3.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading">
                                    <a href="#">Even the all-powerful Pointing has no control about the blind texts</a>
                                </h3>

                                <div class="meta">
                                    <div>
                                        <a href="#"><span class="icon-calendar"></span> July 12, 2018</a>
                                    </div>

                                    <div>
                                        <a href="#"><span class="icon-person"></span> Admin</a>
                                    </div>

                                    <div>
                                        <a href="#"><span class="icon-chat"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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