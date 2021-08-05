<?php

require_once "conexion.php";


function obtenerPaises($conexion){
    $query = "SELECT * FROM country";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
    
}

function obtenerPaisesporNombre($conexion, $nombre){
    $query = "SELECT * FROM country WHERE country LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;
}

function insertarPais($conexion, $datos) {
    $query = "INSERT INTO country(country)
        VALUES ('{$datos['nombrePais']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function eliminarPais($conexion, $id) {
    $query = "DELETE FROM country WHERE country_id = $id";
        
    $resultado = mysqli_query($conexion, $query);

        return $resultado;
}