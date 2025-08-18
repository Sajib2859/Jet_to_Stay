<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.css')

      <style type="text/css">
         label {
            display: inline-block;
            width: 200px;
            text-align: left; 
         }

         .form-control {
            display: block;
            width: 100%;
            padding: 8px;
            margin-top: 5px;
         }

         input
         {
            width: 100%;
            padding: 8px;
         }
      </style>

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      <!-- end header -->

    <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Rooms</h2>
                     <p>Safe, Convenient and Affordable</p>
                  </div>
               </div>
            </div>
            <div class="row">
               
               
               <div class="col-md-8">
                  <div id="serv_hover"  class="room">
                     <div style="padding: 20px" class="room_img">
                        <figure><img style="margin: auto; height: 300px; width: 800px" src="/room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h2>{{$room->room_title}}</h2>
                        <p style="padding: 12px">{{$room->description}}</p>
                        <h5 style="padding: 12px"> Room Type : {{$room->room_type}}</h5>
                        <h4 style="padding: 12px"> Free WiFi : {{$room->wifi}}</h4>
                        <h3 style="padding: 12px"> Price : {{$room->price}}</h3>
                        
                     

                     </div>
                  </div>
               </div>

               <div class="col-md-4">

                  <h1 style="font-size: 40px!important;">Book Room</h1>

                  @if($errors)

                  @foreach($errors->all() as $errors)

                  <li style="color: red; font-size: 20px; padding-left: 10px;">
                     {{$errors}}
                  </li>

                  @endforeach

                  @endif

                  <form action="{{url('add_booking',$room->id)}}" method="post">
                   @csrf
                  
                  <div>
                     <label>Name</label>
                     <input type="text" name="name" 
                     @if(Auth::id())
                     value="{{Auth::user()->name}}" @endif placeholder="Enter Your Name" class="form-control">
                  </div>
                  
                  <div>
                     <label>Email</label>
                     <input type="email" name="email" 
                     @if(Auth::id())
                     value="{{Auth::user()->email}}" @endif
                     placeholder="Enter Your Email" class="form-control">
                  </div>
                  
                  <div>
                     <label>Phone</label>
                     <input type="number" name="phone" 
                     @if(Auth::id())
                     value="{{Auth::user()->phone}}" @endif
                     placeholder="Enter Your Phone Number" class="form-control">
                  </div> 
                  
                  <div>
                  <label>Start Date</label>
                     <input type="date" name="startDate" id="startDate" class="form-control">
                  </div>
                  
                  <div>
                  <label>End Date</label>
                     <input type="date" name="endDate" id="endDate" class="form-control">
                  </div>
                  <div style="padding-top: 30px;">
                     <input type="submit" value="Book Now" class="btn btn-primary">
                  </div>
                  
                  </form>
                  
               </div>
            </div>
         </div>
      </div>













 





      <!--  footer -->
      @include('home.footer')

   <script type="text/javascript">
      $(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#startDate').attr('min', maxDate);
    $('#endDate').attr('min', maxDate);

});

   </script>
   </body>
</html>