<?php
include "supermercado.php";
include '../controlador/controladorGlobal.php';

$supermercado = new Supermercado; 
$supermercado-> insertSupermercado($_POST["nombre"], $_POST["direccion"], $_POST["provincia"], $_POST["codigo_postal"], $_POST["cadena"], $_POST["latitud"], $_POST["longitud"]); 

echo'<script type="text/javascript">
alert(Se ha creado el supermercado correctamente); 
window.location.href="../Supermercados.php";
</script>';