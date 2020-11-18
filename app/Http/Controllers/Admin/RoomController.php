<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreCategory;


class RoomController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Room');
    }

    public function index(Request $request, $idHotel)
    {
        $this->repository->setWhereSearch('hotel_id', $idHotel);
        $rooms = $this->repository->search($request->search, ['name', 'description']);

        if ($request->ajax()) {
            $returnHTML = view('admin.room.rooms_loop')->with('rooms', $rooms)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.room.list', ['rooms' => $rooms]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotelRepository = new Repository('App\Models\Hotel');
        $hotels = $hotelRepository->getAll();

        return view('admin.room.create', ['hotels' => $hotels]);
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

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->insert($input, true);

        if ($result) {
            return redirect()->route('hotels.rooms.index', ['hotel' => $input['hotel_id']])->with('success_message', 'Room Saved');
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
        $room = $this->repository->get($id);
        $hotelRepository = new Repository('App\Models\Hotel');
        $hotels = $hotelRepository->getAll();

        return view('admin.room.edit', ['room' => $room, 'hotels' => $hotels]);
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

        if ($request->image) {
            $input['image'] = $this->repository->ImagesUpload($request, [$request->image])[0]['image'];
        }

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('hotels.rooms.index', ['hotel' => $input['hotel_id']])->with('success_message', 'Room Saved');
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
            return  redirect()->route('hotels.rooms.index', ['hotel' => $hotel])->with('success_message', 'Room Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
