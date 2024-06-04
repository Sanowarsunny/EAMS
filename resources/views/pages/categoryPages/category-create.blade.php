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
          <li class="breadcrumb-item active">Category create</li>
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
            
            <form action='{{ route('category_store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
               
                <div class="col-md-5 ">
                    <label for="validationTooltip01" class="form-label formsrow">Category Name</label>
                    <input type="text" placeholder="Category name" class="form-control formsrow" name ="name" id="validationTooltip01"  required>
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
    

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
          <div class="card c-shadow">
            <div class="card-body">
              <h5 class="card-title">Category List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">

                    <th scope="col">Sl#</th>
                    <th scope="col">id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($category as $result)
                      <tr>
                          <th class="text-center" scope="row">{{  $loop->iteration }}</th>
                          <td>{{  $result->id }}</td>
                          <td>{{  $result->name }}</td>
                          <td>{{  $result->status }}</td>
                          <td>{{  $result->created_at }}</td>
                          <td class="text-center">
                              <a href="{{ route('category_edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                              
                              {{-- <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('category_delete',$result->id) }}"><span  class="badge rounded-pill text-bg-danger">Delete</span></a> --}}

                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('category-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                              
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