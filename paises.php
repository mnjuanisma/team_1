<?php
# Este se considera un controlador

require_once "models/paises_models.php";

$pagina = "Países";


$paises = obtenerPaises($conexion);

$nombrePais = $_POST['nombrePais'] ?? "";


try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombrePais = $_POST['inputNombrePais'] ?? "";

        # Validar los datos
        if (empty($nombrePais)){
            throw new Exception("El nombre no puede estar vacio");
        }

        $datos = compact('nombrePais');

        $insertado = insertarPais($conexion, $datos);

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

        $eliminado = eliminarPais($conexion, $id);

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

        $paises= obtenerPaisesPorNombre($conexion, $nombre);
}

# incluir la vista
require_once 'vistas/paises_vistas.php';