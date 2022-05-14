<tr>
    <td>
        <select name="p[<?= $contador ?>][id_producto]" class="form-control producto" data-fila="<?= $contador ?>">
            <option>Seleccione</option>
            <?php
            foreach ($productos as $producto) {
                echo "<option value='{$producto['id_producto']}'>{$producto['nombre']}</option>";
            }

            ?>
        </select>
        <img class="foto" height="80" data-fila="<?= $contador ?>">
    </td>
    <td>
        <input type="text" name="p[<?= $contador ?>][stock]" value="0" readonly class="form-control text-right stock" data-fila="<?= $contador ?>">
    </td>
    <td>
        <input type="text" name="p[<?= $contador ?>][precio]" value="0" class="form-control text-right precio" data-fila="<?= $contador ?>" readonly>
    </td>
    <td>
        <input type="number" name="p[<?= $contador ?>][cantidad]" value="" class="form-control text-right cantidad" data-fila="<?= $contador ?>" min="0">
    </td>
    <td>
        <input type="text" name="p[<?= $contador ?>][subtotal]" value="0" readonly class="form-control text-right total" data-fila="<?= $contador ?>">
    </td>
</tr>