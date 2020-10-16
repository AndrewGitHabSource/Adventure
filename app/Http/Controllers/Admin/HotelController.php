<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreHotel;

class HotelController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Hotel');
    }

    public function index(Request $request)
    {
        $hotels = $this->repository->getAll();

        return view('admin.hotel.list', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotel $request)
    {
        $result = $this->repository->insert($request, true);

        if ($result){
            return redirect()->route('hotels.index')->with('success_message', 'Hotel Saved');
        }
        else{
            return redirect()->back()->with('error', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = $this->repository->get($id);

        return view('admin.hotel.edit', ['hotel' => $hotel]);
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
        $result = $this->repository->update($request, $id);

        if ($result){
            return redirect()->route('hotels.index')->with('success_message', 'Hotel Saved');
        }
        else{
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
        //
    }

    public function search(Request $request){
        $hotels = $this->repository->search($request->search, ['name', 'address', 'country', 'city']);

        return view('admin.hotel.list', ['hotels' => $hotels]);
    }
}
