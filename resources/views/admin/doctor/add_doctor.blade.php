<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">

            <div class="col-md-6 grid-margin stretch-card" style="margin:  0 auto ;">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('addDoctor') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="number">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="speciality">Speciality</label>
                                <select name="speciality" class="form-control bg-white" id="speciality" >
                                    <option>--Select--</option>
                                    <option value="heart">heart</option>
                                    <option value="eye">eye</option>
                                    <option value="nose">nose</option>
                                    <option value="skin">skin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room">Room</label>
                                <input type="text" name="room" class="form-control" id="room"
                                    placeholder="Room">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control " id="image" class="file-upload-default">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- container-scroller -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
