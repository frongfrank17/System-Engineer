<script>
  var username = sessionStorage.getItem("username");
  var Role = sessionStorage.getItem("Role");
  if (typeof (Storage) !== "undefined") {
  ่
  var Role = sessionStorage.getItem("Role");
    if (Role) {
      console.log(Role); 
    } else {
      console.log("No username found."); /
    }
  } else {
    console.error("Browser does not support sessionStorage.");
  }

</script>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3"> </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>PROCESS</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Report Screens:</h6>
        <a class="collapse-item" href="dashboard.php">Dashboard</a>
        <a class="collapse-item" href="process.php">Process</a>
        <a class="collapse-item" href="servicestatus.php">Service</a>
        <a class="collapse-item" href="link.php">Link</a>

        <!-- <a class="collapse-item" href="addfood.php">FOOD</a>
        <a class="collapse-item" href="addcafe.php">CAFE</a> -->
      </div>
    </div>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <script>
    var Role = sessionStorage.getItem("Role");


    if (Role === 'ADMIN') { // เช็คว่าค่าของ username เท่ากับ 'admin' หรือไม่
      // ถ้าเป็น 'admin' ให้แสดงเมนู MANAGE
      document.write('<li class="nav-item">');
      document.write('<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">');
      document.write('<i class="fas fa-fw fa-users"></i>');
      document.write('<span>MANAGE</span>');
      document.write('</a>');
      document.write('<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">');
      document.write('<div class="bg-white py-2 collapse-inner rounded">');
      document.write('<h6 class="collapse-header">Login Screens:</h6>');
      document.write('<a class="collapse-item" href="register.php">Register</a>');
      document.write('<a class="collapse-item" href="inputprocess.php">Process</a>');
      document.write('<a class="collapse-item" href="inputservice.php">Service</a>');
      document.write('<a class="collapse-item" href="inputlogo.php">Logo</a>');
      document.write('<div class="collapse-divider"></div>');
      document.write('</div>');
      document.write('</div>');
      document.write('</li>');
    } else {

    }
  </script>





  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-users"></i>
      <span>MANAGE</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="register.php">Register</a>
        <a class="collapse-item" href="inputprocess.php">Process</a>
        <a class="collapse-item" href="inputservice.php">Service</a>
        <a class="collapse-item" href="inputlogo.php">Logo</a>
        <div class="collapse-divider"></div>
      </div>
    </div>
  </li> -->




  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>



</ul>