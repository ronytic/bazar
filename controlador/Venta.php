<?php
class Venta
{
    public function nuevo()
    {


        //Llamando a una vista
        $js = [
            'js/venta.js',
        ];
        $titulo = "Nueva Venta";
        $vista = "vista/venta/nuevo.php";
        require_once "vista/cargador.php";
    }

    public function anadir()
    {
        //llamada al modelo de producto
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $productos = $productoModelo->seleccionar('*', 'estado=1');

        $contador = $_GET['contador'];
        require_once "vista/venta/fila.php";
    }

    public function obtenerPrecio()
    {
        $idProducto = $_GET['idProducto'];
        //llamada al modelo de producto
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $producto = $productoModelo->seleccionar('*', "id_producto = $idProducto");
        $producto = $producto[0];

        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        $totalCompra = $compraModelo->totalCompra($idProducto);

        $stock = $totalCompra;

        $datosRespuesta = [
            'precio' => $producto['precio'],
            'foto' => $producto['foto'],
            'stock' => $stock,
        ];

        echo json_encode($datosRespuesta);
    }

    function guardar()
    {
        //1.- Recibir los valores enviados
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";

        $total = $_POST['total'];
        $nombre = $_POST['nombre'];
        $nit = $_POST['nit'];
        $cancelado = $_POST['cancelado'];
        $cambio = $_POST['cambio'];
        $p = $_POST['p'];


        $datosVenta = [
            'cliente' => $nombre,
            'nit' => $nit,
            'total' => $total,
            'cancelado' => $cancelado,
            'cambio' => $cambio,
        ];
        require_once "modelo/VentaModelo.php";
        $ventaModelo = new VentaModelo();
        $respuesta = $ventaModelo->insertValores($datosVenta);
        $idVenta = $ventaModelo->ultimoId();

        //Llamando al modelo venta detalle
        require_once "modelo/VentaDetalleModelo.php";
        $ventaDetalleModelo = new VentaDetalleModelo();


        foreach ($p as $prod) {
            $datosVentaDetalle = [
                'id_venta' => $idVenta,
                'id_producto' => $prod['id_producto'],
                'cantidad' => $prod['cantidad'],
                'precio' => $prod['precio'],
                'subtotal' => $prod['subtotal'],
            ];

            $ventaDetalleModelo->insertValores($datosVentaDetalle);
        }

        if ($respuesta) {
            $mensaje = "Venta realizada correctamente";
        } else {
            $mensaje = "Error al realizar la venta";
        }


        //Llamando a una vista
        $titulo = "Nueva Venta";
        $vista = "vista/venta/mensaje.php";
        require_once "vista/cargador.php";
    }

    function listar()
    {
        require_once "modelo/VentaModelo.php";
        $ventaModelo = new VentaModelo();
        $ventas = $ventaModelo->seleccionar('*', 'estado=1');

        //Llamando a una vista
        $titulo = "Listado de Ventas";
        $vista = "vista/venta/listado.php";
        require_once "vista/cargador.php";
    }
}
