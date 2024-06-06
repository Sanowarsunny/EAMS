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
      <h1>Asset Purchase Order Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Asset Purchase Order List</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    
    <section class="section">
      <div class="row">
          <div class="col-lg-12">
            <div class="card c-shadow">
              <div class="card-body">
                <h5 class="card-title">Asset Purchase Order List</h5>
  
                <!-- Table with stripped rows -->
                <table id="datatable" class="table table-striped table-bordered datatable">
                  <thead>
                    <tr class="text-center bg-dark text-light">
  
                      {{-- <th scope="col">Sl#</th>
                      <th scope="col">id</th> --}}
                      <th scope="col">Serial No</th>
                      <th scope="col">Po Gen ID</th>
                      <th scope="col">Approver Name</th>
                      <th scope="col">WorkShop Name</th>
                      <th scope="col">Suppiler Name</th>
                      <th scope="col">Total Item</th>
                      <th scope="col">Total Amount</th>
                      <th scope="col">Status</th>
                      <th scope="col">Creator</th>
                     
                      <th scope="col">Actions</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($purchaseOrders as $purchaseOrder)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $purchaseOrder->po_gen_id }}</td>
                            <td>{{ $purchaseOrder->approver }}</td>
                            <td>{{ $purchaseOrder->workshop->name }}</td>
                            <td>{{ $purchaseOrder->supplier->name }}</td>
                            <td>{{ $purchaseOrder->details->count() }}</td>
                            <td>{{ $purchaseOrder->details->sum('total_amount') }}</td>
                            <td>{{ ucfirst($purchaseOrder->status) }}</td>
                            <td>{{ $purchaseOrder->user->name }}</td>
                            <td class="text-center">
                                <!-- Add your action buttons here -->
                                <a href="{{ route('assetPurchaseOrder-edit', $purchaseOrder->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('assetPurchaseOrder-destroy', $purchaseOrder->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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