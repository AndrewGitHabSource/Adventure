<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;


class UserBookingController extends Controller
{
    public $repository = null;

    public function __construct()
    {
        $this->repository = new Repository('App\Models\UserBooking');
    }

    public function index(Request $request)
    {
        $user_bookings = $this->repository->search($request->search, ['name', 'email'], 'hotel');

        if ($request->ajax()) {
            $returnHTML = view('admin.user_booking.user_bookings_loop')->with('user_bookings', $user_bookings)->render();

            return response()->json(array('result' => $returnHTML), 200);
        } else {
            return view('admin.user_booking.list', ['user_bookings' => $user_bookings]);
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

        $roomRepository = new Repository('App\Models\Room');
        $rooms = $roomRepository->where('hotel_id', '=', 1);

        return view('admin.user_booking.create', ['hotels' => $hotels, 'rooms' => $rooms]);
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
            return redirect()->route('user_bookings.index')->with('success_message', 'Booking Saved');
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
        $user_booking = $this->repository->get($id);

        $hotelRepository = new Repository('App\Models\Hotel');
        $hotels = $hotelRepository->getAll();

        $roomRepository = new Repository('App\Models\Room');
        $userBookingHotelId = $hotelRepository->where('id', '=', $user_booking->hotel_id)[0]->id;
        $rooms = $roomRepository->where('hotel_id', '=', $userBookingHotelId);

        return view('admin.user_booking.edit', ['user_booking' => $user_booking, 'hotels' => $hotels, 'rooms' => $rooms]);
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
            return redirect()->route('user_bookings.index')->with('success_message', 'Booking Saved');
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
            return redirect()->route('user_bookings.index')->with('success_message', 'Booking Deleted');
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
