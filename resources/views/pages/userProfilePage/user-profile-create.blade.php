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
      <h5>Member's Dashboard</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Member </li>
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
            <form action='{{ route('member-store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                
                <div class="row mt-5">
                  <h5>Entry information</h5>
                    <hr>
                  <div class="col-md-3 m-0"><label for="name" class="form-label text-danger formsrow">Member Name/নাম </label></div>
                  <div class="col-md-5 m-0"><input type="text" placeholder="Member name" class="form-control my-border formsrow" name ="name" id="name"  ></div>
                  <div class="col-md-4 m-0"></div>

                  <div class="col-md-3 m-0"><label for="fatherName" class="form-label formsrow">Father's Name/পিতার নাম  </label></div>
                  <div class="col-md-5 m-0"><input type="text" placeholder="fatherName" class="form-control my-border formsrow" name ="fatherName" id="fatherName"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3 m-0"><label for="motherName" class="form-label formsrow">Mother's Name/মায়ের নাম  </label></div>
                  <div class="col-md-5 m-0"><input type="text" placeholder="motherName" class="form-control my-border formsrow" name ="motherName" id="motherName"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="nid" class="form-label text-danger formsrow">NID</label></div>
                  <div class="col-md-5"><input type="text" placeholder="nid" class="form-control my-border formsrow" name ="nid" id="nid"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="wordNO" class="form-label formsrow">Word NO/ওয়ার্ড নং </label></div>
                  <div class="col-md-5"><input type="text" placeholder="wordNO" class="form-control my-border formsrow" name ="wordNO" id="wordNO"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="roadNO" class="form-label formsrow">Road NO/রাস্তা নং</label></div>
                  <div class="col-md-5"><input type="text" placeholder="roadNO" class="form-control my-border formsrow" name ="roadNO" id="roadNO"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="houseNO" class="form-label formsrow">House NO/বাড়ির নম্বর</label></div>
                  <div class="col-md-5"><input type="text" placeholder="houseNO" class="form-control my-border formsrow" name ="houseNO" id="houseNO"  ></div>
                  <div class="col-md-4"></div>


                  <div class="col-md-3"> <label for="contctNo" class="form-label text-danger formsrow">contctNo/যোগাযোগ</label></div>
                  <div class="col-md-5"><input type="text" placeholder="contctNo" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  ></div>
                  <div class="col-md-4"></div>

                  <div class="col-md-3"> <label for="permanentAddress" class="form-label formsrow">Permanent Address/স্থায়ী ঠিকানা</label></div>
                  <div class="col-md-9"><input type="text" placeholder="permanentAddress" class="form-control my-border formsrow" name ="permanentAddress" id="permanentAddress"  ></div>
                 

                  <div class="col-md-3"> <label for="status" class="form-label">Status</label></div>
                  <div class="col-md-5">
                    <select name="status" id="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                  </div>
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
                    <th scope="col">NID</th>
                    <th scope="col">Word No</th>
                    <th scope="col">Road No</th>
                    <th scope="col">House No</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Per Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Member as $result)
                      <tr>
                          {{-- <th class="text-center" scope="row">{{  $loop->iteration }}</th> --}}
                          <td>{{ $result->id }}</td>
                          <td>{{ $result->name }}</td>
                          <td>{{ $result->nid }}</td>
                          <td>{{ $result->wordNO }}</td>
                          <td>{{ $result->roadNO }}</td>
                          <td>{{ $result->houseNO }}</td>
                          <td>{{ $result->contctNo }}</td>
                          <td>{{ $result->permanentAddress }}</td>
                          <td>{{ $result->status }}</td>
                          

                          <td class="text-center">
                              <a href="{{ route('member-edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                              
                              {{-- <a onclick="return confirm('Are you sure to delete ?')" href="{{ route('category_delete',$result->id) }}"><span  class="badge rounded-pill text-bg-danger">Delete</span></a> --}}

                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('member-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
                              
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