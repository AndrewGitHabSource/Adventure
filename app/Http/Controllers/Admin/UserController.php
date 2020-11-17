<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserBooking;


class UserController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\User');
    }

    public function index(Request $request)
    {
        $users = $this->repository->search($request->search, ['name', 'email']);

        if ($request->ajax()) {
            $returnHTML = view('admin.user.users_loop')->with('users', $users)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.user.list', ['users' => $users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token', '_method');
        $input = $this->repository->checkboxHandler($input, 'is_admin');
        $input['password'] =  Hash::make($request->password);

        if ($request->profile_photo_path) {
            $input['profile_photo_path'] = $this->repository->ImagesUpload($request, [$request->profile_photo_path])[0]['image'];
        }

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('users.index')->with('success_message', 'User Saved');
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
        $user = $this->repository->get($id);

        return view('admin.user.edit', ['user' => $user]);
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
        $input = $this->repository->checkboxHandler($input, 'is_admin');
        $input['password'] =  Hash::make($request->password);

        if ($request->profile_photo_path) {
            $input['profile_photo_path'] = $this->repository->ImagesUpload($request, [$request->profile_photo_path])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('users.index')->with('success_message', 'User Saved');
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
            return redirect()->route('users.index')->with('success_message', 'User Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
