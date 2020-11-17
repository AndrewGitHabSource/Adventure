<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreContact;


class ContactController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Contact');
    }

    public function index(Request $request)
    {
        $contacts = $this->repository->search($request->search, ['name', 'email', 'message', 'ip']);

        if ($request->ajax()) {
            $returnHTML = view('admin.contact.contacts_loop')->with('contacts', $contacts)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.contact.list', ['contacts' => $contacts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $input = $request->except('_token', '_method', 'files');

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('contacts.index')->with('success_message', 'Contact Saved');
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
        $contact = $this->repository->get($id);

        return view('admin.contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, $id)
    {
        $input = $request->except('_token', '_method', 'files', 'id', 'image');

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('contacts.index')->with('success_message', 'Contact Saved');
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
            return redirect()->route('contacts.index')->with('success_message', 'Contact Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
