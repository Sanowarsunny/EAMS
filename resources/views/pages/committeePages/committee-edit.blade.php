<!-- ======= Head ======= -->
@include('admin.inc.head')
<!-- ======= Head ======= -->
<body>

<!-- ======= Header ======= -->
@include('admin.inc.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
{{-- @include('admin.inc.sidebar') --}}
<!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle">
      <h5>Committee Dashboard</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Committee </li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    
    @if(session('message'))
      <script>
        Swal.fire({
        icon: "Success",
        title: "Wow...",
        text: "You updated succssfully!",
       
        })
      </script>
    @endif
    <section class="section">
      <div class="row">
         <div class="col-lg-10">
              <div class="card c-shadow">
                  <div class="card-body">
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                        @endif

                      <form action='{{ route('committee_update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="hidden" name="id" value="{{ $Managincommittee->id }}">
                         
                        
                          <div class="row mt-5">
                            <h5>Update information</h5>
                            <hr>
                            <div class="col-md-3 m-0"><label for="name" class="form-label">Member Name/নাম </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $Managincommittee->name }}" class="form-control my-border" name ="name" id="name"  required></div>
                            <div class="col-md-4 m-0"></div>
          
                            <div class="col-md-3 m-0"><label for="address" class="form-label formsrow">Address/ঠিকানা  </label></div>
                            <div class="col-md-9 m-0"><input type="text" value="{{ $Managincommittee->address }}" class="form-control my-border formsrow" name ="address" id="address"  required></div>
                            
                            <div class="col-md-3"> <label for="contctNo" class="form-label formsrow">contctNo/যোগাযোগ</label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Managincommittee->contctNo }}" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  required></div>
                            <div class="col-md-4"></div>
          
                            <div class="col-md-3"> <label for="position" class="form-label formsrow">Position/পদবি</label></div> 
                            <div class="col-md-5"><input type="text" value="{{ $Managincommittee->position }}" class="form-control my-border formsrow" name ="position" id="position"  required></div>
                            <div class="col-md-4"></div>
          
                            <div class="col-md-3"> <label for="duration" class="form-label formsrow">Duration/সময়কাল</label></div>
                            <div class="col-md-5"> <input type="text" value="{{ $Managincommittee->duration }}" class="form-control my-border formsrow" name ="duration" id="duration"  required></div>
                            <div class="col-md-4"></div>
                          </div>


                          
                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                              <button class="btn btn-secondary mybutton"><a href="{{ route('CommitteeView') }}"> Return</a></button>
                          
                            </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </section>

</main>
  <!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.inc.footer')
<!-- End Footer -->

  

</body>
  <!-- Template Main JS File -->
  <script src="{{ asset("admin/assets/js/main.js")}}"></script>
</html>