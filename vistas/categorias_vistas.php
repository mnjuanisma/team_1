<?php #Se conoce como vista  ?>

<?php require_once 'partes/head.php'; ?>

<?php require_once 'partes/menu.php'; ?>

<div class="bg-light">
    <div class="container">
        <h1 class="display-1 py-5"> <?php echo $pagina; ?></h1>
    </div>
</div>

<!-- formulario -->

<hr>

<div class="container">
    <div class="group-form">
        <form action="" method="post">

            <input type="hidden" name="idCategoria" value="<?= $idCategoria ?>">

            <label for="inputNombreCategoria">Nombre de la Categoria: </label>
            <input type="text" name="inputNombreCategoria" id="inputNombreCategoria" class="form-control"
                placeholder="Escribe el nombre de la categoria" value="<?= $nombreCategoria ?>">

                <button type="submit" name="btnGuardarDatos" class="btn btn-dark"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i> Guardar Datos</button>
            </div>

        </form>

        <div>
            <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
        </div>

        <form action="">
            <div class="mt-3">
                <label class="" for="">Filtrar Nombre de la Categoria: </label>
                
                <input name="nombre" type="text" class="form-control" placeholder="Escribe Aqui">

                <button name="buscar" class="btn btn-dark mt-3"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>


<hr>


<!-- Tabla -->

<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nombre</th>
                <th scope="col">fecha modificado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <body>

            <?php
    while($datos = mysqli_fetch_assoc($categorias)) {
    
   echo "<tr>
      <th scope='row'>{$datos['category_id']}</th>
      <td>{$datos['name']}</td>
      <td>{$datos['last_update']}</td>
      <td>
        <button class='btn btn-outline-danger btn-sm' title='Eliminar categoria' name='eliminar' value='{$datos['category_id']}'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>
        <button class='btn btn-outline-info btn-sm' title='Editar categoria' name='editar' value='{$datos['category_id']}'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button>
    </td>
    </tr>";
}
    ?>

        </body>
    </table>

</div>

<?php require_once 'partes/foot.php';?>