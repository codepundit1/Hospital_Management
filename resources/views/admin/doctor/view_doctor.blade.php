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
                            Doctor List

                            <span><a class="btn btn-primary btn-sm float-end" href="{{ url('add_doctor') }}">Add Doctor</a> </span>



                        </h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Room</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $key => $doctor)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->speciality }}</td>
                                    <td>{{ $doctor->room }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/doctors/'. $doctor->image) }}" width="80px" height="80px" alt="">
                                    </td>

                                    <td >
                                        <a title="edit" id="edit" class="btn btn-primary"
                                            href="{{ url('edit-doctor', $doctor->id) }}" ><i class="fa fa-edit "></i>
                                        </a>



                                        <a title="delete" id="delete" class="btn btn-danger"
                                            href="{{ 'delete_doctor/' . $doctor->id }}" onclick="return confirm('Are You Want Sure to Delete ?')"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-felx justify-content-center">

                        {{ $doctors->links() }}

                    </div>
                </div>


            </div>
        </div>


        <!-- container-scroller -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

