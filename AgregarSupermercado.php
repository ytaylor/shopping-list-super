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
          <h1 class="h3 mb-2 text-gray-800">Supermercado</h1>
          <p class="mb-4">Aquí puede indicar los datos necesarios para adicionar un nuevo supermercado.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar Supermercado</h6>
            </div>
            <div class="card-body">
             

              <?php
              echo '
                <form method="post" action="modelos/crear_supermercado.php">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombre_mercado">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre_mercado" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="direccion_mercado">Dirección</label>
                        <input name="direccion" type="text" class="form-control" id="direccion_mercado" required>
                      </div>
                    </div>
                   
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="provincia_mercado">Provincia</label>
                            <select name="provincia" id="provincia_mercado" class="form-control">
                                <option >---Seleccione una provincia---</option>
                                <option  value="A Coruña">A Coruña</option>
                                <option  value="Álava">Álava</option>
                                <option  value="Albacete">Albacete</option>
                                <option  value="Alicante">Alicante</option>
                                <option value="Almería">Almería</option>
                                <option  value="Asturias">Asturias</option>
                                <option  value="Ávila">Ávila</option>
                                <option value="Badajoz">Badajoz</option>
                                <option value="Baleares">Baleares</option>
                                <option value="Barcelona">Barcelona</option>
                                <option value="Burgos">Burgos</option>
                                <option value="Cáceres">Cáceres</option>
                                <option value="Cádiz">Cádiz</option>
                                <option value="Cantabria">Cantabria</option>
                                <option value="Castellón">Castellón</option>
                                <option value="Ciudad Real">Ciudad Real</option>
                                <option value="Córdoba">Córdoba</option>
                                <option  value="Cuenca">Cuenca</option>
                                <option  value="Girona">Girona</option>
                                <option value="Granada">Granada</option>
                                <option value="Guadalajara">Guadalajara</option>
                                <option  value="Gipuzkoa">Gipuzkoa</option>
                                <option value="Huelva">Huelva</option>
                                <option value="Huesca">Huesca</option>
                                <option value="Jaén">Jaén</option>
                                <option  value="La Rioja">La Rioja</option>
                                <option value="Las Palmas">Las Palmas</option>
                                <option  value="León">León</option>
                                <option  value="Lérida">Lérida</option>
                                <option  value="Lugo">Lugo</option>
                                <option value="Madrid">Madrid</option>
                                <option value="Málaga">Málaga</option>
                                <option value="Murcia">Murcia</option>
                                <option value="Navarra">Navarra</option>
                                <option value="Ourense"></option>Ourense</option>
                                <option value="Palencia">Palencia</option>
                                <option value="Pontevedra">Pontevedra</option>
                                <option value="Salamanca">Salamanca</option>
                                <option value="Segovia">Segovia</option>
                                <option  value="Sevilla">Sevilla</option>
                                <option value="Soria">Soria</option>
                                <option value="Tarragona">Tarragona</option>
                                <option  value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
                                <option  value="Teruel">Teruel</option>
                                <option value="Toledo">Toledo</option>
                                <option  value="Valencia">Valencia</option>
                                <option value="Valladolid">Valladolid</option>
                                <option value="Vizcaya">Vizcaya</option>
                                <option value="Zamora">Zamora</option>
                                <option  value="Zaragoza">Zaragoza</option>
                                <option  value="Cdad. Autónoma Ceuta">Cdad. Autónoma Ceuta</option>
                                <option value="Cdad. Autónoma Melilla">Cdad. Autónoma Melilla</option>
                            </select>
                          </div>

                      <div class="form-group col-md-6">
                        <label for="codigopostal_mercado">Código postal</label>
                        <input name="codigo_postal" type="number" class="form-control" id="codigopostal_mercado">
                      </div>                      
                      
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="latitud">Latitud</label>
                          <input name="latitud" type="text" class="form-control" id="latitud">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="longitud">Longitud</label>
                          <input name="longitud" type="text" class="form-control" id="longitud">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="cadena">Cadena</label>
                          <input name="cadena" type="text" class="form-control" id="cadena">
                        </div>
                        
                      </div>

                    <div class="row justify-content-end">

                        <div class="col-xs-1 mr-1"> 
                            <a title="Cancelar" href="Supermercados.php" class="btn btn-outline-primary">
                           
                                <span class="text">Cancelar</span>
                            </a>
                        </div>  
                        <div class="col-xs-1"> <button type="submit" class="btn btn-primary">Guardar</button></div> 
                        

                    </div>
                  </form>';
                  ?>



            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
// Incluyendo el footer
include 'templates/footer.php';
?>
</html>
