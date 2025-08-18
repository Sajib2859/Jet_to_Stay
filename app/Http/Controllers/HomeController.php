<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

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
}
