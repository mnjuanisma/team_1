<?php
# Este se considera un controlador

require_once "models/paises_models.php";

$pagina = "Países";


$resultado = obtenerPaises($conexion);



if (isset($_POST['guardar'])){
    $pais = $_POST['pais'] ?? "";
    

    $datos = compact('pais');
    

    $insertado = insertarPais($conexion, $datos);

    if ($insertado){
        $_SESSION['mensaje'] = 'Datos insertados correctamente';
    }

    # prevenir reenvio del formulario
}

# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $resultado= obtenerPaisesPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/paises_vistas.php';