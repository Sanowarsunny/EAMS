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
      <h1>Workshop Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Workshop Edit</li>
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
                      <form action='{{ route('workshop-update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                            <input type="hidden" name="id" value="{{ $workshop->id }}">
                            <div class="row mt-5">
                              <div class="col-3 text-end">
                                <label for="name" class="form-label formsrow">Workshop Name</label>
                              </div>
                              <div class="col-6">
                                <input type="text" value="{{ $workshop->name }}"  class="form-control formsrow" name ="name" id="name"  required>
                              </div>
                              <div class="col-3"></div>
                              <div class="col-3 text-end">
                                <label for="address" class="form-label formsrow">Address</label>
                              </div>
                              <div class="col-9">
                                <input type="text" value="{{ $workshop->address }}"  class="form-control formsrow" name ="address" id="address"  required>
                              </div>


                              <div class="col-3  text-end">
                                <label for="contact_no" class="form-label formsrow">Contact No</label>
                              </div>
                              <div class="col-6 text-end">
                                <input type="text" value="{{ $workshop->contact_no }}" class="form-control formsrow" name ="contact_no" id="contact_no"  required>
                              </div>
                              
                              <div class="col-3"></div>

                            </div>
                          </div>
                         
                          <div class="col-12">
                            <div class="row mb-3">
                              <div class="col-3"></div>
                              <div class="col-5">
                                <button class="btn btn-success mybutton" type="submit">Update</button>
                             
                                <button class="btn btn-info mybutton"><a href="{{ route('workshop-view') }}"> Return</a></button>
                                </div>
                              <div class="col-4"></div>
                            </div>
                              
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