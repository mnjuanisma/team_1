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
        VALUES ('{$datos['nombreIdioma']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function eliminarIdioma($conexion, $id) {
    $query = "DELETE FROM language WHERE language_id = $id";
        
    $resultado = mysqli_query($conexion, $query);

        return $resultado;
}