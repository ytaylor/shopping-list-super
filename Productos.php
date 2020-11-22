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
$productos = new Producto();
$lista_productos= $productos->getProductos(); 
$_SESSION['lista_productos']=$lista_productos;

//Eliminar
if(isset($_POST['eliminarproducto'])){
      
    $productos-> deleteProducto($_POST["idproducto"]); 

      echo'<script type="text/javascript">
      alert("Producto eliminado correctamente")
      window.location.href="Productos.php";
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
          <h1 class="h3 mb-2 text-gray-800">Productos</h1>
          <p class="mb-4">Aquí puede adicionar, modificar y/o eliminar productos</p>

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
                <a title="Adicionar producto" href="AgregarProducto.php" class="btn btn-primary btn-icon-split btn-sm">
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
              <h6 class="m-0 font-weight-bold text-primary">Lista de productos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id.</th>
                      <th>Nombre</th>
                      <th>Categoría</th>
                     
                    </tr>
                  </thead>
                 

                  <!-- SE LLENA CON LOS DATOS DE LA BD -->

                  <tbody id="mitbody">
                  <?php
                  if(isset($_SESSION['lista_productos'])) {
                        foreach ($_SESSION['lista_productos'] as $item => $value) {
                            echo '
                            <tr>
                            <td>' . $value['idproductos']. '</td>
                            <td>' . $value['nombre_producto']. '</td>
                            <td>' . $value['categoria_producto']. '</td>
                     
                            <td style="text-align:center; padding-left:0; padding-right:0;"><form method="post" action="Productos.php"> <input hidden name="idproducto" value="'. $value['idproductos'].'">
                            <button name= "eliminarproducto" type="submit" title="Eliminar" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></button></form></td>
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
           ¿Seguro que desea eliminar el producto?
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
        <h6 class="modal-title"> Editar Producto</h6>
        <button type="button"class="btn btn-lg" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="id_producto">Id.</label>
              <input type="text" class="form-control campos_form" id="id_producto" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="nombre_producto">Nombre</label>
              <input type="text" class="form-control campos_form" id="nombre_producto" >
            </div>
          </div>
          <div class="form-row">
           
            <div class="form-group col-md-6">
              <label for="categoria_producto">Categoría</label>
              <input type="text" class="form-control campos_form" id="categoria_producto" >
            </div>
         </div>
           
         
         <div class="row justify-content-end">

              <div class="col-xs-1 mr-1" id="boton_guardar"> <button type="submit" class="btn btn-primary" >Guardar</button></div>  
              <div class="col-xs-1" > <button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cancelar</button></div> 

          </div>
        </form>
          <!--end: Form-->

        </div>
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
                
                fila.innerHTML+='<td style="text-align:center; padding-left:0; padding-right:0;"><a title="Editar" onclick=editarElemento(this) class="btn btn-primary btn-circle btn-sm" > <i class="fas fa-edit"></i></a></td>';
                
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

  //FUNCION PARA EDITAR UN ELEMENTO

  function editarElemento(td){

    $("#modal2").modal("show");

            
    fila=td.closest("tr");
    
    
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
  

      document.getElementById("boton_guardar").addEventListener("click",function(e){

        e.preventDefault();

         //***LUEGO GUARDAR EN LA BD***
    
        $("#modal2").modal("hide");

    
  });

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


<?php
// Incluyendo el footer
include 'templates/footer.php';
?>

</html>
