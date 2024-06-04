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
      <h1>Category Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Model Edit</li>
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
    <section class="section">
      <div class="row">
         <div class="col-lg-10">
              <div class="card c-shadow">
                  <div class="card-body">
                      
                      <form action='{{ route('categorymodel-update') }}' method="post" class="row g-3 needs-validation" novalidate>
                          @csrf
                          <input type="text" name="id" value="{{ $categorymodel->id }}">
                       
                          
                            <div class="col-md-6 ">
                              <label for="categorytype_id" class="form-label">Sub-Category Name</label>
                              <select class="form-select" name="categorytype_id" id="categorytype_id" required>
                                  <option selected disabled value="">Choose...</option>
                                  @foreach ($categorytypes as $item)
                                      <option {{ $categorymodel->categorytype_id == $item->id?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                              </select>
                            </div> 
                            <div class="col-md-6 ">
                              <label for="name" class="form-label formsrow">Model Name</label>
                              <input type="text" value="{{ $categorymodel->name }}"  class="form-control formsrow" name ="name" id="name"  required>
                            </div> 
                            <div class="col-md-6"></div>
                            Description
                            <div class="col-md-12 ">
                           
                              <textarea name="description" id="description" cols="60" rows="5">{{ $categorymodel->description }}</textarea>
                             
                            </div> 
                          </div>
                          

                          <div class="col-12">
                              <button class="btn btn-success mybutton" type="submit">Update</button>
                             

                              <button class="btn btn-info mybutton"><a href="{{ route('category-model-view') }}"> Return</a></button>
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