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
      <h1>Category Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Category Model create</li>
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
            <form action='{{ route('store-category-model') }}' method="post" class="row g-3 needs-validation" novalidate>
                @csrf
               
                <div class="row mt-3">
                  <div class="col-3 mt-3 text-end">
                    <label for="name" class="form-label formsrow">Sub Category Name</label>
                  </div>
                  <div class="col-5 mt-3">
                    <select class="form-select "  name="categorytype_id" id="categorytype_id" required>
                      <option selected disabled value="">Choose SubCategory Name</option>
                      @foreach ($categorytypes as $result)
                          <option value="{{ $result->id }}">{{ $result->name }} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4"></div>
                  <div class="col-3 mt-3 text-end">
                    <label for="name" class="form-label formsrow">Model Name</label>
                  </div>
                  <div class="col-5 mt-3 text-end">
                    <input type="text" placeholder="Model name" class="form-control formsrow" name ="name" id="name"  required>
                  </div>
                  <div class="col-4"></div>
                  <div class="col-3 mt-3 text-end">
                    <label for="description" class="form-label formsrow">Description</label>
                  </div>
                  <div class="col-9 mt-3 ">
                    <textarea id="description" placeholder="description" name="description" rows="5" cols="60" required> </textarea>
                      
                    
                  </div>
                </div>

               

                
                
                <div class="col-12">
                  <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"><button class="btn btn-primary " type="submit">Save</button></div>
                  </div>
                    
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
              <h5 class="card-title">Category Model List</h5>

              <!-- Table with stripped rows -->
              <table id="datatable" class="table table-striped table-bordered datatable">
                <thead>
                  <tr class="text-center bg-dark text-light">

                    <th scope="col">Sl#</th>
                    <th scope="col">id</th>
                    <th scope="col">categorytype_id</th>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Model Name</th>
                    <th scope="col">Description</th>
                   
                    <th scope="col">Actions</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($categorymodel as $result)
                      <tr>
                          <th class="text-center" scope="row">{{  $loop->iteration }}</th>
                          <td>{{  $result->id }}</td>
                          <td>{{  $result->categorytype_id }}</td>
                          <td>{{  $result->categorytype->name }}</td>
                          <td>{{  $result->name }}</td>
                          <td>{{  $result->description }}</td>
                         
                          <td class="text-center">
                              <a href="{{ route('categorymodel_edit',$result->id) }}"><span class="badge rounded-pill text-bg-warning">Edit</span></a>
                              
                           
                              <a onclick="return confirm('Are you sure to delete ?')" href="{{ url('categorymodel-delete/'.$result->id) }}" class="badge rounded-pill text-bg-danger">Delete</a>
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