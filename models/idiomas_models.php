<?php

require_once "conexion.php";



function obtenerIdiomas($conexion){
    $query = "SELECT * FROM language";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}

function obtenerIdiomasPorNombre($conexion, $nombre){
    $query = "SELECT * FROM language WHERE name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function insertarIdioma($conexion, $datos) {
    $query = "INSERT INTO language(name)
        VALUES ('{$datos['idioma']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}