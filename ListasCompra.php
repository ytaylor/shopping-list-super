<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shopping List</title>
  <link  rel="icon"   href="img/favicon.png" type="image/png" />

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Shopping List</div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
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
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-tasks"></i>
          <span>Listas de la Compra</span></a>
      </li>
  
       <!-- Nav Item - Supermercado -->
       <li class="nav-item ">
        <a class="nav-link" href="Supermercados.php">
          <i class="fas fa-store"></i>
          <span>Supermercados</span></a>
      </li>
  
     
         <!-- Divider -->
         <hr class="sidebar-divider">
  
            <!-- Heading -->
        <div class="sidebar-heading">
          Administración
        </div>
  
        <!-- Nav Item - Productos -->
       <li class="nav-item">
        <a class="nav-link" href="Productos.php">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Productos</span></a>
      </li>
  
         
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
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

        <!-- Topbar Search -->
        <!--   <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        -->
 <!-- Topbar Navbar -->
 <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <!--  <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>-->
      <!-- Dropdown - Messages -->
     <!--   <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>-->

    <!-- Nav Item - Alerts -->
   <!--  <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>-->
        <!-- Counter - Alerts -->
    <!--    <span class="badge badge-danger badge-counter">3+</span>
      </a>-->
      <!-- Dropdown - Alerts -->
    <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Alerts Center
        </h6>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">December 12, 2019</div>
            <span class="font-weight-bold">A new monthly report is ready to download!</span>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">December 7, 2019</div>
            $290.29 has been deposited into your account!
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">December 2, 2019</div>
            Spending Alert: We've noticed unusually high spending for your account.
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
      </div>
    </li>-->

    <!-- Nav Item - Messages -->
   <!-- <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>-->
        <!-- Counter - Messages -->
      <!--  <span class="badge badge-danger badge-counter">7</span>
      </a> -->
      <!-- Dropdown - Messages -->
     <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
          Message Center
        </h6>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div class="font-weight-bold">
            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
            <div class="small text-gray-500">Emily Fowler · 58m</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
            <div class="status-indicator"></div>
          </div>
          <div>
            <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
            <div class="small text-gray-500">Jae Chun · 1d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
            <div class="status-indicator bg-warning"></div>
          </div>
          <div>
            <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div>
            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
            <div class="small text-gray-500">Chicken the Dog · 2w</div>
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
      </div>
    </li>-->

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">USER</span>
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Listas de la compra</h1>
          <p class="mb-4">Aquí puede adicionar, modificar y/o eliminar listas de la compra</p>

        <div class="row justify-content-end mb-2 mr-1">
            <div class="col-xs-1 mr-1">
                <a title="Actualizar listado" onclick="actualizarListado()" href="#" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                    <i class="fas fa-sync"></i>
                    </span>
                    <span class="text">Actualizar</span>
                </a>
           </div>
            <div class="col-xs-1">
                <a title="Adicionar lista de compra" href="AgregarListaCompra.php" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Nuevo</span>
                </a>
           </div>
        </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listas de compra</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id.</th>
                      <th>Nombre</th>
                    
                      <th>Precio</th>
                      <th>Nombre Usuario</th>
                      <th>Supermercado</th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id.</th>
                        <th>Nombre</th>
                      
                        <th>Precio</th>
                        <th>Nombre Usuario</th>
                        <th>Supermercado</th>
                   
                    </tr>
                  </tfoot>

                   <!-- SE LLENA CON LOS DATOS DE LA BD -->
                  <tbody id="mitbody">
                    <tr>
                      <td>1</td>
                      <td>Lista 1</td>
                    
                      <td>672</td>
                     
                      <td>Betty</td>
                      <td>Gadis</td>
                      
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lista 2</td>
                        
                        <td>500</td>
                       
                        <td>Yanelis</td>
                        <td>Eroski</td>
                    </tr>
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Shopping List 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Salir" si estás listo para abandonar la sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

   <!--Modales-->

  <div id="modal1" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Confimar eliminación</h6>
      </div>
      <div class="modal-body">
           ¿Seguro que desea eliminar la lista?
           <button id="boton_modal" type="button"class="btn btn-sm">Si</button>
           <button type="button"class="btn btn-sm" data-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
      </div>
      
      </div>
    </div>

  </div>

  <div id="modal2" class="modal fade" aria-hidden="true" style="display: none; ">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Detalles de la Lista de la compra seleccionada</h6>
        <button type="button"class="btn btn-lg" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row ">
            <div class="form-group col-md-6">
              <label for="id_lista">Id.</label>
              <input type="text" class="form-control campos_form" id="id_lista" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="nombre_lista">Nombre</label>
              <input type="text" class="form-control campos_form" id="nombre_lista" disabled>
            </div>
           
        </div>
          <div class="form-row ">
            <div class="form-group col-md-6">
              <label for="precio_lista">Precio</label>
              <input type="text" id="precio_lista" class="form-control campos_form" disabled>

          </div>
            <div class="form-group col-md-6">
              <label for="nombre_usuario">Nombre Usuario</label>
              <input type="text" class="form-control campos_form" id="nombre_usuario" disabled>
            </div>
                       
          </div>
          <div class="form-row ">
          <div class="form-group col-md-6">
            <label for="nombre_supermercado">Supermercado</label>
            <input type="text" id="nombre_supermercado " class="form-control campos_form" disabled>

        </div>
      </div>
         
          
            <!-- LISTA DE LA COMPRA -->
          <div class="form-row">
          <div class="card shadow mb-4 col">
              
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
              </div>
             
              
              <div class="card-body">

                <div class="table-responsive">
                  <table id="tabla_productos_compra" class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id.</th>
                        <th>Nombre</th>
                      
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                     
                      </tr>
                    </thead>
                   
                    <tbody id="mitbodylista">
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-end">

              
              <div class="col-xs-1 mr-1"> 
                <button type="button"class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                 
              </div> 
               <!-- <div class="col-xs-1"> <button type="submit" class="btn btn-primary">Guardar</button></div>  -->

          </div>
        </form>
          <!--end: Form-->

        </div>
    </div>

  </div>

  <!--Scripts personalizados-->
  
  <script>

    //FUNCION PARA AÑADIR LOS BOTONES DE EDITAR Y ELIMINAR AL FINAL DE CADA FILA
    
    //Cojo el tbody
    var tbody= document.getElementById("mitbody");

    //Cojo la primera fila del tbody
     var fila=tbody.firstElementChild;
     
    
     //Me muevo por todas las filas del tbody, hasta que llegue a la ultima
     while(fila!=null)
     {
        
         //Me muevo por todos los hijos de la fila(los td)
         for (let index = 0; index < fila.children.length; index++) {
             if(fila.children[index]==fila.lastElementChild)
             {
                fila.innerHTML+='<td style="text-align:center; padding-left:0; padding-right:0;"><a title="Ver" onclick=verElemento(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-eye"></i></a></td>';
                
                //fila.innerHTML+='<td style="text-align:center; padding-left:0; padding-right:0;"><a title="Editar" onclick=editarElemento(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-edit"></i></a></td>';
                fila.innerHTML+= '<td style="text-align:center; padding-left:0; padding-right:0;"><a title="Eliminar" onclick=eliminarElemento(this) class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>';
                
                break;
             }
            
         }
        
        fila=fila.nextElementSibling;

     };

