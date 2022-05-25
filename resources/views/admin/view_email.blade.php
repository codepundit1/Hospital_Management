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
                        Send Mail

                        <span><a class="btn btn-primary btn-sm float-end" href="{{ url('view_appointment') }}">Back</a> </span>

                    </h3>
                </div>
            </div>
            <div class="addDoctorForm col-md-8" style="margin:0 auto;" >
                <h1 class="text-center">Mail Form</h1>
                <form action="{{ route('send_mail', $appointments->id) }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="greeting">Greeting</label>
                        <input type="text" name="greeting" class="form-control" id="greeting" required>
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" name="body" class="form-control" id="body" required>
                    </div>
                    <div class="form-group">
                        <label for="actiontext">Action Text</label>
                        <input type="text" name="actiontext" class="form-control" id="actiontext" required>
                    </div>
                    <div class="form-group">
                        <label for="actionurl">Action Url</label>
                        <input type="text" name="actionurl" class="form-control" id="actionurl" required>
                    </div>
                    <div class="form-group">
                        <label for="endpart">End Part</label>
                        <input type="text" name="endpart" class="form-control" id="endpart" required>
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
