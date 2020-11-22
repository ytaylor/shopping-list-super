<?php
//Incluimos todas las clases y funciones del proyecto
include 'controlador/controladorGlobal.php';
include "modelos/listacompra.php";
include "modelos/producto.php";
include "modelos/supermercado.php";
include "modelos/usuarios.php";
//Inicio sesion para guardar las variables que usaré durante todo el proyecto
session_start();

//Obteniendo los productos del mercado seleccionado 
//Porductos
$productos = new Producto(); 
$listaproductos = $productos->getProductos(); 
$_SESSION['productos'] = $listaproductos; 

if(isset($_POST['adicionar'])){
  if(in_array($_POST['idproductos'], $_SESSION['arrayproductos'])){
    echo'<script type="text/javascript">
    alert("Este producto ya ha sido adicionado anteriormente");
    </script>';

  }else{
    array_push($_SESSION['arrayproductos'] , $_POST['idproductos']); 
    //echo count($_SESSION['arrayproductos']);
    echo'<script type="text/javascript">
    window.location.href="ListaProductos.php";
    </script>';
  }
}


// Incluyendo el head and sidebar
include 'templates/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Lista de Productos</h1>
          <p class="mb-4">Aquí puede seleccionar los productos para agregar a una nueva lista de compra.</p>

      
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar Productos a una lista de la compra</h6>
            </div>
            <div class="card-body">
             
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Productos disponibles</h6>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="tabla_productos_disponibles" class="table table-bordered"  width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Id.</th>
                                  <th>Nombre</th>
                                  <th>Categoría</th>
                               
                                </tr>
                              </thead>
                              
                              <tbody id="mitbody">
                              <?php
                        if(isset($_SESSION['productos'])) {
                            foreach ($_SESSION['productos'] as $item => $value) {
                                echo '
                                <tr>
                                <td>' . $value['idproductos']. '</td>
                                <td>' . $value['nombre_producto']. '</td>
                                <td>' . $value['categoria_producto']. '</td>
                                <td>
                                <form method="post" action="ListaProductos.php"> 
                                <input hidden name="idproductos" value="'. $value['idproductos'].'">
                                <button name= "adicionar" type="submit" title="Adicionar" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-plus"></i></button>

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

<script>

  //DESARROLLAR LA FUNCION PARA Eliminar EL PRODUCTO DE LA TABLA LISTA DE COMPRA TENER EN CUENTA CADA VEZ QUE ELIMINE UNO Decremento EL TOTAL
  //CAMPO TOTAL: precio_total_lista
  
  function eliminarProducto(td){
  
      var fila_eliminar=td.closest("tr");
      console.log(fila_eliminar)

      console.log(fila_eliminar.cells);
  precio_total.innerHTML= Number(Number(Number(Number(precio_total.innerHTML).toFixed(2))-Number(fila_eliminar.cells[3].innerHTML)).toFixed(2));
  
   console.log(precio_total);

      var td_eliminar=fila_eliminar.lastElementChild;
      console.log(td_eliminar)
       fila_eliminar.removeChild(td_eliminar);
       var celda_eliminar=document.createElement("td");
       celda_eliminar.innerHTML='<td id="celda_agregar_producto" style="text-align:center; padding-left:0; padding-right:0;"><a title="Agregar" onclick=agregarProducto(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-plus"></i></a></td>';
       fila_eliminar.appendChild(celda_eliminar)
      document.getElementById("mitbody").appendChild(fila_eliminar)
      console.log(document.getElementById("tabla_productos_disponibles"));
  }
  
  </script>

<script>

    //FUNCION PARA MOSTRAR EN EL MODAL LA COMPARACION DE LA LISTA EN OTROS SUPERMERCADOS
  
    function compararLista(){
  
      $("#modal2").modal("show");
  
      //LLAMAR AL METODO DE LA BD PARA MOSTRAR LOS RESULTADOS, pasar por parámetro los productos de la tabla con id: tabla_productos_compra y tbody:mitbodylista
      //LLENAR EL CONTENIDO resultante EN EL ELEMENTO de ID: contenido_modal_comparar
      
   
  
  }
  
  </script>

  
<?php
// Incluyendo el footer
include 'templates/footer.php';
?>

</html>
