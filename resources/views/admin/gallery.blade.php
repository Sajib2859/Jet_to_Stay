<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      
        <div class="page-content">
            <div class="page-header">
            <div class="container-fluid">

                <center>

                <h1 style = "font-size: 40px; font-weight: bolder; color: white;" class="h5 no-margin-bottom">Gallery</h1>

                <div class = "row">
                @foreach($gallery as $gallery)

                <div class = "col-md-4">

                <img style="height: 400px; width:400px;" src="/gallery/{{ $gallery->image }}">
                <a href="{{ url('delete_image', $gallery->id) }}" onclick="return confirm('Are you sure to delete this image?')" class="btn btn-danger">Delete Image</a>

                </div>

                @endforeach

                </div>

                <form action = "{{ url('upload_image') }}" method = "POST" enctype="multipart/form-data">
                    @csrf

                    <div style="padding: 15px;">
                        <label style = "color: white; font-weight: bold;">Upload Image</label>
                        <input type="file" name="image" required>
                        <input type="submit" value = "Upload Image" class="btn btn-primary">
                    </div>

                </form>

                </center>

            </div>

            </div>

        </div>




        

    @include('admin.footer')


  </body>
</html>