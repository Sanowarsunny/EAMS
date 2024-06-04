<!-- ======= Head ======= -->
@include('admin.inc.head')
<!-- ======= Head ======= -->
<body>

<!-- ======= Header ======= -->
@include('admin.inc.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('admin.inc.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Brand create</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->


    @if(session('message'))
      <script>
        Swal.fire({
        icon: "Success",
        title: "Wow...",
        text: "Succssfully Completed!",
       
        })
      </script>
    @endif

  <section class="section">
    <div class="row">
      <div class="col-lg-10">
        <div class="card c-shadow">
          <div class="card-body">
            
            <form action='{{ route('brand_store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                
                <div class="col-md-5 ">
                    <label for="validationTooltip01" class="form-label formsrow">Brand Name</label>
                    <input type="text" placeholder="Brand name" class="form-control formsrow" name ="name" id="validationTooltip01"  required>
                </div>
                
                <div class="col-12">
                    <button class="btn btn-primary mybutton" type="submit">Save</button>
                </div>
            </form>
            

          </div>
        </div>
      </div>
    </div>
  </section>
    
  {{-- @foreach ($roleaccess as $result)
    <i class="fa fa-step-forward" aria-hidden="true"></i>  <span style="font-family:'Times New Roman'"><a href="{{$result->manageobject->description }}">{{$result->manageobject->name }}</a><br> </span>
  @endforeach --}}

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
          <div class="card c-shadow">
            <div class="card-body">
              <h5 class="card-title">Brand List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">

                    <th scope="col">Sl#</th>
                    <th scope="col">id</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($brand as $result)
                      <tr>
                          <th class="text-center" scope="row">{{  $loop->iteration }}</th>
                          <td>{{  $result->id }}</td>
                          <td>{{  $result->name }}</td>

                          <td>{{  $result->created_at }}</td>
                          <td class="text-center">
                              <a href="{{ route('brand_edit',$result->id) }}"><span class="badge rounded-pill text-bg-success">Edit</span></a>
  
                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('brand-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                              
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <div class="pages">
              </div>
            </div>
      </div>
    </div>
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                      
  <!-- bootstrap5 dataTables js cdn -->
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#datatable').DataTable();
    });
  </script>

</main>
  <!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.inc.footer')
<!-- End Footer -->

  

</body>
  <!-- Template Main JS File -->
  <script src="{{ asset("admin/assets/js/main.js")}}"></script>
</html>