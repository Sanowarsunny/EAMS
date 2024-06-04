<aside id="sidebar" class="sidebar" >

    <ul class="sidebar-nav" id="sidebar-nav">
      <div class="bg-secondary text-light p-0">

        <h4  class="text-center">Menus</h4>
      </div>

      <table id="" class="table table-striped table-bordered ">
       
        <tbody>
         
        </tbody>
      </table>

      <a class="nav-link collapsed" data-bs-target="#cateslist-nav" data-bs-toggle="collapse" href="{{ route('dashboard') }}">
        <i class="fa fa-home"></i><span style="font-family:'Times New Roman'">Home</span>
      </a>
         

    
      <hr>
      @foreach ($roleaccess as $result)
      <i class="fa fa-step-forward" aria-hidden="true"></i>  <span style="font-family:'Times New Roman'"><a href="{{$result->manageobject->description }}">{{$result->manageobject->name }}</a><br> </span>
      @endforeach
 
      

    </ul>


    
  </aside>
 