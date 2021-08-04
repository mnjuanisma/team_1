<?php
# Este se considera un controlador

require_once "models/idiomas_models.php";

$pagina = "Idiomas";


$idiomas = obtenerIdiomas($conexion);

$nombreIdioma = $_POST['nombreIdioma'] ?? "";


if (isset($_POST['btnGuardarDatos'])){
    
    $nombreIdioma = $_POST['inputNombreIdioma'] ?? "";

    $datos = compact('nombreIdioma');

    $insertado = insertarIdioma($conexion, $datos);

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

        $idiomas= obtenerIdiomasPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/idiomas_vistas.php';