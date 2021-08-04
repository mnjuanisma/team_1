<?php
# Este se considera un controlador

require_once "models/categorias_models.php";

$pagina = "Categorías";


$categorias = obtenerCategorias($conexion);

$nombreCategoria = $_POST['nombreCategoria'] ?? "";


if (isset($_POST['btnGuardarDatos'])){
    
    $nombreCategoria = $_POST['inputNombreCategoria'] ?? "";

    $datos = compact('nombreCategoria');

    $insertado = insertarCategoria($conexion, $datos);

    if ($insertado){
        $_SESSION['mensaje'] = 'Datos insertados correctamente';
    } else {
        $_SESSION['mensaje'] = 'Datos no insertados';
    }

    # prevenir reenvio del formulario
}

# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $categorias= obtenerCategoriasPorNombre($conexion, $nombre);
}



# incluir la vista
require_once 'vistas/categorias_vistas.php';