<div class="row">
    <?php
    // Mostrar los resultados de la búsqueda
    if ($resultado->num_rows > 0) {
        // Output data of each row
        while ($row = $resultado->fetch_assoc()) { ?>
            
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card">
                    <img src="../src/img/undraw_profile_1.svg" class="card-img-top small-img" alt="Image 1">
                    <div class="card-body">
                        <h5 class="card-title"> <span style="font-weight: bold; color: rgb(46, 89, 217);"><?php echo $row["titulo"] ?></span></h5>
                        <p class="card-text"> <?php echo $row["descripcion"] ?></p>
                        <p><strong><small><span style="font-weight: bold; color: rgb(46, 89, 217);">Autor:</span> <?php echo $row["usuario"] ?> </small></strong></p>
                        <p><strong><small><span style="font-weight: bold; color: rgb(46, 89, 217);">Publicado:</span> <?php echo $row["provincia"] ?> / <?php echo $row["ciudad_canton"] ?> </small></strong></p>
                        <a href="#" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div>

            <?php   }
    } else {
        echo "0 RESULTADOS";
    }
    ?>
</div>

<!-- Paginación -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($pagina != 1) { ?>
            <li class="page-item">
                <a class="page-link" href="?busqueda=<?= $busqueda ?>&pagina=<?= $pagina - 1 ?>">Previous</a>
            </li>
        <?php } ?>
        <?php for ($i = 1; $i <= $num_pags; $i++) { ?>
            <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                <a class="page-link" href="?busqueda=<?= $busqueda ?>&pagina=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php } ?>
        <?php if ($pagina != $num_pags) { ?>
            <li class="page-item">
                <a class="page-link" href="?busqueda=<?= $busqueda ?>&pagina=<?= $pagina + 1 ?>">Next</a>
            </li>
        <?php } ?>
    </ul>
</nav>
