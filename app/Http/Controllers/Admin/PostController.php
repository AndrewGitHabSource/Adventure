<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StorePlace;


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
        return view('admin.place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlace $request)
    {
        $input = $request->except('_token', '_method', 'image');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

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

        return view('admin.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token', '_method');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

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
