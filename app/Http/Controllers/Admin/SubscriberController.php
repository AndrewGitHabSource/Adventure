<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;


class SubscriberController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Subscriber');
    }

    public function index(Request $request)
    {
        $subscribers = $this->repository->search($request->search, ['email']);

        if ($request->ajax()) {
            $returnHTML = view('admin.subscriber.subscribers_loop')->with('subscribers', $subscribers)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.subscriber.list', ['subscribers' => $subscribers]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscriber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token', '_method', 'files');

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('subscribers.index')->with('success_message', 'Subscriber Saved');
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
        $subscriber = $this->repository->get($id);

        return view('admin.subscriber.edit', ['subscriber' => $subscriber]);
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
        $input = $request->except('_token', '_method', 'files', 'id', 'image');

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('subscribers.index')->with('success_message', 'Subscriber Saved');
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
            return redirect()->route('subscribers.index')->with('success_message', 'Subscriber Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
