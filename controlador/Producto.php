<?php
require_once "iCRUD.php";
class Producto implements CRUD
{
    public function nuevo()
    {
        //Llamando a una vista
        $titulo = "Nuevo Producto";
        $vista = "vista/producto/nuevo.php";
        require_once "vista/cargador.php";
    }

    public function guardar()
    {
        // 1.- Recibir los valores enviados
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        // para recuperar el file
        $foto = $_FILES['foto'];
        // 2.- Validar los datos
        // echo $nombre . "<br>";
        // echo $precio . "<br>";
        // echo $descripcion . "<br>";

        // echo "<pre>";
        // print_r($foto);
        // echo "</pre>";

        // Verificar que la foto es obligatoria
        if ($foto['error'] == 4) {
            $mensaje = "La foto es obligatoria";
            exit;
        } else {
            // Preguntar si la foto es menor a 2MB
            if ($foto['size'] <= 2 * 1024 * 1024) {
                if ($foto['type'] == 'image/jpg' || $foto['type'] == 'image/jpeg') {
                    $fechatemporal = date("YmdHis");
                    $nombreFoto = $fechatemporal . "_" . $foto['name'];
                    $destinoFoto = 'imagenes/productos/' . $nombreFoto;
                    copy($foto['tmp_name'], $destinoFoto);
                } else {
                    $mensaje = "El formato de la foto no es valido";
                }
            } else {
                $mensaje = "El archivo es mayor a 2MB";
            }
        }

        // DEBEMOS DE ENVIAR LOS 4 VALORES AL MODELO
        if (isset($destinoFoto) && $destinoFoto != '') {
            $valores = [
                'nombre' => $nombre,
                'precio' => $precio,
                'descripcion' => $descripcion,
                'foto' => $destinoFoto
            ];

            // Instancia para el Modelo
            require_once "modelo/ProductoModelo.php";
            $productoModelo = new ProductoModelo();
            $respuesta = $productoModelo->insertValores($valores);

            if ($respuesta) {
                $mensaje = "Producto guardado correctamente";
            } else {
                $mensaje = "Error al guardar el producto";
            }
        }



        //Llamando a la vista
        $titulo = "Nuevo Producto";
        $vista = "vista/producto/mensaje.php";
        require_once "vista/cargador.php";
    }

    public function listar()
    {
        $p = $_GET['p'] ?? 1;

        // Instancia para el Modelo Producto
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        // Seleccionando todos los productos
        $productos = $productoModelo->seleccionar('*', 'estado = 1');

        //AQUI COMIENZA PAGINACION
        //Total de Productos
        $totalProductos = count($productos);
        // Entre cuanto vamos a dividir, o cuantos elementos se veran por pagina
        $paginacion = 4;
        // Realizamos la division y redondeamos hacia arriba
        $paginas = ceil($totalProductos / $paginacion);

        $inicioCorte = ($p - 1) * $paginacion;
        $productos = array_slice($productos, $inicioCorte, $paginacion);
        // AQUI TERMINA PAGINACION
        // echo "<pre>";
        // print_r($productos);
        // echo "</pre>";

        //Llamando a una vista
        $titulo = "Listado de Productos";
        $vista = "vista/producto/listar.php";
        require_once "vista/cargador.php";
    }

    public function eliminar()
    {
        $id = $_GET['id'];
        // Instancia para el Modelo Producto
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $respuesta = $productoModelo->eliminarRegistro("id_producto = $id");

        if ($respuesta) {
            $mensaje = "Producto eliminado correctamente";
        } else {
            $mensaje = "Error al eliminar el producto";
        }
        // Llama a la vista
        $titulo = "Eliminar Producto";
        $vista = "vista/producto/mensaje.php";
        require_once "vista/cargador.php";
    }

    public function modificar()
    {
        $id = $_GET['id'];
        // Instancia para el Modelo Producto
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $producto = $productoModelo->seleccionar('*', "id_producto = $id");
        $producto = $producto[0];


        // echo "<pre>";
        // print_r($producto);
        // echo "</pre>";

        // Llamando a una vista
        $titulo = "Modificar Producto";
        $vista = "vista/producto/modificar.php";
        require_once "vista/cargador.php";
    }

    public function actualizar()
    {
        // 1.- Recibir los valores enviados
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        // para recuperar el file
        $foto = $_FILES['foto'];
        // echo "<pre>";
        // print_r($foto);
        // echo "</pre>";
        // exit();
        if ($foto['name'] != '') {
            // Preguntar si la foto es menor a 2MB
            if ($foto['size'] <= 2 * 1024 * 1024) {
                if ($foto['type'] == 'image/jpg' || $foto['type'] == 'image/jpeg') {

                    $fechatemporal = date("YmdHis");
                    $nombreFoto = $fechatemporal . "_" . $foto['name'];
                    $destinoFoto = 'imagenes/productos/' . $nombreFoto;
                    copy($foto['tmp_name'], $destinoFoto);
                } else {
                    $mensaje = "El formato de la foto no es valido";
                }
            } else {
                $mensaje = "El archivo es mayor a 2MB";
            }
        }

        // DEBEMOS DE ENVIAR LOS 4 VALORES AL MODELO
        $valores = [
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
        ];

        if (isset($destinoFoto) && $destinoFoto != '') {
            $valores['foto'] = $destinoFoto;
        }

        // Instancia para el Modelo
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $respuesta = $productoModelo->actualizarRegistro($valores, "id_producto = " . $id);

        if ($respuesta) {
            $mensaje = "Producto actualizado correctamente";
        } else {
            $mensaje = "Error al actualizar el producto";
        }

        // Llama a la vista
        $titulo = "Actualizar Producto";
        $vista = "vista/producto/mensaje.php";
        require_once "vista/cargador.php";
    }
}
