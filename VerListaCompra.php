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

 <!-- Modal Comparación-->
 <div id="modal2" class="modal fade" aria-hidden="true" style="display: none; ">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Lista de Compra en otros supermercados</h6>
        <button type="button"class="btn btn-lg" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="contenido_modal_comparar">


       
        </div>
        <div class="modal-footer justify-content-end">
 
            <div class="col-xs-1" > <button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cerrar</button></div> 

        </div>
    </div>

  </div>
</div>

   <!--Scripts personalizados-->
   <script>
    //FUNCION PARA AÑADIR UN BOTON ADICIONAR AL FINAL DE CADA FILA
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
                fila.innerHTML+='<td id="celda_agregar_producto" style="text-align:center; padding-left:0; padding-right:0;"><a title="Agregar" onclick=agregarProducto(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-plus"></i></a></td>';
             
                
                break;
             }
            
         }
        
        fila=fila.nextElementSibling;

     };
</script>


<script>
precio_total=document.getElementById("precio_total_lista");

//DESARROLLAR LA FUNCION PARA AGREGAR EL PRODUCTO A LA TABLA LISTA DE COMPRA TENER EN CUENTA CADA VEZ QUE AGREGUE UNO INCREMENTAR EL TOTAL
//CAMPO TOTAL: precio_total_lista

function agregarProducto(td){

   var fila=td.closest("tr");
   console.log(fila)

  console.log(fila.cells);
  precio_total.innerHTML= Number(Number(Number(Number(precio_total.innerHTML).toFixed(2))+Number(fila.cells[3].innerHTML))).toFixed(2);
  
   console.log(precio_total);

   var td_agregar=fila.lastElementChild;
      console.log(td_agregar)
     fila.removeChild(td_agregar);
     var celda=document.createElement("td");
     celda.innerHTML='<td id="celda_eliminar_producto" style="text-align:center; padding-left:0; padding-right:0;"><a title="Eliminar" onclick=eliminarProducto(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-trash"></i></a></td>';
     fila.appendChild(celda)
    document.getElementById("mitbodylista").appendChild(fila)
    console.log(document.getElementById("tabla_productos_compra"));
}

</script>

<?php
// Incluyendo el footer
include 'templates/footer.php';
?>

</body>

</html>
