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
                        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Appointment List

                            <span><a class="btn btn-primary btn-sm float-end" href="">Add Doctor</a> </span>



                        </h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $key => $appointment)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $appointment->fullname }}</td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->phone }}</td>
                                    <td>{{ $appointment->selectdoctor }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->message }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>
                                        <a title="approve" id="approve" class="btn btn-success"
                                            href="{{ 'approve/' . $appointment->id }}"><i class="fa fa-check "></i>
                                        </a>

                                        <a title="delete" id="delete" class="btn btn-danger"
                                            href="{{ 'cancel/' . $appointment->id }}"><i class="fa fa-trash"></i>
                                        </a>

                                         <a title="send_mail" id="send_mail" class="btn btn-primary"
                                            href="{{ url('email_view', $appointment->id) }}" ><i class="fa fa-envelope "></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="d-felx justify-content-center">

                        {{ $doctors->links() }}

                    </div> --}}
                </div>


            </div>
        </div>


        <!-- container-scroller -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
