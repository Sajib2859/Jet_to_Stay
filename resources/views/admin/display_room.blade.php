<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
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
                <div class="container-fluid"></div>

                    <table class="table_deg">
                        
                        <tr>
                                <th class="th_deg">Room Title</th>
                                <th class="th_deg">Description</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Wifi</th>
                                <th class="th_deg">Room Type</th>
                                <th class="th_deg">Image</th>
                        </tr>

                        @foreach($room as $room)

                        <tr>
                            <td>{{$room->room_title}}</td>
                            <td>{!!Str::limit($room->description,150)!!}</td>
                            <td>{{$room->price}}$</td>
                            <td>{{$room->wifi}}</td>
                            <td>{{$room->room_type}}</td>
                            <td>
                                <img height="100" width="100" src="/room/{{$room->image}}" alt="">
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
      
        

        @include('admin.footer')


  </body>
</html>