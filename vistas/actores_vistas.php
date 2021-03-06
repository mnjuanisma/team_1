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

            <input type="hidden" name="id" value="<?php echo $info['actor_id'] ?? '';?>">

            <label for="inputNombreActor">Nombre del Actor: </label>
            <input type="text" name="inputNombreActor" id="inputNombreActor" class="form-control"
                placeholder="Escribe el nombre del actor" value="<?php echo $info['first_name'] ?? '';?>">

            <label class="mt-3" for="inputApellidoActor">Apellido del Actor: </label>
            <input type="text" name="inputApellidoActor" id="inputApellidoActor" class="form-control"
                placeholder="Escribe el apellido del actor" value="<?php echo $info['last_name'] ?? '';?>">
            
            <div class="mt-3">
                <button type="submit" name="btnGuardarDatos" class="btn btn-dark"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i> Guardar Datos</button>
            </div>

        </form>

        <div>
            <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
        </div>

        <form action="">
            <div class="mt-3">
                <label class="" for="">Filtrar Nombre del Actor: </label>
                
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
                <th scope="col">Actor_id</th>
                <th scope="col">First_name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Last_update</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>


<?php
        while($actor = mysqli_fetch_assoc($actores)){
          echo "<tr>
                    <th scope='row'>{$actor['actor_id']}</th>
                    <td>{$actor['first_name']}</td>
                    <td>{$actor['last_name']}</td>
                    <td>{$actor['last_update']}</td>
                    <td>
                    <a href= 'actores.php?eliminar={$actor['actor_id']}'> <i> <button class='btn btn-outline-danger btn-sm' title='Eliminar actor' name='eliminar' value='{$actor['actor_id']}'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></i></a> 
                    <a href= 'actores.php?editar={$actor['actor_id']}'> <i> <button class='btn btn-outline-info btn-sm' title='Editar actor' name='editar' value='{$actor['actor_id']}'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button></i></a> 
                    </td>
                </tr>";
        }
      ?>
        </tbody>
    </table>
</div>

<?php require_once 'partes/foot.php';?>