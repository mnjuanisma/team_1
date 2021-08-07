<?php
# Este se considera un controlador

require_once "models/actores_models.php";


$pagina = "Actores";


$actores = obtenerActores($conexion);

$nombreActor = $_POST['nombreActor'] ?? "";
$apellidoActor = $_POST['apellidoActor'] ?? "";
$id = $_POST['id'] ?? "";

try {
    if (isset($_POST['btnGuardarDatos'])){
        $nombreActor = $_POST['inputNombreActor'] ?? "";
        $apellidoActor = $_POST['inputApellidoActor'] ?? "";
        $id = $_POST['id'] ?? "";
    
        # Validar los datos
        if (empty($nombreActor)){
            throw new Exception("El nombre no puede estar vacio");
        }
    
        if (empty($apellidoActor)){
            throw new Exception("El apellido no puede estar vacio");
        }

        $datos = compact('nombreActor', 'apellidoActor');

        # Si el id está vacío, se va a insertar
        if (empty($id)){
            $insertado = insertarActor($conexion, $datos);
    
            if ($insertado){
                $_SESSION['mensaje'] = 'Datos insertados correctamente';
            } else {
                $_SESSION['mensaje'] = 'Datos no insertados';
            }

        } else {
            # De lo contrario, se va actualizar 
            $datos['id'] = $id;

            $actualizado = actualizarActor($conexion, $datos);

            if ($actualizado){
                $_SESSION['mensaje']= 'Datos actualizados correctamente';
            }
        }
    
        # prevenir reenvio del formulario
        refrezcar("actores.php");
     
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

        refrezcar("actores.php");
    }

    #Editar
    if (isset($_GET['editar'])){

        $id = $_GET['editar'];

        #conseguir la informacion de la base de datos
        $result = obtenerActoresPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }

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