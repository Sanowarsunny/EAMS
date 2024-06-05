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
            <h1>Edit Asset Purchase Order</h1>
            <!-- Add breadcrumb navigation if needed -->
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

                            <form action="" method="post" class="needs-validation" novalidate>
                                @csrf
                                <!-- Purchase Order Master Fields -->
                                <div class="card p-3" style="border: 1px solid black; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                                  <h4>Purchase Order Master</h4>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group row mt-3">
                                              <label for="po_gen_id" class="col-sm-3 col-form-label text-end">PO Gen ID</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="po_gen_id" id="po_gen_id" value="{{ $purchaseOrder->po_gen_id }}" readonly>
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="currency" class="col-sm-3 col-form-label text-end">Currency <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                <select class="form-select" name="currency" id="currency" required>
                                                    <option selected disabled value="">Currency</option>
                                                    @foreach ($currencies as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $purchaseOrder->currency ? 'selected' : '' }}>{{ $item->shortname }}</option>
                                                    @endforeach
                                                </select>  
                                              </div>
                                          </div>
                                          
                                          <div class="form-group row mt-3">
                                              <label for="LC_no" class="col-sm-3 col-form-label text-end">LC No</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="LC_no" id="LC_no" placeholder="LC No" value="{{ $purchaseOrder->LC_no }}">
                                              </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="LC_date" class="col-sm-3 col-form-label text-end">LC Date</label>
                                              <div class="col-sm-9">
                                                  <input type="date" class="form-control" name="LC_date" id="LC_date" value="{{ $purchaseOrder->LC_date }}">
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="col-md-6">

                                        


                                            <div class="form-group row mt-3">
                                                <label for="approver" class="col-sm-3 col-form-label text-end">Approver <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="approver" id="approver" placeholder="Approver" required value="{{ $purchaseOrder->approver }}">
                                                </div>
                                            </div>
                                          <div class="form-group row mt-3">
                                            <label for="workshop_id" class="col-sm-3 col-form-label text-end">Workshop Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="workshop_id" id="workshop_id" required>
                                                    <option selected disabled value="">Work Shop Name</option>
                                                    @foreach ($workShopName as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $purchaseOrder->workshop_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                              <label for="supplier_id" class="col-sm-3 col-form-label text-end">Supplier Name <span class="text-danger">*</span></label>
                                              <div class="col-sm-9">
                                                <select class="form-select" name="supplier_id" id="supplier_id" required>
                                                    <option selected disabled value="">Suppiler Name</option>
                                                    @foreach ($suppilerName as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $purchaseOrder->supplier_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>  
                                              </div>
                                          </div>
                                          
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
                                              @foreach ($purchaseOrder->details as $detail)
                                              <tr>
                                                  <td>
                                                      <select class="form-select" name="categorymodel_id[]" required>
                                                          <option selected disabled value="">Category Model Name</option>
                                                          @foreach ($categoryName as $model)
                                                              <option value="{{ $model->id }}" {{ $model->id == $detail->categorymodel_id ? 'selected' : '' }}>{{ $model->name }}</option>
                                                          @endforeach
                                                      </select>
                                                  </td>
                                                  <td>
                                                      <select class="form-select" name="brand_id[]" required>
                                                          <option selected disabled value="">Choose Brand Name</option>
                                                          @foreach ($brandName as $brand)
                                                              <option value="{{ $brand->id }}" {{ $brand->id == $detail->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                          @endforeach
                                                      </select>
                                                  </td>
                                                  <td><input type="number" class="form-control" name="unit_price[]" placeholder="Unit Price" value="{{ $detail->unit_price }}" required></td>
                                                  <td><input type="number" class="form-control" name="quantity[]" placeholder="Quantity" value="{{ $detail->quantity }}" required></td>
                                                  <td><input type="number" class="form-control" name="total_amount[]" placeholder="Total Amount" value="{{ $detail->total_amount }}" readonly></td>
                                                  <td>
                                                      <select class="form-select" name="uom_id[]" required>
                                                          <option selected disabled value="">Choose UOM</option>
                                                          @foreach ($uoms as $uom)
                                                              <option value="{{ $uom->id }}" {{ $uom->id == $detail->uom_id ? 'selected' : '' }}>{{ $uom->name }}</option>
                                                          @endforeach
                                                      </select>
                                                  </td>
                                                  <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
                                              </tr>
                                              @endforeach
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
                                  <div class="text-center mt-3">
                                      <button type="button" class="btn btn-success" id="addRow">Add Row</button>
                                  </div>
                                </div>

                                <!-- Save Button -->
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 text-center">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

</body>
