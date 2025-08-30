<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">
    @include('admin.css')

        <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            text-align: left;  /* Ensures labels are aligned to the left */
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
          <div class="container-fluid">

            <center>

                <h1 style="font-size: 30px; font-weight: bold">Send Mail to {{$data->email}}</h1>

                <form action="{{ url('mail',$data->id) }}" method="post">
                    @csrf

                    <div class="div_deg">
                        <label>Greeting</label>
                        <input type="text" name="greeting" placeholder="Enter Header" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Mail Body</label>
                        <textarea name="body" placeholder="Enter Mail Body" class="form-control"></textarea>
                    </div>

                    <div class="div_deg">
                        <label>Action Text</label>
                        <input type="text" name="action_text" placeholder="Enter Action Text" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Action Url</label>
                        <input type="text" name="action_url" placeholder="Enter Action Url" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Footer</label>
                        <input type="text" name="footer" placeholder="Enter Footer" class="form-control">
                    </div>


                    <div class="div_deg">
                        <input type="submit" value="Send Mail" class="btn btn-primary">
                    </div>

                </form>

            </center>

          </div>
        </div>
    </div>
      
        

    @include('admin.footer')


  </body>
</html>