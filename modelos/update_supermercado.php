<?php
include "supermercado.php";
include '../controlador/controladorGlobal.php';

$supermercado = new Supermercado; 
$supermercado-> updateSupermercado($_POST["nombre"], $_POST["direccion"], $_POST["provincia"], $_POST["codigo_postal"], $_POST["cadena"], $_POST["idsupermercado"]); 

echo'<script type="text/javascript">
window.location.href="../supermercados.php";
</script>';