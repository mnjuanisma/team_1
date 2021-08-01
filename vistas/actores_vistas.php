<?php #Se conoce como vista  ?>

<?php require_once 'partes/head.php'; ?>

<?php  require_once 'partes/menu.php'; ?>

<div class="bg-light">
    <div class="container">
        <h1 class="display-1 py-5"> <?php echo $pagina; ?></h1>
    </div>
</div>

<!-- formulario -->
<hr>

<form action="" method="post" class="container">
    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre">
    </div>

    <br>

    <div>
        <label for="">Apellido</label>
        <input type="text" name="apellido">
    </div>

    <br>

    <div>
        <button name="guardar">Guardar</button>
    </div>
</form>

<hr>

<div class="container">
    <form action="">
        <div class="form-group">
            <input name="nombre" type="text" class="form-control" placeholder="Escribe para buscar">
            <button name="buscar" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <br>
</div>

<div>
    <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
</div>

<hr>



<!-- Tabla -->
<div class="container">

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nombre actor</th>
                <th scope="col">apellido actor</th>
                <th scope="col">fecha modificado</th>
            </tr>
        </thead>

        <body>
            <?php
    while($datos = mysqli_fetch_assoc($resultado)) {
    
   echo "<tr>
      <th scope='row'>{$datos['actor_id']}</th>
      <td>{$datos['first_name']}</td>
      <td>{$datos['last_name']}</td>
      <td>{$datos['last_update']}</td>
    </tr>";
}
  ?>

        </body>
    </table>

</div>

<?php require_once 'partes/foot.php';?>