</script>

<script>

  //FUNCION PARA ACTUALIZAR LA LISTA CADA VEZ QUE SEA NECESARIO : LLAMAR AL METODO QUE ME TRAE LAS LISTAS DE COMPRA

  function actualizarListado(){

    console.log("prueba")


  }

</script>

<script>

  //FUNCION PARA VER UNA LISTA

  function verElemento(td){

    
    $("#modal2").modal("show");

            
    fila=td.closest("tr");

    //LLAMADA A BD PARA LLENAR LA TABLA DE PRODUCTOS DEL MODAL PASANDO EL ID DE LA LISTA que lo tengo en: fila.cells[0]
    
    
    var campos_form=document.getElementsByClassName("campos_form");

   
    //Lleno los campos con los datos de la fila
    for (let index = 0; index <fila.children.length-2; index++) {

      if (campos_form[index].tagName=="INPUT") {

        campos_form[index].value=fila.children[index].innerHTML;
  
      }

      else if (campos_form[index].tagName=="SELECT") {

        if(campos_form[index].disabled){
          campos_form[index].disabled=false;
        }	

      var opciones=campos_form[index].getElementsByTagName("option");


      for (let j = 0; j < opciones.length; j++) {
        
        if(opciones[j].innerHTML==fila.children[index].innerHTML)
        {
          
          campos_form[index].selectedIndex=j;
          
          break;
        }
        
      }

    }

  }
  

}

</script>

<script>

  //FUNCION PARA ELIMINAR UN elemento

  function eliminarElemento(td){

    $("#modal1").modal("show");

    
    $("#boton_modal").on("click", function(){

      
      //Cuando hago click en el Si del modal, elimino el elemento
    
     // td.closest('tr').remove();

     //**DEBO ELIMINAR EN BD***

            

    });

  }


</script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>