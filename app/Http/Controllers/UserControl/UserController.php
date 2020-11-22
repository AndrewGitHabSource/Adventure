<?php

namespace App\Http\Controllers\UserControl;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Repository;

class UserController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $posts = $user->posts;

        return view('user.user', ['user' => $user, 'posts' => $posts]);
    }

    public function saveUserSettings(Request $request){
        $input = $request->except('_token');

        User::where('id', auth()->user()->id)->update($input);

        return redirect()->route('dashboard')->with('success_message', 'Information Saved');
    }

    public function editUserPost(Request $request, $id){
        $post = Post::where('id', $id)->firstOrFail();

        if (auth()->user()->can('update', $post)) {
            $categoryRepository = new Repository('App\Models\Category');
            $categories = $categoryRepository->getAll();
            $tagRepository = new Repository('App\Models\Tag');
            $tags = $tagRepository->getAll();

            return view('user.post_edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
        }
    }

    public function saveUserPost(Request $request, $id){
        $input = $request->except('_token', '_method', 'categories', 'tags', 'files');

        $repository = new Repository('App\Models\Post');

        if ($request->image) {
            $input['image'] = $repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $repository->update($input, $id);
        $post = $repository->get($id);

        if ($request->categories) {
            $repository->sync($post, 'categories', $request->categories);
        }

        if ($request->tags) {
            $repository->sync($post, 'tags', $request->tags);
        }

        return redirect()->route('dashboard')->with('success_message', 'Information Saved');
    }

    public function create(){
        $categoryRepository = new Repository('App\Models\Category');
        $categories = $categoryRepository->getAll();
        $tagRepository = new Repository('App\Models\Tag');
        $tags = $tagRepository->getAll();

        return view('user.post_add', ['categories' => $categories, 'tags' => $tags]);
    }

    public function insertUserPost(Request $request){
        $input = $request->except('_token', '_method', 'image', 'files');

        $repository = new Repository('App\Models\Post');

        if ($request->image) {
            $input['image'] = $repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $repository->insert($input, true);

        if ($request->categories) {
            $repository->sync($result, 'categories', $request->categories);
        }

        if ($request->tags) {
            $repository->sync($result, 'tags', $request->tags);
        }

        return redirect()->route('dashboard')->with('success_message', 'Information Saved');
    }
}
