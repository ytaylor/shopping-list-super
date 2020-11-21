<?php

class Usuarios
{
    public $idusuario;
    public $nombre;
    public $usuario;
    public $contrasena;
    public $rol;

    function insertUser($idusuario, $nombre, $usuario, $contrasena, $rol){

        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->usuario= $usuario;
        $this->contrasena= $contrasena;
        $this->rol= $rol;
        $sql = "INSERT INTO usuario (idusuario, nombre, usuario, contrasena, rol) VALUES ('$idusuario', '$nombre', '$usuario', '$contrasena', '$rol'";
        $tool = new Tools();
        $result = $tool->insertData($sql);
        return $result;
    }

    function login($usuario, $password){
        $sql = "SElECT * FROM usuario where usuario='$usuario' and contraseña='$password'";
        $tool = new Tools();
        $result = $tool->getArraySQL($sql);
        return $result;
    }



}