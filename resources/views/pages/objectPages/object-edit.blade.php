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
      <h1>Object Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Object Update</li>
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
                      <form action='{{ route('object_update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="hidden" name="id" value="{{ $Manageobject->id }}">
                          <div class="col-md-5 ">
                              <label for="validationTooltip01" class="form-label">Object Name</label>
                              <input type="text" value="{{ $Manageobject->name }}"  class="form-control formsrow" name ="name" id="name"  required>
                          </div>
                         
                          <div class="col-md-5 ">
                            <label for="validationTooltip01" class="form-label">Object URL</label>
                            <input type="text" value="{{ $Manageobject->description }}"  class="form-control formsrow" name ="description" id="description"  required>
                          </div>

                          


                          <div class="col-md-3">
                           
                            <h6 class="">Module set in : {{ $Manageobject->module }}</h6>
                            
                            <select class="form-select" name="module" id="module" required>
                              <option selected disabled value="">Choose...</option>
                              @foreach ($modulelist as $item)
                                  <option {{ $Manageobject->id == $item->name?'selected':'' }} value="{{ $item->name }}">{{ $item->name }}</option>
                              @endforeach
                          </select>
                        </div>

                          <div class="col-md-3">
                              <label for="status" class="form-label">Status</label>
                              <select class="form-select " name="status" id="status" required>
                              <option selected disabled value="">Choose...</option>
                              <option {{ $Manageobject->status=='Active'?'selected':'' }} value="Active">Active</option>
                              <option {{ $Manageobject->status=='Inactive'?'selected':'' }}  value="Inactive">Inactive</option>
                              </select>
                          </div>
                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                              
                              <button class="btn btn-info mybutton"><a href="{{ route('object-view') }}"> Return</a></button>
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