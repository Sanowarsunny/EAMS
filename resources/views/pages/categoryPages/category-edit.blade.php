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
          <li class="breadcrumb-item active">Category Edit</li>
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
                      
                      <form action='{{ route('category_update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="hidden" name="id" value="{{ $category->id }}">
                          <div class="col-md-6 ">
                              <label for="validationTooltip01" class="form-label formsrow">Category Name</label>
                              <input type="text" value="{{ $category->name }}"  class="form-control formsrow" name ="category" id="validationTooltip01"  required>
                          </div>
                         
                          <div class="col-md-3">
                              <label for="validationTooltip04" class="form-label">Status</label>
                              <select class="form-select" name="status" id="validationTooltip04" required>
                              <option selected disabled value="">Choose...</option>
                              <option {{ $category->status=='Active'?'selected':'' }} value="Active">Active</option>
                              <option {{ $category->status=='Inactive'?'selected':'' }}  value="Inactive">Inactive</option>
                              </select>
                          </div>
                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                             

                              <button class="btn btn-info mybutton"><a href="{{ route('CategoryPageView') }}"> Return</a></button>
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