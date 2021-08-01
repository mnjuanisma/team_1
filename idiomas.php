<?php
# Este se considera un controlador

require_once "models/idiomas_models.php";

$pagina = "Idiomas";


$resultado = obtenerIdiomas($conexion);



if (isset($_POST['guardar'])){
    $idioma = $_POST['idioma'] ?? "";

    $datos = compact('idioma');
    

    $insertado = insertarIdioma($conexion, $datos);

    if ($insertado){
        $_SESSION['mensaje'] = 'Datos insertados correctamente';
    }

    # prevenir reenvio del formulario
}

# Cuando el usuario HAGA CLICK en el boton buscar

if (isset($_GET['buscar'])) {   
    
    $nombre = $_GET['nombre'] ?? "";

        $resultado= obtenerIdiomasPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/idiomas_vistas.php';