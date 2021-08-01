<?php
# Este se considera un controlador

require_once "models/categorias_models.php";

$pagina = "Categorías";


$resultado = obtenerCategorias($conexion);


if (isset($_POST['guardar'])){
    $categoria = $_POST['categoria'] ?? "";

    $datos = compact('categoria');
    

    $insertado = insertarCategoria($conexion, $datos);

    if ($insertado){
        $_SESSION['mensaje'] = 'Datos insertados correctamente';
    }

    # prevenir reenvio del formulario
}


# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $resultado= obtenerCategoriasPorNombre($conexion, $nombre);
}



# incluir la vista
require_once 'vistas/categorias_vistas.php';