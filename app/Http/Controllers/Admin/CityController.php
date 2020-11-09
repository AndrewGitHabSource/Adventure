<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use Illuminate\Support\Facades\Storage;


class CityController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\City');
    }

    public function index(Request $request)
    {
        $cities = $this->repository->search($request->search, ['name']);

        if ($request->ajax()) {
            $returnHTML = view('admin.city.cities_loop')->with('cities', $cities)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.city.list', ['cities' => $cities]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
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
            return redirect()->route('city.index')->with('success_message', 'City Saved');
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
        $city = $this->repository->get($id);

        return view('admin.city.edit', ['city' => $city]);
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

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('cities.index')->with('success_message', 'City Saved');
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
            return redirect()->route('cities.index')->with('success_message', 'City Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
