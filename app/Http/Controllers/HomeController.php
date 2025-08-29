<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        
        if ($room) {
            return view('home.room_details', compact('room'));
        } else {
            return redirect()->route('home')->with('message', 'Room not found');
        }
    }

    public function add_booking(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        // Check if the room exists
        $room = Room::find($id);
        if (!$room) {
            return redirect()->route('room_details', ['id' => $id])->with('error', 'Room not found');
        }

        // Create a new booking
        $bookingExists = Booking::where('room_id', $id)
            ->where('start_date', '<=', $request->endDate)
            ->where('end_date', '>=', $request->startDate)
            ->exists();

        if ($bookingExists) {
            return redirect()->route('room_details', ['id' => $id])->with('error', 'Room is already booked for the selected dates');
        }

        // Save the booking 

        $data = new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $start_date = $request->startDate;
        $end_date = $request->endDate;
        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=', $start_date)
            ->exists();
        if ($isBooked) {
            return redirect()->route('room_details', ['id' => $id])->with('error', 'Room is already booked for the selected dates');
        }

        else {
        $data->start_date = $request->startDate; 
        $data->end_date = $request->endDate;
        
        if ($data->save()) {
            return redirect()->route('room_details', ['id' => $id])->with('message', 'Booking successful');
        } 
        else {
            return redirect()->route('room_details', ['id' => $id])->with('error', 'Booking failed');
        }
        }
    }
}
