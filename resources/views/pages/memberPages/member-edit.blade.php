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
      <div style="font-family: 'Gill Sans'; font-size:20px; ">Employee's Dashboard</div>
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Manage Employee </li>
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
    <section class="section" style="font-family: 'Courier New', Courier, monospace">
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

                      <form action='{{ route('member-update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="hidden" name="id" value="{{ $Member->id }}">
                         
                        
                          {{-- <div class="row mt-5">
                            <h5>Update information</h5>
                            <hr>
                            <div class="col-md-3 m-0"><label for="name" class="form-label formsrow">Member Name/নাম </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $Member->name }}" class="form-control my-border formsrow" name ="name" id="name"  required></div>
                            <div class="col-md-4 m-0"></div>
          
                            <div class="col-md-3 m-0"><label for="fatherName" class="form-label formsrow">Father's Name/পিতার নাম  </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $Member->fatherName }}" class="form-control my-border formsrow" name ="fatherName" id="fatherName"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3 m-0"><label for="motherName" class="form-label formsrow">Mother's Name/মায়ের নাম  </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $Member->motherName }}" class="form-control my-border formsrow" name ="motherName" id="motherName"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3"> <label for="nid" class="form-label text-danger formsrow">NID</label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Member->nid }}" class="form-control my-border formsrow" name ="nid" id="nid"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3"> <label for="roadNO" class="form-label formsrow">Word NO/ওয়ার্ড নং </label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Member->roadNO }}" class="form-control my-border formsrow" name ="wordNO" id="wordNO"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3"> <label for="roadNO" class="form-label formsrow">Road NO/রাস্তা নং</label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Member->roadNO }}" class="form-control my-border formsrow" name ="roadNO" id="roadNO"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3"> <label for="houseNO" class="form-label formsrow">House NO/বাড়ির নম্বর</label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Member->houseNO }}" class="form-control my-border formsrow" name ="houseNO" id="houseNO"  ></div>
                            <div class="col-md-4"></div>


                            <div class="col-md-3"> <label for="contctNo" class="form-label text-danger formsrow">contctNo/যোগাযোগ</label></div>
                            <div class="col-md-5"><input type="text" value="{{ $Member->contctNo }}" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  ></div>
                            <div class="col-md-4"></div>

                            <div class="col-md-3"> <label for="permanentAddress" class="form-label formsrow">Permanent Address/স্থায়ী ঠিকানা</label></div>
                            <div class="col-md-9"><input type="text" value="{{ $Member->permanentAddress }}" class="form-control my-border formsrow" name ="permanentAddress" id="permanentAddress"  ></div>
                          
                            <div class="col-md-3"> <label for="status" class="form-label">Status</label></div>
                            <div class="col-md-5">
                              <select class="form-select" name="status" id="status" >
                                <option selected disabled value="">Choose...</option>
                                <option {{ $Member->status=='Active'?'selected':'' }} value="Active">Active</option>
                                <option {{ $Member->status=='Inactive'?'selected':'' }}  value="Inactive">Inactive</option>
                              </select>
                            </div>
                            <div class="col-md-4"></div>

                          </div> --}}

                          <div class="col-6 mt-3 m-0 p-0">
                            <div class="card  h-100">
                              <h6 class="text-center mt-3">Basic information</h6><hr>
                              <div class="row ">
                                <div class="col-md-3  m-0 text-end ">
                                  <label for="name" class="form-label text-danger formsrow "> Full Name </label></div>
                                <div class="col-md-9 m-0 text-end">
                                  <input type="text" value="{{ $Member->name }}" class="form-control my-border formsrow" name ="name" id="name">
                                </div>
      
                                <div class="col-md-3  m-0 text-end ">
                                  <label for="nickname" class="form-label text-danger formsrow "> NickName </label></div>
                                <div class="col-md-9 m-0 text-end">
                                  <input type="text" value="{{ $Member->nickname }}" class="form-control my-border formsrow" name ="nickname" id="nickname">
                                </div>
                                
                                <div class="col-md-3 text-end"><label for="fatherName" class="form-label formsrow">Father</label></div>
                                <div class="col-md-9 m-0">
                                  <input type="text" value="{{ $Member->fatherName }}" class="form-control my-border formsrow" name ="fatherName" id="fatherName" >
                                </div>
      
                                <div class="col-md-3 m-0 text-end"><label for="motherName" class="form-label formsrow">Mother</label></div>
                                <div class="col-md-9 m-0"><input type="text" value="{{ $Member->motherName }}" class="form-control my-border formsrow" name ="motherName" id="motherName"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="nid" class="form-label text-danger formsrow">NID</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->nid }}" class="form-control my-border formsrow" name ="nid" id="nid"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="citizenship" class="form-label text-danger formsrow">Citizenship</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->citizenship }}" class="form-control my-border formsrow" name ="citizenship" id="citizenship"  ></div>
                                
                                <div class="col-md-3 m-0 text-end"> <label for="date_of_birth" class="form-label text-danger formsrow">DOB</label></div>
                                <div class="col-md-9"><input type="date" value="{{ $Member->date_of_birth }}" class="form-control my-border formsrow" name ="date_of_birth" id="date_of_birth"  ></div>
                                
      
                                <div class="col-md-3 m-0 text-end"> <label for="wordNO" class="form-label formsrow">Word NO</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->wordNO }}" class="form-control my-border formsrow" name ="wordNO" id="wordNO"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="roadNO" class="form-label formsrow">Road NO</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->roadNO }}" class="form-control my-border formsrow" name ="roadNO" id="roadNO"  ></div>
                                
                                <div class="col-md-3 m-0 text-end"> <label for="houseNO" class="form-label formsrow">House NO</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->houseNO }}" class="form-control my-border formsrow" name ="houseNO" id="houseNO"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="contctNo" class="form-label text-danger formsrow">contctNo</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->contctNo }}" class="form-control my-border formsrow" name ="contctNo" id="contctNo"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="permanentAddress" class="form-label formsrow">Permanent Address</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->permanentAddress }}" class="form-control my-border formsrow" name ="permanentAddress" id="permanentAddress"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="education" class="form-label formsrow">Education</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->education }}" class="form-control my-border formsrow" name ="education" id="education"  ></div>
      
                                
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
                          
                          <div class="col-6 mt-3 m-0 p-0">
                            <div class="card h-100">
                              <h6 class="text-center mt-3">Joining information</h6><hr>
                              <div class="row">
                                <div class="col-md-3  m-0 text-end ">
                                  <label for="joining_date" class="form-label text-danger formsrow "> Joining </label></div>
                                <div class="col-md-9 m-0 text-end">
                                  <input type="date" value="{{ $Member->joining_date }}" class="form-control my-border formsrow" name ="joining_date" id="joining_date">
                                </div>
      
                                <div class="col-md-3 text-end"><label for="department" class="form-label formsrow">Department</label></div>
                                <div class="col-md-9 m-0">
                                  <input type="text" value="{{ $Member->department }}" class="form-control my-border formsrow" name ="department" id="department" >
                                </div>
      
                                <div class="col-md-3 m-0 text-end"><label for="designation" class="form-label formsrow">Designation</label></div>
                                <div class="col-md-9 m-0"><input type="text" value="{{ $Member->designation }}" class="form-control my-border formsrow" name ="designation" id="designation"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="section" class="form-label text-danger formsrow">Section</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->section }}" class="form-control my-border formsrow" name ="section" id="section"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="grade" class="form-label formsrow">Grade</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->grade }}" class="form-control my-border formsrow" name ="grade" id="grade"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="job_location" class="form-label formsrow">Location</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->job_location }}" class="form-control my-border formsrow" name ="job_location" id="job_location"  ></div>
                                
                                <div class="col-md-3 m-0 text-end"> <label for="holyday" class="form-label formsrow">Holyday</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->holyday }}" class="form-control my-border formsrow" name ="holyday" id="holyday"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="salary" class="form-label text-danger formsrow">Salary</label></div>
                                <div class="col-md-9"><input type="number" value="{{ $Member->salary }}" class="form-control my-border formsrow" name ="salary" id="salary"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="currency" class="form-label formsrow">Currency</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->currency }}" class="form-control my-border formsrow" name ="currency" id="currency"  ></div>
      
                                
                                <div class="col-md-3 m-0 text-end"> <label for="bank_acc_no" class="form-label formsrow">Bank AC</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->bank_acc_no }}" class="form-control my-border formsrow" name ="bank_acc_no" id="bank_acc_no"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="bank_name" class="form-label formsrow">BankName</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->bank_name }}" class="form-control my-border formsrow" name ="bank_name" id="bank_name"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="reference" class="form-label formsrow">Reference</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->reference }}" class="form-control my-border formsrow" name ="reference" id="reference"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="experiences" class="form-label formsrow">Experiences</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->experiences }}" class="form-control my-border formsrow" name ="experiences" id="experiences"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="skills" class="form-label formsrow">Skills</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->skills }}" class="form-control my-border formsrow" name ="skills" id="skills"  ></div>
      
                                <div class="col-md-3 m-0 text-end"> <label for="awarded" class="form-label formsrow">Awarded</label></div>
                                <div class="col-md-9"><input type="text" value="{{ $Member->awarded }}" class="form-control my-border formsrow" name ="awarded" id="awarded"  ></div>
                            </div>
                          </div>

                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                              <button class="btn btn-info mybutton"><a href="{{ route('member-view') }}"> Return</a></button>
                             
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