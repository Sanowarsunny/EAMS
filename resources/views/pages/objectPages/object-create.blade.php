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
      <h1>Object Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          <li class="breadcrumb-item active">Object Create</li>
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
            
            <form action='{{ route('object_store') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="row mt-5">
                  <div class="col-md-2 ">
                    <label for="name" class="form-label formsrow">Object Name</label>
                  </div>
                  <div class="col-md-6 ">
                    <input type="text" placeholder="Object name" class="form-control formsrow" name ="name" id="name"  required>
                  </div>
                  <div class="col-md-4"></div>

                  <div class="col-md-2 ">
                    <label for="description" class="form-label formsrow">Object URL</label>
                  </div>
                  <div class="col-md-6 ">
                    <input type="text" placeholder="Object URL" class="form-control formsrow" name ="description" id="description"  required>
                  </div>
                  <div class="col-md-4"></div>

                  <div class="col-md-2 ">
                    <label for="description" class="form-label formsrow">Module</label>
                  </div>
                  <div class="col-md-6 ">
                    <select class="form-select " name="module" id="module" required>
                      <option selected disabled value="">Choose Module Name</option>
                      @foreach ($modulelist as $result)
                          <option value="{{ $result->name }}">{{ $result->name }} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4"></div>

                  

                </div>
                

              <div class="col-2">
                  
              </div>
                <div class="col-8">
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
              <h5 class="card-title">Object List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">

                    <th scope="col">Sl#</th>
                      <th scope="col">id</th>
                      <th scope="col">Object Name</th>
                      <th scope="col">Object URL</th>
                      <th scope="col">Module</th>
                      <th scope="col">Status</th>
                      
                      <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($Manageobject as $result)
                      <tr>
                          <th class="text-center" scope="row">{{  $loop->iteration }}</th>
                          <td>{{  $result->id }}</td>
                          <td>{{  $result->name }}</td>
                          <td>{{  $result->description }}</td>
                          <td>{{  $result->module }}</td>
                          <td>{{  $result->status }}</td>
                         
                          <td class="text-center">
                              <a href="{{ route('object_edit',$result->id) }}"><span class="badge rounded-pill text-dark">Edit</span></a>
                            
                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('manageobject-delete/'.$result->id) }}" class="badge rounded-pill text-danger">Delete</a>
                              
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