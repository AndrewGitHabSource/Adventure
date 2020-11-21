<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;
use App\Http\Requests\StoreCategory;


class BookingController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\Booking');
    }

    public function index(Request $request, $availableRoom)
    {
        $this->repository->setWhereSearch('available_room_id', $availableRoom);
        $bookings = $this->repository->search($request->search, ['name_client']);

        if ($request->ajax()) {
            $returnHTML = view('admin.booking.bookings_loop')->with('bookings', $bookings)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.booking.list', ['bookings' => $bookings]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $availableRoom)
    {
        $input = $request->except('_token', '_method', 'files');

        $result = $this->repository->insert($input, false);

        if ($result) {
            return redirect()->route('available-rooms.bookings.index', ['available_room' => $availableRoom])->with('success_message', 'Room Saved');
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
    public function edit($availableRoomId, $id)
    {
        $booking = $this->repository->get($id);

        return view('admin.booking.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $availableRoom, $id)
    {
        $input = $request->except('_token', '_method', 'files');

        $result = $this->repository->update($input, $id);

        if ($result) {
            return redirect()->route('available-rooms.bookings.index', ['available_room' => $availableRoom])->with('success_message', 'Room Saved');
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
    public function destroy($availableRoom, $id)
    {
        $result = $this->repository->delete($id);

        if ($result) {
            return  redirect()->route('available-rooms.bookings.index', ['availableRoom' => $availableRoom])->with('success_message', 'Room Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
