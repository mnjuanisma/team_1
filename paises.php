<?php
# Este se considera un controlador

require_once "models/paises_models.php";

$pagina = "Países";


$paises = obtenerPaises($conexion);

$nombrePais = $_POST['nombrePais'] ?? "";
$id = $_POST['id'] ?? "";

try {
    if (isset($_POST['btnGuardarDatos'])){
        
        $nombrePais = $_POST['inputNombrePais'] ?? "";
        $id = $_POST['id'] ?? "";

        # Validar los datos
        if (empty($nombrePais)){
            throw new Exception("El nombre no puede estar vacio");
        }

        $datos = compact('nombrePais');

        # Si el id está vacío, se va a insertar
        if (empty($id)){
            $insertado = insertarPais($conexion, $datos);
    
            if ($insertado){
                $_SESSION['mensaje'] = 'Datos insertados correctamente';
            } else {
                $_SESSION['mensaje'] = 'Datos no insertados';
            }

        } else {
            # De lo contrario, se va actualizar 
            $datos['id'] = $id;

            $actualizado = actualizarPais($conexion, $datos);

            if ($actualizado){
                $_SESSION['mensaje']= 'Datos actualizados correctamente';
            }
        }

        # prevenir reenvio del formulario
        refrezcar("paises.php");
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
        refrezcar("paises.php");
    }

    #Editar
    if (isset($_GET['editar'])){

        $id = $_GET['editar'];

        #conseguir la informacion de la base de datos
        $result = obtenerPaisesPorId($conexion, $id);

        $info = mysqli_fetch_assoc($result);
    }

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