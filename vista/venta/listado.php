<table class="table table-border table-striped">
    <thead>
        <tr>
            <th width="30">N</th>
            <th>Cliente</th>
            <th>Nit</th>
            <th>Total</th>
            <th>Cancelado</th>
            <th>Cambio</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($ventas as $venta) {
            $i++;

        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $venta['cliente']; ?></td>
                <td><?php echo $venta['nit']; ?></td>
                <td><?php echo $venta['total']; ?></td>
                <td><?php echo $venta['cancelado']; ?></td>
                <td><?php echo $venta['cambio']; ?></td>
                <td><?php echo $venta['fecha'] . " " . $venta['hora']; ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>