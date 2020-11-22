<?php
//Incluimos todas las clases y funciones del proyecto
include 'controlador/controladorGlobal.php';
include "modelos/listacompra.php";
include "modelos/producto.php";
include "modelos/supermercado.php";
include "modelos/usuarios.php";
//Inicio sesion para guardar las variables que usaré durante todo el proyecto
session_start();

// Incluyendo el head and sidebar
include 'templates/sidebar.php';
if(isset($_POST['guardar_productos'])){
  $productos = new Producto ();
  $productos->insertarProductos($_POST['nombre'], $_POST['categoria']); 
  //insertar los precios para cada mercado

}



?>

<!DOCTYPE html>
<html lang="en">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Producto</h1>
          <p class="mb-4">Aquí puede indicar los datos necesarios para adicionar un nuevo producto.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar Producto</h6>
            </div>
            <div class="card-body">
             
            <?php
            echo'
                <form action="AgregarProducto.php" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombre_producto">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre_producto" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="categoria_producto">Categoría</label>
                        <input name="categoria" type="text" class="form-control" id="categoria_producto" required>
                      </div>
                    </div>
                   
                    <div class="form-row">

                  <!-- PARA LLENAR LOS DATOS DE LA LISTA DE SUPERMERCADOS (ID y Nombre) LLAMADA A BD -->
                    <div class="card shadow mb-4 col">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Precio por cada supermercado</h6>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="tabla_productos_disponibles" class="table table-bordered"  width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Id.</th>
                                  <th>Supermercado</th>
                                
                                  <th>Precio</th>
                                  <th>Descuento</th>
                               
                                </tr>
                              </thead>
                              
                              <tbody id="mitbody">';

                                if(isset($_SESSION['supermercados'])) {
                                      foreach ($_SESSION['supermercados'] as $item => $value) {
                                          echo '
                                          <tr>
                                          <td>' . $value['idsupermercado']. '</td>
                                          <td>' . $value['nombre_supermercado']. '</td>
                                          <td> <input name="precio'.$value['idsupermercado'].' " style="width:150px" type="text" class="form-control precio" required> </td>
                                          <td> <input name="dscuento'.$value['idsupermercado'].'" style="width:150px" type="text" class="form-control descuento" required> </td>
                                          </tr>
                                          '
                                          ;
                                      }
                                    }
                              
                                    echo '
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                        
                    </div>

                  
                    <div class="row justify-content-end">

                        <div class="col-xs-1 mr-1"> 
                            <a title="Cancelar" href="Productos.php" class="btn btn-outline-primary">
                           
                                <span class="text">Cancelar</span>
                            </a>
                        </div>  
                        <div class="col-xs-1"> <button name="guardar_productos" type="submit" class="btn btn-primary">Guardar</button></div> 
                        

                    </div>
                  </form>';
                  ?>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
     

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

  <!--Scripts personalizados-->
  
  <?php
// Incluyendo el footer
include 'templates/footer.php';
?>
  

</html>
