<?php
# Este se considera un controlador

require_once "models/idiomas_models.php";

$pagina = "Idiomas";


$idiomas = obtenerIdiomas($conexion);

$nombreIdioma = $_POST['nombreIdioma'] ?? "";


try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombreIdioma = $_POST['inputNombreIdioma'] ?? "";

        # Validar los datos
        if (empty($nombreIdioma)){
            throw new Exception("El nombre no puede estar vacio");
        }

        $datos = compact('nombreIdioma');

        $insertado = insertarIdioma($conexion, $datos);

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

        $eliminado = eliminarIdioma($conexion, $id);

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

        $idiomas= obtenerIdiomasPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/idiomas_vistas.php';