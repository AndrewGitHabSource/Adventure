<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreFlight;


class FlightController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Flight');
    }

    public function index(Request $request)
    {
        $flights = $this->repository->search($request->search, ['description', 'from', 'where']);

        if ($request->ajax()) {
            $returnHTML = view('admin.flight.flights_loop')->with('flights', $flights)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.flight.list', ['flights' => $flights]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlight $request)
    {
        $input = $request->except('_token', '_method', 'files');

        if ($request->logo) {
            $input['logo'] = $this->repository->ImagesUpload($request, [$request->logo])[0]['image'];
        }

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('flights.index')->with('success_message', 'Flight Saved');
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
        $flight = $this->repository->get($id);

        return view('admin.flight.edit', ['flight' => $flight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFlight $request, $id)
    {
        $input = $request->except('_token', '_method', 'country');

        if ($request->logo) {
            $input['logo'] = $this->repository->ImagesUpload($request, [$request->logo])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('flights.index')->with('success_message', 'Flight Saved');
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
            return redirect()->route('flights.index')->with('success_message', 'Flight Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
