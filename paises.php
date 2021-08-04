<?php
# Este se considera un controlador

require_once "models/paises_models.php";

$pagina = "Países";


$paises = obtenerPaises($conexion);

$nombrePais = $_POST['nombrePais'] ?? "";

if (isset($_POST['btnGuardarDatos'])){
    
    $nombrePais = $_POST['inputNombrePais'] ?? "";

    $datos = compact('nombrePais');

    $insertado = insertarPais($conexion, $datos);

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

        $paises= obtenerPaisesPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/paises_vistas.php';