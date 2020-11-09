<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use Illuminate\Support\Facades\Storage;


class CountryController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Country');
    }

    public function index(Request $request)
    {
        $countries = $this->repository->search($request->search, ['name']);

        if ($request->ajax()) {
            $returnHTML = view('admin.country.countries_loop')->with('countries', $countries)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.country.list', ['countries' => $countries]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
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

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('country.index')->with('success_message', 'Hotel Saved');
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

        return view('admin.country.edit', ['country' => $country]);
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
            return redirect()->route('countries.index')->with('success_message', 'Country Saved');
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
            return redirect()->route('countries.index')->with('success_message', 'Country Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
