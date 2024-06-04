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
          <li class="breadcrumb-item active">Manage Committee </li>
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
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action='{{ route('committee_store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                {{-- <div class="col-md-5">
                    <label for="">Company Name</label>
                    <select  name="company_id" class="form-control bg-success">
                        <option value="">-- Select Company --</option>
                        @foreach ($company as $data)
                        <option value="{{$data->id}}">{{$data->name}}
                        </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="row mt-5">
                  <h5>Entry information</h5>
                            <hr>
                  <div class="col-md-3 m-0"><label for="name" class="form-label formsrow">Member Name/নাম </label></div>
                  <div class="col-md-5 m-0"><input type="text" placeholder="Member name" class="form-control my-border formsrow" name ="name" id="name"  required></div>
                  <div class="col-md-4 m-0"></div>

                  <div class="col-md-3 m-0"><label for="address" class="form-label formsrow">Address/ঠিকানা  </label></div>
                  <div class="col-md-9 m-0"><input type="text" placeholder="Address name" class="form-control my-border formsrow" name ="address" id="address"  required></div>
                  
                  <div class="col-md-3"> <label for="contctNo" class="form-label formsrow">contctNo/যোগাযোগ</label></div>
                  <div class="col-md-5"><input type="text" placeholder="contctNo" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  required></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="position" class="form-label formsrow">Position/পদবি</label></div>
                  <div class="col-md-5"><input type="text" placeholder="position" class="form-control my-border formsrow" name ="position" id="position"  required></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="duration" class="form-label formsrow">Duration/সময়কাল</label></div>
                  <div class="col-md-5"> <input type="text" placeholder="duration" class="form-control my-border formsrow" name ="duration" id="duration"  required></div>
                  <div class="col-md-4"></div>
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
              <h5 class="card-title">Committee Member List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">
                    <th scope="col">id</th>
                    <th scope="col">Name/নাম</th>
                    <th scope="col">ContactNO/যোগাযোগ</th>
                    <th scope="col">Position/পদবি</th>
                    <th scope="col">Duration/সময়কাল</th>
                    <th scope="col">Actions</th>
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

                          <td class="text-center">
                              <a href="{{ route('committee_edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                              
                              
                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('committee-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                              
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