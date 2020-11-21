

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shopping List</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<?php
//Incluimos todas las clases y funciones del proyecto

include 'controlador/controladorGlobal.php';
include "modelos/listacompra.php";
include "modelos/producto.php";
include "modelos/supermercado.php";
include "modelos/usuarios.php";

//Inicio sesion para guardar las variables que usaré durante todo el proyecto
session_start();

//Login
//Pregunto si los valores vienen por seyt para loguear al usuario
if(isset($_GET["nombre"]) && isset($_GET["password"])){
    if($_GET["nombre"]!="" && $_GET["password"]!=""){
    $user = new Usuarios();
    $array = $user->login($_GET["nombre"], $_GET["password"]);
    if(count($array)>0){
        $_SESSION['usuario']=$_GET["usuario"];
        $_SESSION['contrasena']= $_GET["password"];
        $_SESSION['nombre']=$array[0]['nombre'];
        $_SESSION['rol']=$array[0]['rol'];
        $_SESSION['idusuario']=$array[0]['idusuario'];
        echo'<script type="text/javascript">
        window.location.href="index.php";
        </script>';
    }
    else{
      echo'<script type="text/javascript">
      alert("Error de usuario y/o contraseña");
      </script>';
    }
  }else{
    echo'<script type="text/javascript">
    alert("Debe introducir algun valor");
    window.location.href="index.php";
    </script>';
  }
}

?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                 
                 
                    <!-- Poner las acciones de login cuando el usuario le de al boton acceder --> 
                    <?php
                    echo ' 
                    <form method="GET" class="user" action="login.php" >
                    <div class="form-group">
                      <input name="nombre" type="email" class="form-control form-control-user" id="nombre" aria-describedby="emailHelp" placeholder="Correo electrónico...">
                    </div>
                    <div class="form-group">
                      <input name = "password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                   
                    <button type= "submit" class="btn btn-primary btn-user btn-block">
                      Acceder
                    </button>
                  
                  </form>' ; 
                  ?>

                  <hr>
                   <!--<div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


