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
             
                <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombre_producto">Nombre</label>
                        <input type="text" class="form-control" id="nombre_producto" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="categoria_producto">Categoría</label>
                        <input type="text" class="form-control" id="categoria_producto" required>
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
                              
                              <tbody id="mitbody">

                                <!-- LLAMADA A BD PARA CONSTRUIR LAS COLUMNAS DINAMICAMENTE-->

                                <script>

                                    var datos_ejemplo=[ {"id":0,
                                                         "nombre":"Gadis"},
                                                         {"id":1,
                                                         "nombre":"Eroski"},
                                                         {"id":2,
                                                         "nombre":"Lidl"}                                          
                                                      ]

                                    
                                    for (let index = 0; index < datos_ejemplo.length; index++) {
                                        
                                        var fila=document.createElement("tr")

                                        var celda_id=document.createElement("td")                                      
                                        var celda_nombre=document.createElement("td")

                                        celda_id.innerHTML=datos_ejemplo[index].id
                                        celda_nombre.innerHTML=datos_ejemplo[index].nombre

                                        var celda_precio=document.createElement("td")
                                        celda_precio.style.width="200px";
                                        var celda_descuento=document.createElement("td")
                                        celda_descuento.style.width="200px";

                                        celda_precio.innerHTML="<input style='width:150px' type='text' class='form-control precio ' required> "
                                        celda_descuento.innerHTML="<input style='width:150px' type='text' class='form-control descuento' required>"

                                        fila.appendChild(celda_id)
                                        fila.appendChild(celda_nombre)
                                        fila.appendChild(celda_precio)
                                        fila.appendChild(celda_descuento)

                                        document.getElementById("mitbody").appendChild(fila)

                                        
                                    }
                                   

                                </script>
                               
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
                        <div class="col-xs-1"> <button type="submit" class="btn btn-primary">Guardar</button></div> 
                        

                    </div>
                  </form>

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
  
 
  

</html>
