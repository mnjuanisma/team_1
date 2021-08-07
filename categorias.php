<?php
# Este se considera un controlador

require_once "models/categorias_models.php";

$pagina = "Categorías";


$categorias = obtenerCategorias($conexion);

$nombreCategoria = $_POST['nombreCategoria'] ?? "";
$id = $_POST['id'] ?? "";

try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombreCategoria = $_POST['inputNombreCategoria'] ?? "";
        $id = $_POST['id'] ?? "";

        # Validar los datos
        if (empty($nombreCategoria)){
            throw new Exception("El nombre no puede estar vacio");
        }
        
        $datos = compact('nombreCategoria');

        # Si el id está vacío, se va a insertar
        if (empty($id)){
            $insertado = insertarCategoria($conexion, $datos);
    
            if ($insertado){
                $_SESSION['mensaje'] = 'Datos insertados correctamente';
            } else {
                $_SESSION['mensaje'] = 'Datos no insertados';
            }

        } else {
            # De lo contrario, se va actualizar 
            $datos['id'] = $id;

            $actualizado = actualizarCategoria($conexion, $datos);

            if ($actualizado){
                $_SESSION['mensaje']= 'Datos actualizados correctamente';
            }
        }

        # prevenir reenvio del formulario
        refrezcar("categorias.php");

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
        refrezcar("categorias.php");
    }

    #Editar
    if (isset($_GET['editar'])){

        $id = $_GET['editar'];

        #conseguir la informacion de la base de datos
        $result = obtenerCategoriasPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }

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