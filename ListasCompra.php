<?php
//Incluimos todas las clases y funciones del proyecto
include 'controlador/controladorGlobal.php';
include "modelos/listacompra.php";
include "modelos/producto.php";
include "modelos/supermercado.php";
include "modelos/usuarios.php";
//Inicio sesion para guardar las variables que usaré durante todo el proyecto
session_start();

//Coger valores de los supermercados desde la bases de datos
$compra = new ListaCompra();
$listacompra= $compra->getListaCompra($_SESSION['idusuario']); 
$_SESSION['listacompra']=$listacompra;


//Eliminar
if(isset($_POST['eliminar'])){
      $compra-> deleteListaCompra($_POST["id"]); 

      echo'<script type="text/javascript">
      alert("Lista de la compra eliminada correctamente")
      window.location.href="ListaCompra.php";
      </script>';
}

//Obtener productos de una lista de la compra
if(isset($_POST['ver'])){

  $listacompra= $compra-> getListaCompraById($_POST["id"]); 
  $productos = $compra-> getProductosListaCompra($_POST["id"]); 
  $_SESSION['listacompra']= $listacompra; 
  $_SESSION['productos']=$productos;

  echo'<script type="text/javascript">
  window.location.href="VerListaCompra.php";
  </script>';

}


//Agregar
if(isset($_POST['agregar'])){
  $supermercados-> insertSupermercado($_POST["nombre"], $_POST["direccion"], $_POST["provincia"], $_POST["codigo_postal"], $_POST["cadena"], $_POST["latitud"], $_POST["longitud"]); 

  echo'<script type="text/javascript">
  alert("Supermercado creado correctamente"); 
  window.location.href="Supermercados.php";
  </script>';
}




// Incluyendo el head and sidebar
include 'templates/sidebar.php';
?>


<!DOCTYPE html>
<html lang="en">
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
                      <th>Supermercado</th>
                   
                    </tr>
                  </thead>
                
                   <!-- SE LLENA CON LOS DATOS DE LA BD -->
                  <tbody id="mitbody">
                  <?php
                  if(isset($_SESSION['listacompra'])  && count($_SESSION['listacompra'])>0) {
                        foreach ($_SESSION['listacompra'] as $item => $value) {
                            echo '
                            <tr>
                            <td>' . $value['idlista_compra']. '</td>
                            <td>' . $value['nombrelista']. '</td>
                            <td>' . $value['precio_total']. '</td>
                            <td>' . $value['nombresupermercado']. '</td>
                        
                            <td style="text-align:center; padding-left:0; padding-right:0;">
                              
                            <form method="post" action="ListasCompra.php"> 
                                <input hidden name="id" value="'. $value['idlista_compra'].'">
                                <button name= "eliminar" type="submit" title="Eliminar" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                <button name= "ver" type="submit" title="Ver" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-eye"></i></button>

                              </form>
                            </td>
                            </tr>
                            '
                            ;
                        }
                      }
                    ?>
                   
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

<?php
// Incluyendo el footer
include 'templates/footer.php';
?>


</html>
