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

            <input type="hidden" name="idIdioma" value="<?= $idIdioma ?>">

            <label for="inputNombreIdioma">Nombre del Idioma: </label>
            <input type="text" name="inputNombreIdioma" id="inputNombreIdioma" class="form-control"
                placeholder="Escribe el nombre del idioma" value="<?= $nombreIdioma ?>">

                <button type="submit" name="btnGuardarDatos" class="btn btn-dark"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i> Guardar Datos</button>
            </div>

        </form>

        <div>
            <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
        </div>

        <form action="">
            <div class="mt-3">
                <label class="" for="">Filtrar Nombre del Idioma: </label>
                
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
                <th scope="col">idioma</th>
                <th scope="col">fecha modificado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
    while($datos = mysqli_fetch_assoc($idiomas)) {
    
   echo "<tr>
      <th scope='row'>{$datos['language_id']}</th>
      <td>{$datos['name']}</td>
      <td>{$datos['last_update']}</td>
      <td>
      <a href= 'idiomas.php?eliminar={$datos['language_id']}'> <i> <button class='btn btn-outline-danger btn-sm' title='Eliminar idioma' name='eliminar' value='{$datos['language_id']}'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></i></a>
      <a href= 'idiomas.php?editar={$datos['language_id']}'> <i> <button class='btn btn-outline-info btn-sm' title='Editar idioma' name='editar' value='{$datos['language_id']}'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></i></a>
    </td>
    </tr>";
}
    ?>

            </body>
    </table>

</div>

<?php require_once 'partes/foot.php';?>