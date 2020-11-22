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
  $supermercados = new Supermercado();
      $supermercados-> deleteSupermercado($_POST["id"]); 

      echo'<script type="text/javascript">
      alert("Supermercado eliminado correctamente")
      window.location.href="Supermercados.php";
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


//Update
if(isset($_POST['update'])){
  $supermercados-> updateSupermercado($_POST["nombre"], $_POST["direccion"], $_POST["provincia"], $_POST["codigo_postal"], $_POST["cadena"], $_POST["idsupermercado"]); 
  echo'<script type="text/javascript">
  alert("Supermercado actualizado correctamente"); 
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
                        
                            <td style="text-align:center; padding-left:0; padding-right:0;"><form method="post" action="ListaCompra.php"> <input hidden name="id" value="'. $value['idlista_compra'].'">
                            <button name= "eliminar" type="submit" title="Eliminar" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></button></form></td>
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
                //fila.innerHTML+= '<td style="text-align:center; padding-left:0; padding-right:0;"><a title="Eliminar" onclick=eliminarElemento(this) class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>';
                
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

<?php
// Incluyendo el footer
include 'templates/footer.php';
?>


</html>
