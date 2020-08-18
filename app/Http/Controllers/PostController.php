<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postsList(Request $request)
    {
        $posts = Post::with('comments', 'tags', 'categories')->paginate(3);

        return view('post.posts', ['posts' => $posts]);
    }

    public function view($slug)
    {
        $post = Post::with(['tags', 'categories', 'user', 'child_posts', 'comments' => function ($q) {
            $q->where('comments.parent_id', '=', Null);
        }])->bySlug($slug);

        $categories = Category::with('posts')->get();
        $tags = Tag::all();

        return view('post.single', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function category($slug)
    {
        $category = Category::with('posts')->bySlug($slug);
        $posts = $category->posts()->paginate(3);

        return view('post.posts', ['posts' => $posts]);
    }

    public function tag($slug)
    {
        $tag = Tag::with('posts')->bySlug($slug);
        $posts = $tag->posts()->paginate(3);

        return view('post.posts', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $posts = Post::with('comments', 'tags', 'categories')->search($request->search)->paginate(3);

        return view('post.posts', ['posts' => $posts]);
    }

    public function saveComment(CommentRequest $request)
    {
        $input = $request->except('_token');
        $input['date'] = Carbon::now()->format('Y-m-d');

        Comment::create($input);

        return redirect()->back()->with('success_message', 'Your comment has been sent!');
    }
}
