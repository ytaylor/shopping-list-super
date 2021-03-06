<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shopping List</title>

  <link  rel="icon"   href="img/favicon.png" type="image/png" />


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Shopping List</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Gestión
      </div>

      <!-- Elementos a gestionar -->

       <!-- Nav Item - Lista de la compra -->
    <li class="nav-item">
      <a class="nav-link" href="ListasCompra.php">
        <i class="fas fa-tasks"></i>
        <span>Listas de la Compra</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ListaProductos.php">
        <i class="fas fa-tasks"></i>
        <span>Listas de Productos</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="AgregarListaCompra.php">
        <i class="fas fa-tasks"></i>
        <span>Guardar Lista</span></a>
    </li>

   

   
       <!-- Divider -->
       <hr class="sidebar-divider">
       <?php
    if(isset($_SESSION['rol'])){
      if($_SESSION['rol'] == "admin") {
          // Activo la pestaña de Productos para poder insertar, modificar, y eliminar
          echo ' <!-- Heading -->
          <div class="sidebar-heading">
            Administración
          </div>
    
          <!-- Nav Item - Productos -->
         <li class="nav-item">
          <a class="nav-link" href="Productos.php">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Productos</span></a>
        </li>
        
        <!-- Nav Item - Supermercado -->
        <li class="nav-item">
         <a class="nav-link" href="Supermercados.php">
           <i class="fas fa-store"></i>
           <span>Supermercados</span></a>
       </li>
        '
        
    
        
        ;
      }
    }
    ?>

       <!-- Divider -->
       <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

               <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                  </button>
                </form>
            
      
       <!-- Topbar Navbar -->
       <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']?></span>
              <img class="img-profile rounded-circle" src="img/user default.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ajustes
              </a>
           <!--   <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Salir
              </a>
            </div>
          </li>
        </ul>

    </nav>

    