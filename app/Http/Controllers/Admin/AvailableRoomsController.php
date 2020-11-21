<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ARoomRepository\ARoomRepository;
use App\Http\Requests\StoreCategory;


class AvailableRoomsController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new ARoomRepository('App\Models\ARooms');
    }

    public function index(Request $request, $idHotel)
    {
        $maxFloor = $this->repository->max('floor', $idHotel);
        $roomSortedByFloor = array();

        for($i = 1; $i <= $maxFloor; $i++){
            $roomSortedByFloor[$i] = $this->repository->getByFloor($i, $idHotel);
        }

        return view('admin.available_room.list', ['available_rooms' => $roomSortedByFloor, 'maxFloor' => $maxFloor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotelRepository = new ARoomRepository('App\Models\Hotel');
        $hotels = $hotelRepository->getAll();

        return view('admin.available_room.create', ['hotels' => $hotels]);
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
            return redirect()->route('hotels.available-rooms.index', ['hotel' => $input['hotel_id']])->with('success_message', 'Available Room Saved');
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
    public function edit($hotelId, $id)
    {
        $available_room = $this->repository->get($id);
        $hotelRepository = new ARoomRepository('App\Models\Hotel');
        $hotels = $hotelRepository->getAll();

        return view('admin.available_room.edit', ['available_room' => $available_room, 'hotels' => $hotels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hotel, $id)
    {
        $input = $request->except('_token', '_method', 'files', 'id', 'image');

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('hotels.available-rooms.index', ['hotel' => $input['hotel_id']])->with('success_message', 'Available Room Saved');
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
    public function destroy($hotel, $id)
    {
        $result = $this->repository->delete($id);

        if ($result) {
            return  redirect()->route('hotels.available-rooms.index', ['hotel' => $hotel])->with('success_message', 'Available Room Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
