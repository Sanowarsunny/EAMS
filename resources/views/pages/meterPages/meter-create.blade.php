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
            <h1>Meter Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Meter create</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        @if (session('message'))
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
                            <form action='{{ route('meter-store') }}' method="post" class="row g-3 needs-validation"
                                novalidate>
                                @csrf

                                {{-- <input type="hidden" class="form-control my-border formsrow" value="1"
                                    name ="maintenance_asset_id" id="company_id"> --}}

                                <div class="row mt-5">

                                    <div class="col-3 text-end">
                                        <label for="name" class="form-label formsrow">Asset Number <span
                                                style="color:red">*</span></label>
                                    </div>

                                    <div class="col-5 text-end mb-2">

                                        <select class="form-select " name="assetitem_id" id="module" required>
                                            <option selected disabled value="">Choose Asset</option>
                                            @foreach ($assets as $asset)
                                                <option value="{{ $asset->id }}">{{ $asset->asset_no }} </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-4"></div>

                                    <div class="col-3 text-end">
                                        <label for="meter_no" class="form-label formsrow">Meter Number <span
                                                style="color:red">*</span></label>
                                    </div>
                                    <div class="col-5 text-end">
                                        <input type="text" placeholder="Meter Number" class="form-control formsrow"
                                            name ="meter_no" id="meter_no" required>
                                    </div>

                                    <div class="col-4"></div>

                                    <div class="col-3  text-end">
                                        <label for="address" class="form-label formsrow">Description<span
                                                style="color:red">*</span></label>
                                    </div>
                                    <div class="col-9 text-end">
                                        <input type="text" placeholder="description" class="form-control formsrow"
                                            name ="description" id="address" required>
                                    </div>

                                    <div class="col-4"></div>

                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6"><button class="btn btn-primary "
                                                type="submit">Save</button></div>
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
                            <h5 class="card-title">Meter List</h5>

                            <!-- Table with stripped rows -->
                            <table id="datatable" class="table table-striped table-bordered datatable">
                                <thead>
                                    <tr class="text-center bg-dark text-light">

                                        {{-- 
                                        <th scope="col">Sl#</th>
                                        <th scope="col">id</th> 
                                        --}}
                                        
                                        <th scope="col">Asset No</th>
                                        <th scope="col">Meter No</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meters as $result)
                                        <tr>
                                           
                                            <td>{{ $result->assetitem->asset_no }}</td>
                                            <td>{{ $result->meter_no }}</td>
                                            <td>{{ $result->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('meter-edit', $result->id) }}"><span
                                                        class="badge rounded-pill text-bg-warning">Edit</span></a>

                                                <a onclick="return confirm('Are you sure to delete ?')"
                                                    href="{{ url('meter-delete/' . $result->id) }}"
                                                    class="badge rounded-pill text-bg-danger">Delete</a>

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
            $(document).ready(function() {
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
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

</html>
