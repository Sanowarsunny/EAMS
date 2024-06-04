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
      <h5>Committee Dashboard</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Committee Member's List</li>
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
                      <th scope="col">ContactNO/যোগাযোগ</th>
                      <th scope="col">Position/পদবি</th>
                      <th scope="col">Duration/সময়কাল</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Managincommittee as $result)
                        <tr>
                             {{-- <th class="text-center" scope="row">{{  $loop->iteration }}</th> --}}
                          <td>{{ $result->id }}</td>
                          <td>{{ $result->name }}</td>
                          <td>{{ $result->contctNo }}</td>
                          <td>{{ $result->position }}</td>
                          <td>{{ $result->duration }}</td>
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