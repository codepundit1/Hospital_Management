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


        <div class="container-fluid mt-5 ">
            <div class="flash mt-4">
                @include('flash::message')
               </div>
            <div class="row mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Add Doctor

                            <span><a class="btn btn-primary btn-sm float-end" href="{{ url('view_doctor') }}">Back</a> </span>

                        </h3>
                    </div>
                </div>
                <div class="addDoctorForm col-md-8" style="margin:0 auto; padding:20px;" >
                    <h1 class="text-center">Add Doctor Form</h1>
                    <form  action="{{ route('addDoctor') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" autocomplete="">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                             @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                             @endif
                        </div>
                        <div class="form-group">
                            <label for="number">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone"
                                placeholder="Phone">

                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                             @endif
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
                            <input type="text" name="room" class="form-control" id="room" required
                                placeholder="Room">
                        </div>

                        <div class="form-group">

                            <input type="file" name="image" class="form-control-file " id="image" class="file-upload-default" required>

                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>

                    </form>

                </div>


            </div>
        </div>

        <!-- container-scroller -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
