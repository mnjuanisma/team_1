<?php
# Este se considera un controlador

require_once "models/actores_models.php";


$pagina = "Actores";


$resultado = obtenerActores($conexion);




if (isset($_POST['guardar'])){
    $nombre = $_POST['nombre'] ?? "";
    $apellido = $_POST['apellido'] ?? "";

    $datos = compact('nombre', 'apellido');
    

    $insertado = insertarActor($conexion, $datos);

    if ($insertado){
        $_SESSION['mensaje'] = 'Datos insertados correctamente';
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