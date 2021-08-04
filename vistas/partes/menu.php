<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <h5 class="text-white h4">MENU</h5>


        <ul class="nav nav-pills nav-fill">
            <?php

        $enlaces = [
            'actores.php' => 'Actores',
            'categorias.php' => 'Categorias',
            'idiomas.php' => 'Idiomas',
            'paises.php' => 'Paises'
        ];

            $paginaActual = $_SERVER['REQUEST_URI'];

            foreach($enlaces as $ruta => $enlace) {
                $activo = "";

            if ( strpos($paginaActual, $ruta)){
                $activo = "active";
            }

            echo 
            "<li class='nav-item'>
                <a class='nav-link $activo' href='{$ruta}'>$enlace</a>
            </li>";

}

?>
        </ul>

    </div>
</div>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>