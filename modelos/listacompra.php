<?php

class ListaCompra
{
    /* Devuelve la informacion de la lista de la compra */
    function getListaCompra($idusuario){
        $sql = "SELECT lista_compra.nombre as nombrelista, supermercado.nombre as nombresupermercado, lista_compra.precio_total, lista_compra.idlista_compra  FROM lista_compra, supermercado WHERE supermercado.idsupermercado = lista_compra.idsupermercado and idusuario='$idusuario'"  ;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    //Elimina una lista de la compra 
    function deleteListaCompra( $idlistacompra){
        $tool = new Tools();
        $sqlDelete = "DELETE FROM lista_compra where idlista_compra='$idlistacompra'";
        $result = $tool->insertData($sqlUpdateStock);
        return $result;
    }

}