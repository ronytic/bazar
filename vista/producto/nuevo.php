<form action="./?c=Producto&m=guardar" method="POST" enctype="multipart/form-data">
    Nombre Producto
    <input type="text" name="nombre" class="form-control">
    Precio Producto
    <input type="number" name="precio" class="form-control" min="0" step="0.01">
    Descripcion Producto
    <input type="text" name="descripcion" class="form-control">
    Foto del Producto
    <input type="file" name="foto" class="form-control" accept=".jpg">
    <br>
    <input type="submit" value="Guardar" class="btn btn-success">
</form>