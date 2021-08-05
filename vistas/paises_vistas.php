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

            <input type="hidden" name="idPais" value="<?= $idPais ?>">

            <label for="inputNombrePais">Nombre del Pais: </label>
            <input type="text" name="inputNombrePais" id="inputNombrePais" class="form-control"
                placeholder="Escribe el nombre del pais" value="<?= $nombrePais ?>">

                <button type="submit" name="btnGuardarDatos" class="btn btn-dark"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i> Guardar Datos</button>
            </div>

        </form>

        <div>
            <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
        </div>

        <form action="">
            <div class="mt-3">
                <label class="" for="">Filtrar Nombre del Pais: </label>
                
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
                <th scope="col">pais</th>
                <th scope="col">fecha modificado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
    while($datos = mysqli_fetch_assoc($paises)) {
    
            echo "<tr>
                <th scope='row'>{$datos['country_id']}</th>
                <td>{$datos['country']}</td>
                <td>{$datos['last_update']}</td>
                <td>
                <a href= 'paises.php?eliminar={$datos['country_id']}'> <i> <button class='btn btn-outline-danger btn-sm' title='Eliminar pais' name='eliminar' value='{$datos['country_id']}'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></i></a>
                <a href= 'paises.php?editar={$datos['country_id']}'> <i> <button class='btn btn-outline-info btn-sm' title='Editar pais' name='editar' value='{$datos['country_id']}'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></i></a>
                    </td>
                </tr>";
}
    ?>

            </body>
    </table>

</div>

<?php require_once 'partes/foot.php';?>