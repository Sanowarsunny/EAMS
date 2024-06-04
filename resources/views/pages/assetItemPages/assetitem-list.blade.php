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
      <h1>Asset Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Asset List</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    

    
  
    <section class="section">
      <div class="row">
          <div class="col-lg-12">
            <div class="card c-shadow">
              <div class="card-body">
                <h5 class="card-title">Asset List</h5>
  
                <!-- Table with stripped rows -->
                <table id="datatable" class="table table-striped table-bordered datatable">
                  <thead>
                    <tr class="text-center bg-dark text-light">
  
                     
                      <th scope="col">Asset No</th>
                      <th scope="col">Manufacture No</th>
                      <th scope="col">Reg No</th>
                      <th scope="col">Chassis No</th>
                      <th scope="col">Enginee No</th>
                      <th scope="col">Stock sts</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Model</th>
                      <th scope="col">Creator</th>
                     
                      <th scope="col">Actions</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($assetitem as $result)
                        <tr>
                            
                            <td>{{  $result->asset_no }}</td>
                            <td>{{  $result->manufacture_no }}</td>
                            <td>{{  $result->gov_registration_no }}</td>
                            <td>{{  $result->chassis_no }}</td>
                            <td>{{  $result->enginee_no }}</td>
                            <td>{{  $result->stock_sts }}</td>
                            <td>{{  $result->brand->name }}</td>
                            <td>{{  $result->categorymodel->name }}</td>
                            <td>{{  $result->user->name }}</td> 
                            <td class="text-center">
                                <a href="{{ route('asset-edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                                
                            
                                <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('asset-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                                
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