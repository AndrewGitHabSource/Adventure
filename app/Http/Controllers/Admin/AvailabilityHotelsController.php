<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StorePage;


class AvailabilityHotelsController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\AvailabilityHotels');
    }

    public function index(Request $request)
    {
        $availability_hotels = $this->repository->search($request->search, ['name', 'email', 'date_from', 'date_to']);

        if ($request->ajax()) {
            $returnHTML = view('admin.availability_hotel.availability_hotels_loop')->with('availability_hotels', $availability_hotels)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.availability_hotel.list', ['availability_hotels' => $availability_hotels]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.availability_hotel.create');
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

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('availability-hotels.index')->with('success_message', 'Availability hotel Saved');
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
        $availability_hotel = $this->repository->get($id);

        return view('admin.availability_hotel.edit', ['availability_hotel' => $availability_hotel]);
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
            return redirect()->route('availability-hotels.index')->with('success_message', 'Availability hotel Saved');
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
            return redirect()->route('availability-hotels.index')->with('success_message', 'Availability hotel Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
