<style>
    button.btn.btn-primary.me-2 {
    background-color: #00d9a5;
    }

    button.btn.btn-primary.me-2:hover {
    background-color: #6c6c6c;
    }
</style>

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>


      <form action="{{ route('apointments') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="fullname" class="form-control" placeholder="Full name">
          </div>


          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" name="email" class="form-control" placeholder="Email address">
          </div>


          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>


          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="selectdoctor" id="selectdoctor" class="custom-select">
            <option>--Select Doctor--</option>
             @foreach ($doctors as $doctor )
             <option value="{{ $doctor->name }}">{{ $doctor->name }}  (Specialist In {{ $doctor->speciality }})</option>
             @endforeach
            </select>
          </div>


          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
          </div>


          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message"></textarea>
          </div>
        </div>

          <div class="col-12 text-center mt-4 wow zoomIn">
            <button type="submit" class="btn btn-primary me-2">Submit</button>
          </div>
      </form>
    </div>
  </div> <!-- .page-section -->
