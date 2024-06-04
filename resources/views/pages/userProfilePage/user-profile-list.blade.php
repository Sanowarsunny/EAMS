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
      <h5>User-Profile & Role Management : Company</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">User List & Role</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    
  
    <section class="section">
      <div class="row">
          <div class="col-lg-12">
            <div class="card c-shadow">
              <div class="card-body mt-2">
               
  
                <!-- Table with stripped rows -->
                <table id="datatable" class="table table-striped table-bordered datatable">
                  <thead>
                    <tr class="text-center bg-dark text-light">
                      <th scope="col">id</th>
                      <th scope="col">Name/নাম</th>
                      <th scope="col">email</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">User Role</th>
                      <th scope="col">status</th>
                      <th scope="col">Action</th>
              

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($UserProfile as $result)
                        <tr>
                             {{-- <th class="text-center" scope="row">{{  $loop->iteration }}</th> --}}
                             <td>{{ $result->id }}</td>
                             <td>{{ $result->name }}</td>
                             <td>{{ $result->email }}</td>
                             <td>{{ $result->company_name }}</td>
                             <td>{{ $result->rollmanage->name }}</td>
                             <td>{{ $result->status }}</td>
                             <td class="text-center">
                              <a href="{{ route('user-edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                              
                            
                              {{-- <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('member-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">..Delete</a>
                               --}}
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


