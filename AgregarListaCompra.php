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

//adicionar una lista de la compra 
if(isset($_POST['listacompraguardar'])){
  $compra = new ListaCompra();

  if(isset($_SESSION['arrayproductos'])) {
    $productos = new Producto(); 

    $total = 0; 
    foreach ($_SESSION['arrayproductos'] as $item => $value2) {
      $lista = $productos->getProductosBySupermercadoByID($_POST['idsupermercado'],$value2);
      foreach ($lista as $item => $value3) {
        $total = $total+$value3['precio'] - $value3['descuento'] ;
      }
    }

    $idcompra = $compra->insertListaCompra($_POST['nombre'], $total, $_SESSION['idusuario'], $_POST['idsupermercado']); 
    //guardar cada producto
    $array = $_SESSION['arrayproductos'];
    echo var_dump($array);
    for ($i = 0; $i < count($_SESSION['arrayproductos']); $i++) {
      $compra->insertarProductosLista($_POST['idsupermercado'], $idcompra, $array[$i]); 
     
    }

    //vaciar la lista
    $_SESSION['arrayproductos']=[]; 
    $_SESSION['total']=0;
  }


  echo'<script type="text/javascript">
  alert("Lista de la compra adicionada correctamente")
  window.location.href="ListasCompra.php";
  </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Comparador Lista de la Compra</h1>
          <p class="mb-4">Aquí puede indicar los datos necesarios para guardar una nueva lista de compra basado en los productos que ha adicionado anterioermente  Podrá ver el precio en cad supermercado</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar Lista de compra</h6>
            </div>
            <div class="card-body">
             
            <form action="AgregarListaCompra.php" method="post">
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="nombre_lista">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre_lista" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="select_mercado">Supermercado Preferente para la compra</label>
                       
                        <?php

                        echo '
                        <select name="idsupermercado" id="select_mercado" class="form-control">
                        <option >---Seleccione un supermercado---</option>';
                        
                        if(isset($_SESSION['supermercados'])) {
                              foreach ($_SESSION['supermercados'] as $item => $value) {
                                 echo '<option value = '.$value['idsupermercado']. '>' . $value['nombre_supermercado']. '</option> '
                                  ;
                              }
                            }
                            
                        ?>
                        </select>
                    </div>
                
                    </div>
                   
                      <!-- LISTA DE LA COMPRA -->

                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Lista de la Compra por supermercados</h6>
                        </div>
                       
                      
                      <?php
                          if(isset($_SESSION['supermercados'])) {
                            foreach ($_SESSION['supermercados'] as $item => $value) {

                            echo '
                            <div class="card-body">
                             <!--TOTAL A IR SUMANDO A MEDIDA QUE AGREGUE UN PRODUCTO A LA COMPRA -->

                            <div class="row justify-content-center">
                            <div class="col-xs-2 mr-5" style="font-weight:bold; color:black; ">
                                    <label>'.$value['nombre_supermercado'].' <span id="precio_total_lista"></span></label>
                                </div>
                              
                            </div>
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
                              ';
                              //Obteniendo los valores de cada producto pro cada supermercado almacenado en la bd
                              if(isset($_SESSION['arrayproductos'])) {
                                $total = 0; 
                                $productos = new Producto(); 
                                foreach ($_SESSION['arrayproductos'] as $item => $value2) {
                                  $lista = $productos->getProductosBySupermercadoByID($value['idsupermercado'],$value2);
                                  $total = 0; 
                                  foreach ($lista as $item => $value3) {
                                    echo '
                                    <tr>
                                    <td>' . $value3['idproductos']. '</td>
                                    <td>' . $value3['nombre_producto']. '</td>
                                    <td>' . $value3['categoria_producto']. '</td>
                                    <td>' . $value3['precio']. '</td>
                                    <td>' . $value3['descuento']. '</td>
                                    </tr>'
                                    ;
                                    $total = $total+$value3['precio'] -$value3['descuento'] ;
                                    $_SESSION['total'] = $total; 
                                  
                                }

                                
                              }
                              echo '
                                  <tr>
                                  <td>     </td>
                                  <td>  TOTAL </td>
                                  <td>         </td>
                                  <td> </td>
                                  <td>' .$_SESSION['total']. '</td>
                                  </tr>
                                '; 
                            
                            }
                              
                             echo '
                              </tbody>
                            </table>
                          </div>
                        </div>

                            ';
                            
                            }
                          }

                      ?>
                      </div>

                        
                    <div class="row justify-content-end">

                        
                        <div class="col-xs-1 mr-1"> 
                            <a title="Cancelar" href="ListasCompra.php" class="btn btn-outline-primary">
                           
                                <span class="text">Cancelar</span>
                            </a>
                        </div> 
                        <div class="col-xs-1"> 
                          <button name="listacompraguardar" type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                        </div>  

                    </div>
                  </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
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
