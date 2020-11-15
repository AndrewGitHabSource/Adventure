<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreRestaurant;


class CarController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Car');
    }

    public function index(Request $request)
    {
        $cars = $this->repository->search($request->search, ['model', 'description']);

        if ($request->ajax()) {
            $returnHTML = view('admin.car.cars_loop')->with('cars', $cars)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.car.list', ['cars' => $cars]);
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

        return view('admin.car.create', ['countries' => $countries, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token', '_method', 'image');

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('cars.index')->with('success_message', 'Car Saved');
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
        $car = $this->repository->get($id);

        $countryRepository = new Repository('App\Models\Country');
        $countries = $countryRepository->getAll();

        $cityRepository = new Repository('App\Models\City');
        $placeCountryId = $countryRepository->where('name', '=', $car->country)[0]->id;
        $cities = $cityRepository->where('country_id', '=', $placeCountryId);

        return view('admin.car.edit', ['car' => $car, 'countries' => $countries, 'cities' => $cities]);
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
            return redirect()->route('cars.index')->with('success_message', 'Car Saved');
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
            return redirect()->route('cars.index')->with('success_message', 'Car Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
