<?php

require_once "conexion.php";


function obtenerActores($conexion){
    $query = "SELECT * FROM actor";

    $resultado = mysqli_query($conexion, $query);
    
    return $resultado;

}

function obtenerActoresPorNombre($conexion, $nombre){
    $query = "SELECT * FROM actor WHERE first_name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion, $query);
    
        return $resultado;       
}

function obtenerActoresPorId($conexion, $id){
    $query = "SELECT * FROM actor WHERE actor_id = $id";

    $resultado = mysqli_query($conexion, $query);
    
        return $resultado;       
}

function insertarActor($conexion, $datos) {
    $query = "INSERT INTO actor(first_name, last_name)
        VALUES ('{$datos['nombreActor']}', '{$datos['apellidoActor']}')";

    $resultado = mysqli_query($conexion, $query);

        return $resultado;
}

function eliminarActor($conexion, $id) {
    $query = "DELETE FROM film_actor WHERE actor_id = $id";
        
    $resultado = mysqli_query($conexion, $query);

    $query = "DELETE FROM actor WHERE actor_id = $id";
        
    $resultado = mysqli_query($conexion, $query);

        return $resultado;
}

function actualizarActor($conexion, $datos){
    $query= "UPDATE actor SET first_name = '{$datos['nombreActor']}',
     last_name = '{$datos['apellidoActor']}' 
     WHERE actor_id = '{$datos['id']}'";

     $resultado = mysqli_query($conexion, $query);

     return $resultado;
}