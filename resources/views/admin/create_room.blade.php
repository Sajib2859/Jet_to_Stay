<!DOCTYPE html>
<html>
<head>
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
            <div class="container-fluid"></div>

            <div class="div_center">
                <h1 style="font-size: 30px; font-weight: bold;">Add Room</h1>
                <form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="div_deg">
                        <label>Room Title</label>
                        <input type="text" name="title" placeholder="Enter Room Title" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Room Description" class="form-control"></textarea>
                    </div>

                    <div class="div_deg">
                        <label>Price</label>
                        <input type="number" name="price" placeholder="Enter Room Price" class="form-control">
                    </div>

                    <div class="div_deg">
                        <label>Room Type</label>
                        <select name="type" class="form-control">
                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Free Wifi</label>
                        <select name="wifi" class="form-control">
                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="div_deg">
                        <input type="submit" value="Add Room" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')

</body>
</html>
