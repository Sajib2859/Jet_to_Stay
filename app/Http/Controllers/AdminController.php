<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            // dd($usertype);
            if($usertype == 'user')
            {
                return view('home.index');
            }
            if($usertype == 'admin')
            {
                return view('admin.index');

            }

        }
        else{
            return redirect()->route('login')->with('message', 'You must login first');
        }
    }
    public function home()
    {
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $room = new Room();
        $room->room_title = $request->title;
        $room->room_type = $request->type;
        $room->wifi = $request->wifi;
        $room->price = $request->price;
        $room->description = $request->description;

        $image = $request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $room->image = $imagename;

        }

        $room->save();

        return redirect()->back()->with('message', 'Room Added Successfully');
    }

    public function display_room()
    {
        $room = Room::all();
        return view('admin.display_room', compact('room')); ;
    }

}
