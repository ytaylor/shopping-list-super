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

    <html>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
             <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Shopping List</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <p>Shopping List es una aplicación que permite gestionar productos, supermercados y listas de compras.</p>
                  <p class="text-justify">Su principal funcionalidad es determinar en cuál de los supermercados previamente insertados sería más barata la compra, 
                    mediante una comparación de la lista de compra, de acuerdo a los precios definidos para los productos en cada supermercado.</p>
                  <br>
                  <div   id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                    </ol>
                    <div style="height:50%;" class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/supermarket-1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-3.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-4.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-5.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-6.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-7.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/supermarket-8.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Siguiente</span>
                    </a>
                  </div>

              </div>
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
