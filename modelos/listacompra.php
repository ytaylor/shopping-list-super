<?php

class ListaCompra
{
    /* Devuelve la informacion de la lista de la compra */
    function getListaCompra($idusuario){
        $sql = "SELECT lista_compra.nombre as nombrelista, supermercado.nombre_supermercado as nombresupermercado, lista_compra.precio_total, lista_compra.idlista_compra  FROM lista_compra, supermercado WHERE supermercado.idsupermercado = lista_compra.idsupermercado and idusuario='$idusuario'"  ;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    /* Devuelve la informacion de la lista de la compra */
    function getListaCompraById($idlistacompra){
        $sql = "SELECT lista_compra.nombre as nombrelista, supermercado.nombre_supermercado as nombresupermercado, lista_compra.precio_total, lista_compra.idlista_compra  FROM lista_compra, supermercado WHERE supermercado.idsupermercado = lista_compra.idsupermercado and  idlista_compra='$idlistacompra'"  ;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

      //Inserta un lista de la compra
      function insertListaCompra($nombre, $precio_total, $idusuario, $idsupermercado){
        $tool = new Tools();
        $sqlUpdate = "INSERT INTO lista_compra(nombre, precio_total, idusuario, idsupermercado) values ('$nombre', '$precio_total', '$idusuario', '$idsupermercado')";
                
        $result = $tool->insertData($sqlUpdate);
        return $result;
    }

    //productos_lista
    function insertarProductosLista($idsupermercado, $idcompra, $idproducto){
        $tool = new Tools();
        $sqlUpdate = "INSERT INTO compra_productos(idsupermercado, idcompra, idproducto) values ('$idsupermercado', '$idcompra', '$idproducto')";
       echo $sqlUpdate;     
        $result = $tool->insertData($sqlUpdate);
        return $result;
    }


    //Elimina una lista de la compra 
    function deleteListaCompra( $idlistacompra){
        $tool = new Tools();
        $sqlDelete = "DELETE FROM lista_compra where idlista_compra='$idlistacompra'";
        $result = $tool->insertData($sqlDelete);
        return $result;
    }

    //Productos de una lista de la compra
    function getProductosListaCompra($idlistacompra){
        $sql = "SELECT * FROM compra_productos, supermercado, productos, productos_precio WHERE idcompra='$idlistacompra' and productos.idproductos = compra_productos.idproducto and supermercado.idsupermercado = compra_productos.idsupermercado and productos_precio.idproducto=productos.idproductos and productos_precio.idsupermercado=compra_productos.idsupermercado"    ;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
}