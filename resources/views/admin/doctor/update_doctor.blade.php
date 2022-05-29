<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                        <li class="breadcrumb-item active" aria-current="page">Update Doctor</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Doctor List
                            <a class="btn btn-primary btn-sm float-end" href="{{ url('view_doctor') }}">Back</a>
                        </h3>
                    </div>
                </div>

                <div class="addDoctorForm col-md-8" style="margin:0 auto;">
                    <h1 class="text-center">Update Doctor</h1>
                    <form action="editdoctor" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{ $doctors->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $doctors->name }}" class="form-control text-dark"
                                id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" value="{{ $doctors->email }}"
                                class="form-control  text-dark" id="email">
                        </div>
                        <div class="form-group">
                            <label for="number">Phone</label>
                            <input type="number" name="phone" value="{{ $doctors->phone }}"
                                class="form-control  text-dark" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" name="speciality" value="{{ $doctors->speciality }}"
                                class="form-control  text-dark" id="speciality">

                        </div>

                        <div class="form-group">
                            <label for="room">Room</label>
                            <input type="text" name="room" value="{{ $doctors->room }}"
                                class="form-control  text-dark" id="room">
                        </div>


                        <div class="row">

                            <div class="form-group col">
                                <input type="file" name="image" class="form-control-file " id="image" class="file-upload-default">
                            </div>

                            <div class="form-group col">
                                <label for="oldimage">Old Image</label>
                                 <img src="uploads/doctors/{{ $doctors->image }}" width="80px" height="80px" alt="">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>

                </div>

            </div>
        </div>


        <!-- container-scroller -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
