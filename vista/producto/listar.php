<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th width="10">N</th>
            <th>Nombre</th>
            <th width="150">Precio</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $inicioCorte;
        foreach ($productos as $producto) {
            $i++;
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td class="text-right"><?= $producto['precio'] ?></td>
                <td>
                    <a href="<?= $producto['foto'] ?>" target="_blank">
                        <img src="<?= $producto['foto'] ?>" alt="" width="40">
                    </a>
                </td>
                <td>
                    <a href="?c=Producto&m=modificar&id=<?= $producto['id_producto'] ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>

                    <a href="?c=Producto&m=eliminar&id=<?= $producto['id_producto'] ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $paginas; $i++) {
        ?>
            <li class="page-item <?= $p == $i ? 'active' : '' ?>"><a class="page-link" href="./?c=Producto&m=listar&p=<?= $i ?>"><?= $i ?></a></li>
        <?php
        } ?>
    </ul>
</nav>