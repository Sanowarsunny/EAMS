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
      <h1>Company Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Company create</li>
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
            
            <form action='{{ route('company_store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
               
                <div class="col-md-12 mt-4"> 
                  <h5>Company Registration here!</h5>
                  <div class="row">
                    <div class="col-md-3 "><label for="name" class="form-label formsrow">Company Name</label></div>
                    <div class="col-md-9 "> <input type="text" placeholder="Company name" class="form-control my-border formsrow" name ="name" id="name"  required></div>

                    <div class="col-md-3 "><label for="address" class="form-label formsrow "><p>Company Address</p></label></div>
                    <div class="col-md-9 "> <input type="text" placeholder="Company Address" class="form-control my-border formsrow" name ="address" id="address"  required></div>

                    <div class="col-md-3 "><label for="contctNo" class="form-label formsrow"><p>contctNo</p></label></div>
                    <div class="col-md-3 "> <input type="text" placeholder="contctNo" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  required></div>
                    <div class="col-md-6 "></div>

                    <div class="col-md-3 "><label for="business" class="form-label formsrow"><p>Company Business</p></label></div>
                    <div class="col-md-9 "> <input type="text" placeholder="Company Business" class="form-control my-border formsrow" name ="business" id="business"  required></div>

                    <div class="col-md-3 "><label for="logo" class="form-label formsrow">Upload Logo</label></div>
                    <div class="col-md-6 "> <input type="file" placeholder="Company logo" class="form-control formsrow" name ="logo" id="logo"  required></div>
                  </div>

                </div>
                
                <div class="col-12">
                    <button class="btn btn-secondary mybutton" type="submit">Save</button>
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
              <h5 class="card-title">Company List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">

                    <th scope="col">id</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Business</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($company as $result)
                      <tr>
                        <td>{{  $result->id }}</td>
                        <td>{{  $result->name }}</td>
                        <td>{{  $result->address }}</td>
                        <td>{{  $result->contctNo }}</td>
                        <td>{{  $result->business }}</td>
                        <td>{{  $result->status }}</td>
                          <td class="text-center">
                              <a href="{{ route('company_edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>

                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('company-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                              
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