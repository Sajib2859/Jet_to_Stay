<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
      <!-- end header inner -->
      <!-- end header -->
      
      <!-- contact -->
      <div class="contact" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>

                  @if(session()->has('message'))
                     <div class="alert alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                        {{ session()->get('message') }}
                     </div>
                  @endif

                  @if(session()->has('error'))
                     <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                        {{ session()->get('error') }}
                     </div>
                  @endif

                  @if($errors->any())
                     <div class="alert alert-danger">
                        <ul class="mb-0">
                           @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Name" type="text" name="name" required>
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="tel" name="phone" required>
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" name="message" required></textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>

               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      
      <!--  footer -->
      @include('home.footer')

      <script type="text/javascript">
         $(window).scroll(function() {
            sessionStorage.scrolltop = $(this).scrolltop();
         });

         $(document).ready(function(){
            if(sessionStorage.scrolltop != "undefined"){
               $(window).scrolltop(sessionStorage.scrolltop);
            }
         });
      </script>

   </body>
</html>
