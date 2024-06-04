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
      <h5>Employee's Dashboard</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Employee's Dashboard </li>
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


            {{-- <ul class="nav nav-tabs mt-3">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{route('member-view')}}">Basic Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('member-view-joining') }}">Joining Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('member-view-skills') }}">Experiences, Skill & Rewarded</a>
              </li>
             
            </ul> --}}



            
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
                
                <div class="row mt-3">
                  <input type="hidden" class="form-control my-border formsrow" value="{{$companyid[0]->id }}"  name ="company_id" id="company_id"  >
                    <div class="col-6  m-0 p-0">
                      <div class="card  h-100">
                        <h6 class="text-center mt-3">Basic information</h6><hr>
                        <div class="row ">
                          <div class="col-md-3  m-0 text-end ">
                            <label for="name" class="form-label text-danger formsrow "> Full Name </label></div>
                          <div class="col-md-9 m-0 text-end">
                            <input type="text" placeholder="Member name" class="form-control my-border formsrow" name ="name" id="name">
                          </div>

                          <div class="col-md-3  m-0 text-end ">
                            <label for="nickname" class="form-label text-danger formsrow "> NickName </label></div>
                          <div class="col-md-9 m-0 text-end">
                            <input type="text" placeholder="Nickname" class="form-control my-border formsrow" name ="nickname" id="nickname">
                          </div>
                          
                          <div class="col-md-3 text-end"><label for="fatherName" class="form-label formsrow">Father</label></div>
                          <div class="col-md-9 m-0">
                            <input type="text" placeholder="fatherName" class="form-control my-border formsrow" name ="fatherName" id="fatherName" >
                          </div>

                          <div class="col-md-3 m-0 text-end"><label for="motherName" class="form-label formsrow">Mother</label></div>
                          <div class="col-md-9 m-0"><input type="text" placeholder="motherName" class="form-control my-border formsrow" name ="motherName" id="motherName"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="nid" class="form-label text-danger formsrow">NID</label></div>
                          <div class="col-md-9"><input type="text" placeholder="nid" class="form-control my-border formsrow" name ="nid" id="nid"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="citizenship" class="form-label text-danger formsrow">Citizenship</label></div>
                          <div class="col-md-9"><input type="text" placeholder="citizenship" class="form-control my-border formsrow" name ="citizenship" id="citizenship"  ></div>
                          
                          <div class="col-md-3 m-0 text-end"> <label for="date_of_birth" class="form-label text-danger formsrow">DOB</label></div>
                          <div class="col-md-9"><input type="date" placeholder="date_of_birth" class="form-control my-border formsrow" name ="date_of_birth" id="date_of_birth"  ></div>
                          

                          <div class="col-md-3 m-0 text-end"> <label for="wordNO" class="form-label formsrow">Word NO</label></div>
                          <div class="col-md-9"><input type="text" placeholder="wordNO" class="form-control my-border formsrow" name ="wordNO" id="wordNO"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="roadNO" class="form-label formsrow">Road NO</label></div>
                          <div class="col-md-9"><input type="text" placeholder="roadNO" class="form-control my-border formsrow" name ="roadNO" id="roadNO"  ></div>
                          
                          <div class="col-md-3 m-0 text-end"> <label for="houseNO" class="form-label formsrow">House NO</label></div>
                          <div class="col-md-9"><input type="text" placeholder="houseNO" class="form-control my-border formsrow" name ="houseNO" id="houseNO"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="contctNo" class="form-label text-danger formsrow">contctNo</label></div>
                          <div class="col-md-9"><input type="text" placeholder="contctNo" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="permanentAddress" class="form-label formsrow">Permanent Address</label></div>
                          <div class="col-md-9"><input type="text" placeholder="permanentAddress" class="form-control my-border formsrow" name ="permanentAddress" id="permanentAddress"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="education" class="form-label formsrow">Education</label></div>
                          <div class="col-md-9"><input type="text" placeholder="education" class="form-control my-border formsrow" name ="education" id="education"  ></div>

                          
                        <div class="col-md-3 m-0 text-end"> <label for="status" class="form-label">Status</label></div>
                        <div class="col-md-9">
                          <select name="status" id="status">
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                          </select>
                        </div>
                        </div>

                      </div>
                    </div>
                  
                    <div class="col-6 m-0 p-0">
                      <div class="card h-100">
                        <h6 class="text-center mt-3">Joining information</h6><hr>
                        <div class="row">
                          <div class="col-md-3  m-0 text-end ">
                            <label for="joining_date" class="form-label text-danger formsrow "> Joining </label></div>
                          <div class="col-md-9 m-0 text-end">
                            <input type="date" placeholder="joining_date" class="form-control my-border formsrow" name ="joining_date" id="joining_date">
                          </div>

                          <div class="col-md-3 text-end"><label for="department" class="form-label formsrow">Department</label></div>
                          <div class="col-md-9 m-0">
                            <input type="text" placeholder="department" class="form-control my-border formsrow" name ="department" id="department" >
                          </div>

                          <div class="col-md-3 m-0 text-end"><label for="designation" class="form-label formsrow">Designation</label></div>
                          <div class="col-md-9 m-0"><input type="text" placeholder="designation" class="form-control my-border formsrow" name ="designation" id="designation"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="section" class="form-label text-danger formsrow">Section</label></div>
                          <div class="col-md-9"><input type="text" placeholder="section" class="form-control my-border formsrow" name ="section" id="section"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="grade" class="form-label formsrow">Grade</label></div>
                          <div class="col-md-9"><input type="text" placeholder="grade" class="form-control my-border formsrow" name ="grade" id="grade"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="job_location" class="form-label formsrow">Location</label></div>
                          <div class="col-md-9"><input type="text" placeholder="job_location" class="form-control my-border formsrow" name ="job_location" id="job_location"  ></div>
                          
                          <div class="col-md-3 m-0 text-end"> <label for="holyday" class="form-label formsrow">Holyday</label></div>
                          <div class="col-md-9"><input type="text" placeholder="holyday" class="form-control my-border formsrow" name ="holyday" id="holyday"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="salary" class="form-label text-danger formsrow">Salary</label></div>
                          <div class="col-md-9"><input type="text" placeholder="salary" class="form-control my-border formsrow" name ="salary" id="salary"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="currency" class="form-label formsrow">Currency</label></div>
                          <div class="col-md-9"><input type="text" placeholder="currency" class="form-control my-border formsrow" name ="currency" id="currency"  ></div>

                          
                          <div class="col-md-3 m-0 text-end"> <label for="bank_acc_no" class="form-label formsrow">Bank AC</label></div>
                          <div class="col-md-9"><input type="text" placeholder="bank_acc_no" class="form-control my-border formsrow" name ="bank_acc_no" id="bank_acc_no"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="bank_name" class="form-label formsrow">BankName</label></div>
                          <div class="col-md-9"><input type="text" placeholder="bank_name" class="form-control my-border formsrow" name ="bank_name" id="bank_name"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="reference" class="form-label formsrow">Reference</label></div>
                          <div class="col-md-9"><input type="text" placeholder="reference" class="form-control my-border formsrow" name ="reference" id="reference"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="experiences" class="form-label formsrow">Experiences</label></div>
                          <div class="col-md-9"><input type="text" placeholder="experiences" class="form-control my-border formsrow" name ="experiences" id="experiences"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="skills" class="form-label formsrow">Skills</label></div>
                          <div class="col-md-9"><input type="text" placeholder="skills" class="form-control my-border formsrow" name ="skills" id="skills"  ></div>

                          <div class="col-md-3 m-0 text-end"> <label for="awarded" class="form-label formsrow">Awarded</label></div>
                          <div class="col-md-9"><input type="text" placeholder="awarded" class="form-control my-border formsrow" name ="awarded" id="awarded"  ></div>
                      </div>
                    </div>
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