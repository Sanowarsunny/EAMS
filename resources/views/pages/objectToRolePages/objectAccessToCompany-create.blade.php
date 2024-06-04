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
      <h1>Object Access To Company : System admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Object Access To Company</li>
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

    @if(session('alert'))
      <script>
        Swal.fire({
        icon: "Success",
        title: "Ops ...",
        text: "Please choose a Company!",
       
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
            <form action='{{ route('objectAccessToCompany_store') }}' method="post" class="row g-3 needs-validation" novalidate>
             
              @csrf
              <div class="row mt-5">
                <div class="col-md-2 text-bold">Access For</div>
                <div class="col-md-9">
                  <select class="form-select " name="company_id" id="company_id" required>
                    <option selected disabled value="">Choose Company</option>
                    @foreach ($compayname as $result)
                        <option value="{{ $result->id }}">{{ $result->name }} </option>
                    @endforeach
                  </select>
                </div>
               
              </div>
              
              <table id="" class="table table-striped table-bordered ">
                <thead>
                  <tr  style="width: 20px;">
                    <th scope="col" >Object Name</th>
                  </tr>
                </thead>
                <tbody>
                      <tr>
                          <td class=" text-dark" style="width: 40px;">
                            @foreach($checkboxItems as $checkboxItem)
                            <input type="checkbox" name="manageobject_id[]" value="{{ $checkboxItem->id }}">  {{ $checkboxItem->name }}<br>
                            @endforeach
                          </td>
                      </tr>
                </tbody>
              </table>

              <div class="col-12">
                <button class="btn btn-success" type="submit">Save</button>
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
            <div class="card-body mt-2">
             

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">
                    <th scope="col">Company Name</th>
                    <th scope="col">Object Name</th>
                    <th scope="col">id</th>
                 
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $access_to_company as $result)
                      <tr>
                        <td>{{ $result->company_name }}</td>
                        <td>{{ $result->object_name }}</td>
                        <td>{{ $result->id }}</td>
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
  
  {{-- <section class="section">
    <div class="row">
        <div class="col-lg-12">
          <div class="card c-shadow">
            <div class="card-body mt-2">
             

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">
                    <th scope="col">id</th>
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">manageobject_id</th>
                    <th scope="col">Object Name</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($access as $result)
                      <tr>
                           
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->user_id }}</td>
                        <td>{{ $result->user->name }}</td>
                        <td>{{ $result->manageobject_id }}</td>
                        <td>
                          <a href="#">{{$result->manageobject->name }}</a>
                        </td>
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
   --}}
  
  
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