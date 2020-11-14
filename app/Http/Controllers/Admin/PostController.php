<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StorePost;


class PostController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Post');
    }

    public function index(Request $request)
    {
        $posts = $this->repository->search($request->search, ['title', 'description']);

        if ($request->ajax()) {
            $returnHTML = view('admin.post.posts_loop')->with('posts', $posts)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.post.list', ['posts' => $posts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Repository('App\Models\Category');
        $categories = $category->getAll();
        $tag = new Repository('App\Models\Tag');
        $tags = $tag->getAll();

        return view('admin.post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $input = $request->except('_token', '_method', 'image', 'files');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

        if ($request->categories) {
            $this->repository->sync($result, 'categories', $request->categories);
        }

        if ($request->tags) {
            $this->repository->sync($result, 'tags', $request->tags);
        }

        if ($result) {
            return redirect()->route('posts.index')->with('success_message', 'Post Saved');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->repository->get($id);
        $category = new Repository('App\Models\Category');
        $categories = $category->getAll();
        $tag = new Repository('App\Models\Tag');
        $tags = $tag->getAll();

        return view('admin.post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $input = $request->except('_token', '_method', 'categories', 'tags', 'files');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->update($input, $id);
        $post = $this->repository->get($id);

        if ($request->categories) {
            $this->repository->sync($post, 'categories', $request->categories);
        }

        if ($request->tags) {
            $this->repository->sync($post, 'tags', $request->tags);
        }

        if ($result) {
            return redirect()->route('posts.index')->with('success_message', 'Post Saved');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->repository->delete($id);

        if ($result) {
            return redirect()->route('posts.index')->with('success_message', 'Post Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
