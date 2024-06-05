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
                    <li class="breadcrumb-item active">Asset Purchase Order create</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        @if(session('message'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Wow...",
                text: "Successfully Completed!",
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

                            <form action="{{ route('assetPurchaseOrdermst-store') }}" method="post" class="needs-validation" novalidate>
                                @csrf
                                <!-- Purchase Order Master Fields -->
                                <div class="card p-3" style="border: 1px solid black; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                                  <h4>Purchase Order Master</h4>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group row mt-3">
                                              <label for="po_gen_id" class="col-sm-3 col-form-label text-end">PO Gen ID</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="po_gen_id" id="po_gen_id" readonly>
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="currency" class="col-sm-3 col-form-label text-end">Currency <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                <select class="form-select" name="currency" id="currency" required>
                                                    <option selected disabled value="">Currency</option>
                                                    @foreach ($currencies as $item)
                                                        <option value="{{ $item->id }}">{{ $item->shortname }}</option>
                                                    @endforeach
                                                </select>  
                                                {{-- <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" required> --}}
                                              </div>
                                          </div>
                                          
                                          {{-- <div class="form-group row mt-3">
                                              <label for="status" class="col-sm-3 col-form-label text-end">Status <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                  <select class="form-control" name="status" id="status" required>
                                                      <option value="active">Active</option>
                                                      <option value="inactive">Inactive</option>
                                                  </select>
                                              </div>
                                          </div> --}}
                                          <div class="form-group row mt-3">
                                              <label for="LC_no" class="col-sm-3 col-form-label text-end">LC No</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="LC_no" id="LC_no" placeholder="LC No">
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="LC_date" class="col-sm-3 col-form-label text-end">LC Date</label>
                                              <div class="col-sm-9">
                                                  <input type="date" class="form-control" name="LC_date" id="LC_date">
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="col-md-6">

                                        


                                            <div class="form-group row mt-3">
                                                <label for="approver" class="col-sm-3 col-form-label text-end">Approver <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="approver" id="approver" placeholder="Approver" required>
                                                </div>
                                            </div>
                                          <div class="form-group row mt-3">
                                            <label for="workshop_id" class="col-sm-3 col-form-label text-end">Workshop Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="workshop_id" id="workshop_id" required>
                                                    <option selected disabled value="">Work Shop Name</option>
                                                    @foreach ($workShopName as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="number" class="form-control" name="workshop_id" id="workshop_id" placeholder="Workshop ID" required> --}}
                                            </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="supplier_id" class="col-sm-3 col-form-label text-end">Supplier Name <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                <select class="form-select" name="supplier_id" id="supplier_id" required>
                                                    <option selected disabled value="">Suppiler Name</option>
                                                    @foreach ($suppilerName as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>  
                                                {{-- <input type="number" class="form-control" name="supplier_id" id="supplier_id" placeholder="Supplier ID" required> --}}
                                              </div>
                                          </div>
                                          {{-- <div class="form-group row mt-3">
                                              <label for="company_id" class="col-sm-3 col-form-label text-end">Company Name <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ Auth::user()->company_name }}" readonly>
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="user_id" class="col-sm-3 col-form-label text-end">User Name</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="user_name" id="user_name" value="{{ Auth::user()->name }}" readonly>
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="updated_by" class="col-sm-3 col-form-label text-end">Updated By</label>
                                              <div class="col-sm-9">
                                                <input type="text" class="form-control" name="user_name" id="user_name" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                          </div> --}}
                                      </div>
                                  </div>
                                </div>

                                <!-- Asset Item PO Details Fields -->
                                <div class="card p-1 mt-2" style="border: 1px solid black; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                                    <h4>Asset Item PO Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Category Model Name</th>
                                                    <th>Brand Name</th>
                                                    <th>Unit Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Unit Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="detailRows">
                                                <tr>
                                                    <td>
                                                        <select class="form-select" name="categorymodel_id[]" id="categorymodel_id" required>
                                                            <option selected disabled value="">Category Model Name</option>
                                                            @foreach ($categoryName as $model)
                                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="brand_id[]" id="brand_id" required>
                                                            <option selected disabled value="">Choose Brand Name</option>
                                                            @foreach ($brandName as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="number" class="form-control" name="unit_price[]" id="unit_price" placeholder="Unit Price" required></td>
                                                    <td><input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity" required></td>
                                                    <td><input type="number" class="form-control" name="total_amount[]" id="total_amount" placeholder="Total Amount" readonly></td>
                                                    <td>
                                                        <select class="form-select" name="uom_id[]" id="uom_id" required>
                                                            <option selected disabled value="">Choose UOM</option>
                                                            @foreach ($uoms as $uom)
                                                                <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                                                    <td><input type="text" class="form-control" id="grandTotal" readonly></td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    {{-- <!-- Grand Total Display -->
                                    <div class="text-end mt-3">
                                        <strong>Grand Total: <span id="grandTotal"></span></strong>
                                    </div> --}}
                                    <div class="text-center mt-3">
                                        <button type="button" class="btn btn-success" id="addRow">Add Row</button>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 text-center">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- List Section --}}

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
                                        @if(in_array($purchaseOrder->status, ['pending', 'inactive']))
                                            <a href="{{ route('assetPurchaseOrder-edit', $purchaseOrder->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @endif
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
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const poGenIdInput = document.getElementById('po_gen_id');
            const generatePoGenId = () => {
                const date = new Date();
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const uniqueNumber = Math.floor(1000 + Math.random() * 9000);
                return `PO${year}${month}${day}${uniqueNumber}`;
            };
            poGenIdInput.value = generatePoGenId();

            function calculateTotalAmount(unitPrice, quantity) {
                return unitPrice * quantity;
            }

            // Add row functionality
            document.getElementById('addRow').addEventListener('click', () => {
                const detailRows = document.getElementById('detailRows');
                const newRow = detailRows.children[0].cloneNode(true);
                newRow.querySelectorAll('input, select').forEach(input => input.value = '');
                detailRows.appendChild(newRow);

                updateGrandTotal();
            });

            // Remove row functionality
            document.addEventListener('click', (event) => {
                if (event.target.classList.contains('removeRow')) {
                    event.target.closest('tr').remove();
                    updateGrandTotal();
                }
            });

            // Remove row functionality
            document.addEventListener('click', (event) => {
                if (event.target.classList.contains('removeRow')) {
                    event.target.closest('tr').remove();
                    updateGrandTotal();
                }
            });

            // Update the grand total
            function updateGrandTotal() {
                const rows = document.querySelectorAll('#detailRows tr');
                let grandTotal = 0;

                rows.forEach(row => {
                    const unitPrice = parseFloat(row.querySelector('[name="unit_price[]"]').value);
                    const quantity = parseFloat(row.querySelector('[name="quantity[]"]').value);
                    if (!isNaN(unitPrice) && !isNaN(quantity)) {
                        const totalAmount = calculateTotalAmount(unitPrice, quantity);
                        row.querySelector('[name="total_amount[]"]').value = totalAmount;
                        grandTotal += totalAmount;
                    }
                });

                document.getElementById('grandTotal').value = grandTotal.toFixed(2);
            }

            // Update total on input change
            document.addEventListener('input', (event) => {
                if (event.target.matches('[name="unit_price[]"], [name="quantity[]"]')) {
                    updateGrandTotal();
                }
            });

            // Initial update
            updateGrandTotal();
        });
    </script>

</body>

