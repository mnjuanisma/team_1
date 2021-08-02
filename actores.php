<?php
# Este se considera un controlador

require_once "models/actores_models.php";


$pagina = "Actores";


$actores = obtenerActores($conexion);

$nombreActor = $_POST['nombreActor'] ?? "";
$apellidoActor = $_POST['apellidoActor'] ?? "";


if (isset($_POST['btnGuardarDatos'])){
    $nombreActor = $_POST['inputNombreActor'] ?? "";
    $apellidoActor = $_POST['inputApellidoActor'] ?? "";

    $datos = compact('nombreActor', 'apellidoActor');

    $insertado = insertarActor($conexion, $datos);

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

        $resultado= obtenerActoresPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/actores_vistas.php';