<form action="./?c=venta&m=guardar" method="POST">
    <table class="table table-border">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="contenido">

        </tbody>
        <tfoot>
            <tr>
                <th><a href="#" class="btn btn-info" id="anadir">+</a></th>
                <th class="text-right">Nombre</th>
                <th>
                    <input type="text" name="nombre" value="" class="form-control">
                </th>
                <th class="text-right">Total</th>
                <th>
                    <input type="text" name="total" value="0" readonly class="form-control text-right" id="totalgeneral">
                </th>
            </tr>
            <tr>
                <th></th>
                <th class="text-right">
                    Nit o Carnet
                </th>
                <th>
                    <input type="text" name="nit" value="" class="form-control">
                </th>
                <th class="text-right">Cancelado</th>
                <th>
                    <input type="text" name="cancelado" value="" class="form-control text-right" id="cancelado">
                </th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </th>
                <th class="text-right">Cambio</th>
                <th>
                    <input type="text" name="cambio" value="0" readonly class="form-control text-right" id="cambio">
                </th>
            </tr>
        </tfoot>
    </table>
</form>