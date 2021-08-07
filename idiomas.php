<?php
# Este se considera un controlador

require_once "models/idiomas_models.php";

$pagina = "Idiomas";


$idiomas = obtenerIdiomas($conexion);

$nombreIdioma = $_POST['nombreIdioma'] ?? "";
$id = $_POST['id'] ?? "";

try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombreIdioma = $_POST['inputNombreIdioma'] ?? "";
        $id = $_POST['id'] ?? "";

        # Validar los datos
        if (empty($nombreIdioma)){
            throw new Exception("El nombre no puede estar vacio");
        }

        $datos = compact('nombreIdioma');

       # Si el id está vacío, se va a insertar
       if (empty($id)){
        $insertado = insertarIdioma($conexion, $datos);

        if ($insertado){
            $_SESSION['mensaje'] = 'Datos insertados correctamente';
        } else {
            $_SESSION['mensaje'] = 'Datos no insertados';
        }

    } else {
        # De lo contrario, se va actualizar 
        $datos['id'] = $id;

        $actualizado = actualizarIdioma($conexion, $datos);

        if ($actualizado){
            $_SESSION['mensaje']= 'Datos actualizados correctamente';
        }
    }

        # prevenir reenvio del formulario
        refrezcar("idiomas.php");
}

    # Eliminar
    if (isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];

        $eliminado = eliminarIdioma($conexion, $id);

        if ($eliminado){
            $_SESSION['mensaje']= "Eliminado correctamente";
        } else {
            $_SESSION['mensaje']= "No se pudo eliminar";
        }
        refrezcar("idiomas.php");
    }

    #Editar
    if (isset($_GET['editar'])){

        $id = $_GET['editar'];

        #conseguir la informacion de la base de datos
        $result = obtenerIdiomasPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }

}catch(Exception $ex) {
    $_SESSION['mensaje'] = $ex->getMessage();
}

# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $idiomas= obtenerIdiomasPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/idiomas_vistas.php';