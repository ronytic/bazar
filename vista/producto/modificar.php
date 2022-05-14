<form action="./?c=Producto&m=actualizar" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">

    Nombre Producto
    <input type="text" name="nombre" class="form-control" value="<?= $producto['nombre'] ?>">
    Precio Producto
    <input type="number" name="precio" class="form-control" min="0" step="0.01" value="<?= $producto['precio'] ?>">
    Descripcion Producto
    <input type="text" name="descripcion" class="form-control" value="<?= $producto['descripcion'] ?>">
    Foto del Producto
    <input type="file" name="foto" class="form-control" accept=".jpg">
    <img src="<?= $producto['foto'] ?>" width="100">
    <br>
    <input type="submit" value="Actualizar" class="btn btn-success">
</form>