<?php
require_once  "modelo/BD.php";
class CompraModelo extends BD
{
    function __construct()
    {
        parent::__construct();
        $this->nombreTabla = 'compra';
    }

    function totalCompra($idProducto)
    {
        $respuesta = $this->seleccionar('sum(cantidad) as total', "id_producto = $idProducto");
        $total = $respuesta[0]['total'] ?? 0;
        return $total;
    }
}
