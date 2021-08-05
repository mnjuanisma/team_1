<?php
# Este se considera un controlador

require_once "models/actores_models.php";


$pagina = "Actores";


$actores = obtenerActores($conexion);

$nombreActor = $_POST['nombreActor'] ?? "";
$apellidoActor = $_POST['apellidoActor'] ?? "";


try {
    if (isset($_POST['btnGuardarDatos'])){
        $nombreActor = $_POST['inputNombreActor'] ?? "";
        $apellidoActor = $_POST['inputApellidoActor'] ?? "";
    
        # Validar los datos
        if (empty($nombreActor)){
            throw new Exception("El nombre no puede estar vacio");
        }
    
        if (empty($apellidoActor)){
            throw new Exception("El apellido no puede estar vacio");
        }
    
    
        $datos = compact('nombreActor', 'apellidoActor');
    
        $insertado = insertarActor($conexion, $datos);
    
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

        $eliminado = eliminarActor($conexion, $id);

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

        $actores= obtenerActoresPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/actores_vistas.php';