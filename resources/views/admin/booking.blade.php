<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg {
            background-color: skyblue;  
            padding: 15px;      

        }

        tr{
            border: 3px solid black;
            text-align: left;
        }

        td{
            padding: 10px;
            text-align: left;
        }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table class="table_deg">
                        
                        <tr>
                                <th class="th_deg">Room_id</th>
                                <th class="th_deg">Guest name</th>
                                <th class="th_deg">Email</th>
                                <th class="th_deg">Phone</th>
                                <th class="th_deg">Arrival Date</th>
                                <th class="th_deg">Departure Date</th>
                                <th class="th_deg">Status</th>
                                <th class="th_deg">Room Title</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Image</th>

                        </tr>
                        @foreach($room as $room)
                        <tr>
                            <td>{{$room->room_id}}</td>
                            <td>{{$room->name}}</td>
                            <td>{{$room->email}}</td>
                            <td>{{$room->phone}}</td>
                            <td>{{$room->start_date}}</td>
                            <td>{{$room->end_date}}</td>
                            <td>{{$room->status}}</td>
                            <td>{{$room->room->room_title}}</td>
                            <td>{{$room->room->price}}</td>
                            <td><img height="100" width="200" src="/room/{{$room->room->image}}"></td>

                            
                        </tr>
                        @endforeach
                    </table>
          </div>
        </div>
    </div>

    @include('admin.footer')


  </body>
</html>