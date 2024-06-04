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
      <div style="font-family: 'Gill Sans'; font-size:20px; ">User Profile Dashboard : Company</div>
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">User Update </li>
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
                        
                      <form action='{{ route('userprofile-update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="text" name="id" value="{{ $user->id }}">
                         
                        
                          <div class="row mt-5">
                            <h5>Update information</h5>
                           
                            <hr>
                            <div class="col-md-3 m-0"><label for="name" class="form-label formsrow">User Name/নাম </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $user->name }}" class="form-control my-border formsrow" name ="name" id="name"  required></div>
                            <div class="col-md-4 m-0"></div>
          
                            <div class="col-md-3 m-0"><label for="email" class="form-label formsrow">Father's Name/পিতার নাম  </label></div>
                            <div class="col-md-5 m-0"><input type="text" value="{{ $user->email }}" class="form-control my-border formsrow" name ="email" id="fatherName"  ></div>
                            <div class="col-md-4"></div>

                            {{-- `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `company_id`, `company_name`, `user_type`, `status`, `picture` --}}

                            <div class="col-md-3"> <label for="company_name" class="form-label">Company</label></div>
                            <div class="col-md-5">
                              <select  name="company_name" class="form-control ">
                                <option value="{{ $user->company_name }}">{{ $user->company_name }}</option>
                                  @foreach ($companies as $data)
                                    <option value="{{$data->name}}">{{$data->name}}</option>
                                  @endforeach
                              </select> 
                            </div>
                            <div class="col-md-4"></div>
                          
                            <div class="col-md-3"> <label for="rollmanage_id" class="form-label">User Role Type</label></div>
                            <div class="col-md-5">
                                <select  name="rollmanage_id" class="form-control ">
                                  <option value="{{ $user->rollmanage->id }}">{{ $user->rollmanage->name }}</option>
                                    @foreach ($rollmanages as $data)
                                      <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select> 

                            </div>
                            <div class="col-md-4"></div>


                            <div class="col-md-3"> <label for="status" class="form-label">Status</label></div>
                            <div class="col-md-5">
                              <select class="form-select" name="status" id="status" >
                                <option selected disabled value="">Choose...</option>
                                <option {{ $user->status=='Active'?'selected':'' }} value="Active">Active</option>
                                <option {{ $user->status=='Inactive'?'selected':'' }}  value="Inactive">Inactive</option>
                              </select>
                            </div>
                            <div class="col-md-4"></div>

                          </div>

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


                          
                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                              <button class="btn btn-info mybutton"><a href="{{ route('user_profile') }}"> Return</a></button>
                             
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