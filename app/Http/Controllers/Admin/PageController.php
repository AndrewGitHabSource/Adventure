<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StorePage;


class PageController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Page');
    }

    public function index(Request $request)
    {
        $pages = $this->repository->search($request->search, ['title', 'description']);

        if ($request->ajax()) {
            $returnHTML = view('admin.page.pages_loop')->with('pages', $pages)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.page.list', ['pages' => $pages]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        $input = $request->except('_token', '_method', 'files');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('pages.index')->with('success_message', 'Page Saved');
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
        $country = $this->repository->get($id);

        return view('admin.page.edit', ['page' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePage $request, $id)
    {
        $input = $request->except('_token', '_method', 'id', 'image');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('pages.index')->with('success_message', 'Page Saved');
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
            return redirect()->route('pages.index')->with('success_message', 'Page Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
