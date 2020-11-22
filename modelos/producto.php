<?php

class Producto
{
    /* Devuelve la informacion de los productos */
    function getProductos(){
        $sql = "SELECT * FROM productos";
        //obtenemos el array de pedidos
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    function getProductosBySupermercadoByID($idsupermercado, $idproducto){
        $sql = "SELECT * FROM productos, productos_precio where productos_precio.idproducto='$idproducto' and idsupermercado='$idsupermercado limit 1'";
        //obtenemos el array de pedidos
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }


    //Obtener la información de un producto
    function getProducto($idproductos){
        $sql = "SELECT * FROM productos where idproductos='$idproductos'";
        //obtenemos el array de pedidos
        //echo $sql;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    //Actualiza un producto
    function updateProducto($nombre, $categoria){
        $tool = new Tools();
        $sqlUpdate = "UPDATE productos set nombre = '$nombre', categoria = '$categoria' where idproductos='$idsproductos'";
        $result = $tool->insertData($sqlUpdate);
        return $result;
    }

    //Elimina un producto
    function deleteProducto( $idproductos){
        $tool = new Tools();
        $sqlDelete = "DELETE FROM productos where idproductos='$idproductos'";
        $result = $tool->insertData($sqlUpdateStock);
        return $result;
    }

}