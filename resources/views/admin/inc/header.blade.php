<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset("admin/assets/img/fivestarslogo.jpg")}}" alt="">
        <span class="d-none d-lg-block">Five<span style="font-weight: 900;color:red; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">St</span>ars Tech</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

<h4 class="text-center">{{ Auth::user()->company_name }}</h4>
  

    <nav class="header-nav ms-auto ">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        
       

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }} - {{ Auth::user()->rollmanage->name }} -{{ Auth::user()->rollmanage_id }} </span>
          </a><!-- End Profile Iamge Icon -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <i class="fa fa-sign-out"></i> <span style="font-family:'Times New Roman' ">
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out & Registration') }}
            </x-responsive-nav-link>
          </form>
        </li>

        
    </nav><!-- End Icons Navigation -->

  </header>