<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreCity;


class PlaceController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Place');
    }

    public function index(Request $request)
    {
        $places = $this->repository->search($request->search, ['name']);

        if ($request->ajax()) {
            $returnHTML = view('admin.place.places_loop')->with('places', $places)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.place.list', ['places' => $places]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countryRepository = new Repository('App\Models\Country');
        $countries = $countryRepository->getAll();

        $cityRepository = new Repository('App\Models\City');
        $cities = $cityRepository->where('country_id', '=', 1);

        return view('admin.place.create', ['countries' => $countries, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCity $request)
    {
        $input = $request->except('_token', '_method', 'image');
        $input = $this->repository->checkboxHandler($input, 'popular');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('places.index')->with('success_message', 'City Saved');
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
        $place = $this->repository->get($id);

        $countryRepository = new Repository('App\Models\Country');
        $countries = $countryRepository->getAll();

        $cityRepository = new Repository('App\Models\City');
        $placeCountryId = $countryRepository->where('name', '=', $place->country)[0]->id;
        $cities = $cityRepository->where('country_id', '=', $placeCountryId);

        return view('admin.place.edit', ['place' => $place, 'countries' => $countries, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCity $request, $id)
    {
        $input = $request->except('_token', '_method');
        $input = $this->repository->checkboxHandler($input, 'popular');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('places.index')->with('success_message', 'Place Saved');
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
            return redirect()->route('places.index')->with('success_message', 'Place Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
