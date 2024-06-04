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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Company Edit</li>
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
                      
                      <form action='{{ route('company_update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="hidden" name="id" value="{{ $company->id }}">
                          {{-- <div class="col-md-6 ">
                              <label for="validationTooltip01" class="form-label formsrow">company Name</label>
                              <input type="text" value="{{ $company->name }}"  class="form-control formsrow" name ="name" id="validationTooltip01"  required>
                          </div>
                           --}}
                          <div class="row mt-4">
                            <div class="col-md-3 "><label for="name" class="form-label formsrow">Company Name</label></div>
                            <div class="col-md-9 "> <input type="text" value="{{ $company->name }}" class="form-control my-border formsrow" name ="name" id="name"  required></div>
        
                            <div class="col-md-3 "><label for="address" class="form-label formsrow "><p>Company Address</p></label></div>
                            <div class="col-md-9 "> <input type="text" value="{{ $company->address }}" class="form-control my-border formsrow" name ="address" id="address"  required></div>
        
                            <div class="col-md-3 "><label for="contctNo" class="form-label formsrow"><p>contctNo</p></label></div>
                            <div class="col-md-3 "> <input type="text" value="{{ $company->contctNo }}" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  required></div>
                            <div class="col-md-6 "></div>
        
                            <div class="col-md-3 "><label for="business" class="form-label formsrow"><p>Company Business</p></label></div>
                            <div class="col-md-9 "> <input type="text" value="{{ $company->business }}" class="form-control my-border formsrow" name ="business" id="business"  required></div>
        
                           
                          </div>






                          <div class="col-md-3">
                              <label for="validationTooltip04" class="form-label formsrow">Status</label>
                              <select class="form-select " name="status" id="validationTooltip04" required>
                              <option selected disabled value="">Choose...</option>
                              <option {{ $company->status=='Active'?'selected':'' }} value="Active">Active</option>
                              <option {{ $company->status=='Inactive'?'selected':'' }}  value="Inactive">Inactive</option>
                              </select>
                          </div>
                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                              

                              <button class="btn btn-info mybutton"><a href="{{ route('company_View') }}"> Return</a></button>
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