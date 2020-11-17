<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreTag;


class TagController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Tag');
    }

    public function index(Request $request)
    {
        $tags = $this->repository->search($request->search, ['title', 'description']);

        if ($request->ajax()) {
            $returnHTML = view('admin.tag.tags_loop')->with('tags', $tags)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.tag.list', ['tags' => $tags]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        $input = $request->except('_token', '_method', 'files');

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('tags.index')->with('success_message', 'Tag Saved');
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
        $tagRepository = new Repository('App\Models\Tag');
        $tag = $tagRepository->get($id);

        return view('admin.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, $id)
    {
        $input = $request->except('_token', '_method', 'files', 'id', 'image');

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('tags.index')->with('success_message', 'Tag Saved');
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
            return redirect()->route('tags.index')->with('success_message', 'Tag Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
