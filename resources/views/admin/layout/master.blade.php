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
      <h1><span style="color: red; font-weight:bold">W</span>elcome Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
          
        </ol>
      </nav>
    </div>
    
    
    <hr>
   
  <h5>System Overview</h5>  
  <h6>Enterprise Asset Management System (EAMS)</h6>	
	
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 mt-3">
        <div class="card h-100">
          <div class="card-head mt-3 text-center"><h6>Module Name : SetUp	</h6></div>
          <div class="card-body text-center"><h6>Functionalities</h6> 
            <hr>
            <ul class="text-start"> 
              <ol>Company Setup</ol>
              <ol>Company Branch/ Work location Setup</ol>
              <ol>System user</ol>
              <ol>Modules</ol>
              <ol>Calling Object/Form </ol>
              <ol>Role Create </ol>
              <ol>Role & Object </ol>
              <ol>Role Assign to User</ol>
              <ol>Employees Registration</ol>
              <ol>Global Brand</ol>
              <ol>Asset Category</ol>
              <ol>Asset Sub-Category(Type)</ol>
              <ol>Asset Category Model</ol>
              <ol>Asset Create (combination of Brand,Category ,type & detail)</ol>
              <ol>Spare parts</ol>
              <ol>Unit of Measure (UOM)</ol>
              <ol>Services: Inhouse/Outdoor</ol>
              <ol>Maintenance stats: Received/WIP/Done/Delivered</ol>
              <ol>Maintenance type : schedule/preventive/runtime</ol>
              
              <ol>Workshop Create</ol>
              <ol>Supplier Registration</ol>
              <ol>Currency </ol>
              <ol>Fuel Type</ol>
              <ol>Meter Title (associate with actual asset)</ol> 
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <div class="card h-100">
          <div class="card-head mt-3 text-center"><h6>Module Name : Inventory & Pruchasing	</h6></div>
          <div class="card-body text-center"><h6>Functionalities</h6> 
            <hr>
            <ul class="text-start">             
              <ol>Asset Request Creation(End-to-End or any particular area or eployeers)</ol>
              <ol>Asset Request Approval by Supervisior</ol>
              <ol>Asset Request Approval by Management ( If required)</ol>
              <ol>Generate  Internal Requision (IR) or Purchase Requision (PR)</ol>
              <ol>Approval IR/PR</ol>
              <ol>Forward to Supplier</ol>
              <ol>GRN (Full/partial)</ol>
              <ol>Asset verification & Numbering</ol>
              <ol>Asset move to End-to-End(wearhouse, location,employee)</ol>
              <ol>Received Delivery Asset</ol>
              <ol>Return To Wearhouse(Store)</ol>
              <ol>Payment against Purchase Order</ol>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <div class="card h-100">
          <div class="card-head mt-3 text-center   p-2   "><h6>Module Name : Maintenance Workbench	</h6></div>
          <div class="card-body text-center"><h6>Functionalities</h6> 
            <hr>
            <ul class="text-start">             
              
              <ol>Maintenance Asset selection and Assign to maintenance</ol>
              <ol>Clinical History  : efficiency rate % (before & after maintenance )</ol>
              <ol>Maintenance Work Order Create</ol>
              <ol>Maintenance Work Order Approve by supervisor</ol>
              <ol>Failor Identification and cary forward</ol>
              <ol>Operation select Against Maintenance asset</ol>
              <ol>Material/Spare Parts on Maintenance asset</ol>
              <ol>Note on FireWork/Emergencies impact</ol>
              <ol>Fuel consumtion </ol>
              <ol>Standard Operations</ol>   
              <ol>Maintenance Activites Group</ol>
              <ol>Maintenance Activites details</ol>

            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 mt-3">
        <div class="card h-100">
          <div class="card-head mt-3 text-center   p-2   "><h6>Maintenance Stats	</h6></div>
          <div class="card-body text-center"><h6>Functionalities</h6> 
            <hr>
            <ul class="text-start">             
              
              <ol>Maintenance Asset selection and Assign to maintenance</ol>
              <ol>Routine Maintenance</ol>
              <ol>Schedule Maintenance </ol>
              <ol>Preventive Maintenance</ol>
            </ul>

            <div class="card-head mt-3 text-center   p-2   "><h6>Sale or Dispose Asset	</h6></div>
          <div class="card-body text-center"><h6>Functionalities</h6> 
            <hr>
            <ul class="text-start">             
              <ol>Select Asset for selling and make proposal</ol>
              <ol>Approve Proposal by Supervisior</ol>
              <ol>Management approval</ol>
              <ol> Delivery Challan </ol>
            </ul>
          </div>
        </div>
      </div> 
    </div>

    <div class="col-md-6 mt-3">
      <div class="card h-100">
        <div class="card-head mt-3 text-center"><h6>Module Name : Maintenance Log/Reports	</h6></div>
        <div class="card-body text-center"><h6>Functionalities</h6> 
          <hr>
          <ul class="text-start"> 
            <ol>Maintenance History on specific asset</ol>
            <ol>Spare Part consumed  on specific asset</ol>
            <ol>Date-to-date maintenece history</ol>
            <ol>Date-to-date spare parts consumed</ol>
            <ol>Mechanics performance </ol>
            <ol>Pending workbench Details</ol>
            <ol>Fule Consumtion date-to-date</ol>
            <ol>Fule Consumtion on asset</ol>
            <ol>Sales Or Disposal Reports</ol>

          </ul>
        </div>
      </div>
    </div>
  </div>
	
 
  

</main>
  <!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.inc.footer')
<!-- End Footer -->

  

</body>
  <!-- Template Main JS File -->
  <script src="{{ asset("admin/assets/js/main.js")}}"></script>
</html>