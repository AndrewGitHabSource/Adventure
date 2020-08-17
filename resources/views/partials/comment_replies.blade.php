<div class="comment-list">
    @foreach($comments as $comment)
        <div class="comment">
            <div class="vcard bio">
                <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
            </div>

            <div class="comment-body">
                <h3>{{ $comment->author }}</h3>

                <div class="meta">{{ \Carbon\Carbon::parse($comment->date)->format('j F, Y') }}</div>

                <p>
                    {{ $comment->text }}
                </p>

                <p>
                    <a href="#" class="reply">Reply</a>
                </p>
            </div>

            <div class="comment-form-wrap pt-5 reply-form">
                <h3 class="mb-5">Leave a comment</h3>

                <form action="{{ route('send.comment') }}" method="post" class="p-5 bg-light">
                    @csrf

                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <input type="hidden" name="post_id" value="{{ $post_id }}">

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

        <div class="children">
            @include('partials.comment_replies', ['comments' => $comment->replies])
        </div>
    @endforeach
</div>