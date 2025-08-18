<!DOCTYPE html>
<html>
<head>
<base href="/public">
    @include('admin.css')

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            text-align: left; 
        }

        .div_deg {
            padding: 30px;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        .container-fluid {
            width: 80%;
            margin: 0 auto;
        }

    </style>

</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid"></div>

            <div class="div_center">
                <h1 style="font-size: 30px; font-weight: bold;">Update Room</h1>
                <form action="{{ url('edit_room',$room->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="div_deg">
                        <label>Room Title</label>
                        <input type="text" name="title" value="{{$room->room_title}}" placeholder="Enter Room Title" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Room Description" class="form-control">{{$room->description}}
                        </textarea>
                    </div>

                    <div class="div_deg">
                        <label>Price</label>
                        <input type="number" name="price" value="{{$room->price}}" placeholder="Enter Room Price" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Room Type</label>
                        <select name="type" class="form-control">
                            <option selected value="{{$room->room_type}}">{{$room->room_type}}</option>
                            <option value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Free Wifi</label>
                        <select name="wifi" class="form-control">
                            <option selected value="{{$room->wifi}}">{{$room->wifi}}</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>


                    <div class="div_deg">
                        <label>Current Image</label>
                        <img style="margin: auto" width="200" src="/room/{{$room->image}}" alt="Room Image">
                    </div>

                    <div class="div_deg">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="div_deg">
                        <input type="submit" value="Update Room" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')

</body>
</html>
