<?php

class ListaCompra
{
    /* Devuelve la informacion de los supermercados */
    function getSupermercados(){
        $sql = "SELECT * FROM supermercado";
        //obtenemos el array de pedidos
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
    //Obtener la información de un supermercado
    function getSupermercado($idsupermercado){
        $sql = "SELECT * FROM supermercado where idsupermercado='$idsupermercado'";
        //obtenemos el array de pedidos
        //echo $sql;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    //Actualiza un supermercado
    function updateSupermercado($nombre, $direccion, $provincia, $codigo_postal, $latitud, $longitud, $cadena, $idsupermercado){
        $tool = new Tools();
        $sqlUpdate = "UPDATE supermercado set nombre = '$nombre',direccion = '$direccion' ,provincia = '$provincia', codigo_postal = '$codigo_postal', latitud = '$codigo_latitudpostal', cadena = '$cadena', where idsupermercado='$idsupermercado'";
        $result = $tool->insertData($sqlUpdate);
        return $result;
    }

    //Elimina un supermercado
    function deleteSupermercado( $idsupermercado){
        $tool = new Tools();
        $sqlDelete = "DELETE FROM supermercado where idsupermercado='$idsupermercado'";
        $result = $tool->insertData($sqlUpdateStock);
        return $result;
    }

}