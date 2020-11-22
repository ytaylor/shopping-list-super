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
?>

<!DOCTYPE html>
<html lang="en">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Lista de la Compra</h1>
          <p class="mb-4">Aquí ver todos los detalles de la lista de compra.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ver Lista de compra</h6>
            </div>
            <div class="card-body">
             
                <form>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="nombre_lista">Nombre</label>
                        <input type="text" class="form-control" id="nombre_lista" value=<?php echo $_SESSION['listacompra'][0]['nombrelista'] ?> required disabled >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="select_mercado">Supermercado</label>
                        <input type="text" class="form-control" id="nombre_lista" value=<?php echo $_SESSION['listacompra'][0]['nombresupermercado'] ?> required disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="select_mercado">Precio Total</label>
                        <input type="text" class="form-control" id="nombre_lista" value=<?php echo $_SESSION['listacompra'][0]['precio_total'] ?> required disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="select_mercado">Identifciador</label>
                        <input type="text" class="form-control" id="nombre_lista" value=<?php echo $_SESSION['listacompra'][0]['idlista_compra'] ?> required disabled>
                    </div>
                    </div>
                   
                      <!-- LISTA DE PRODUCTOS A LLENAR DE ACUERDO AL SUPER SELECCIONADO-->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Productos de la lista</h6>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="tabla_productos_disponibles" class="table table-bordered"  width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Nombre</th>
                                  <th>Categoría</th>
                                  <th>Precio</th>
                               
                                </tr>
                              </thead>
                              
                              <tbody id="mitbody">
                                <?php
                                                   if(isset($_SESSION['productos'])) {
                                                    foreach ($_SESSION['productos'] as $item => $value) {
                                                        echo '
                                                        <tr>
                                                        <td>' . $value['nombre_producto']. '</td>
                                                        <td>' . $value['categoria_producto']. '</td>
                                                        <td>' . $value['precio']. '</td>
                                                
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

                     
                  </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   

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
  
<?php
// Incluyendo el footer
include 'templates/footer.php';
?>

</body>

</html>
