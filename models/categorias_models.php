<?php

require_once "conexion.php";


function obtenerCategorias($conexion){
    $query = "SELECT * FROM category";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;

}

function obtenerCategoriasPorNombre($conexion, $nombre){
    $query = "SELECT * FROM category WHERE name LIKE '%$nombre%'";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function insertarCategoria($conexion, $datos) {
    $query = "INSERT INTO category(name)
        VALUES ('{$datos['nombreCategoria']}')";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
}

function eliminarCategoria($conexion, $id) {
    $query = "DELETE FROM category WHERE category_id = $id";
        
    $resultado = mysqli_query($conexion, $query);

        return $resultado;
}