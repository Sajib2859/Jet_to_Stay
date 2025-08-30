<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Gallery;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            
            if($usertype == 'user')
            {
                $room = Room::all();
                $gallery= Gallery::all();
                
                return view('home.index', compact('room','gallery'));
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
        
        $room = Room::all();

        $gallery= Gallery::all();
        
        return view('home.index', compact('room','gallery'));
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

    public function delete_room($id)
    {
        $room = Room::find($id);
        if($room)
        {
            $room->delete();
            return redirect()->back()->with('message', 'Room Deleted Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Room Not Found');
        }
    }

    public function update_room($id)
    {
        $room = Room::find($id);
        if($room)
        {
            return view('admin.update_room', compact('room'));
        }
        else
        {
            return redirect()->back()->with('error', 'Room Not Found');
        }
    }

    public function edit_room(Request $request, $id)
    {
        $room = Room::find($id);
        if($room)
        {
            $room->room_title = $request->title;
            $room->room_type = $request->type;
            $room->wifi = $request->wifi;
            $room->price = $request->price;
            $room->description = $request->description;

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('room', $imagename);
                $room->image = $imagename;
            }

            $room->save();

            return redirect()->back()->with('message', 'Room Updated Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Room Not Found');
        }
    }

    public function bookings()
    {
        $room = Booking::all();
        if($room)
        {
            return view('admin.booking', compact('room'));
        }
        else
        {
            return redirect()->back()->with('error', 'Room Not Found');
        }
    }

    public function delete_booking($id)
    {
        $room = Booking::find($id);
        if($room)
        {
            $room->delete();
            return redirect()->back()->with('message', 'Booking Deleted Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Booking Not Found');
        }
    }

    public function approve_booking($id)
    {
        $room = Booking::find($id);
        if($room)
        {
            $room->status = 'Approved';
            $room->save();
            return redirect()->back()->with('message', 'Booking Approved Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Booking Not Found');
        }
    }

    public function reject_booking($id)
    {
        $room = Booking::find($id);
        if($room)
        {
            $room->status = 'Rejected';
            $room->save();
            return redirect()->back()->with('message', 'Booking Rejected Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Booking Not Found');
        }
    }

    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery',compact('gallery'));
    }

    public function upload_image(Request $request)
    {
        $data = new Gallery();
        $image = $request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery', $imagename);
            $data->image = $imagename;
            $data->save();

            return redirect()->back()->with('message', 'Image Uploaded Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'No Image Selected');
        }
    }

    public function delete_image($id)
    {
        $image = Gallery::find($id);
        if($image)
        {
            $image->delete();
            return redirect()->back()->with('message', 'Image Deleted Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Image Not Found');
        }
    }

}
