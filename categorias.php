<?php
# Este se considera un controlador

require_once "models/categorias_models.php";

$pagina = "Categorías";


$categorias = obtenerCategorias($conexion);

$nombreCategoria = $_POST['nombreCategoria'] ?? "";


try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombreCategoria = $_POST['inputNombreCategoria'] ?? "";

        # Validar los datos
        if (empty($nombreCategoria)){
            throw new Exception("El nombre no puede estar vacio");
        }

        $datos = compact('nombreCategoria');

        $insertado = insertarCategoria($conexion, $datos);

        if ($insertado){
            $_SESSION['mensaje'] = 'Datos insertados correctamente';
        } else {
            $_SESSION['mensaje'] = 'Datos no insertados';
        }

        # prevenir reenvio del formulario
}

    # Eliminar
    if (isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];

        $eliminado = eliminarCategoria($conexion, $id);

        if ($eliminado){
            $_SESSION['mensaje']= "Eliminado correctamente";
        } else {
            $_SESSION['mensaje']= "No se pudo eliminar";
        }
    }

    #Editar
    

}catch(Exception $ex) {
    $_SESSION['mensaje'] = $ex->getMessage();
}


# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $categorias= obtenerCategoriasPorNombre($conexion, $nombre);
}



# incluir la vista
require_once 'vistas/categorias_vistas.php';