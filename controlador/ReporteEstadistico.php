<?php
class ReporteEstadistico
{
    function index()
    {
        //llamar al modelo venta detalle
        require_once 'modelo/VentaDetalleModelo.php';
        $ventaDetalle = new VentaDetalleModelo();


        $enero = $ventaDetalle->totalVentasXMes(1);
        $febrero = $ventaDetalle->totalVentasXMes(2);
        $marzo = $ventaDetalle->totalVentasXMes(3);
        $abril = $ventaDetalle->totalVentasXMes(4);
        $mayo = $ventaDetalle->totalVentasXMes(5);
        $junio = $ventaDetalle->totalVentasXMes(6);
        $julio = $ventaDetalle->totalVentasXMes(7);
        $agosto = $ventaDetalle->totalVentasXMes(8);
        $septiembre = $ventaDetalle->totalVentasXMes(9);
        $octubre = $ventaDetalle->totalVentasXMes(10);
        $noviembre = $ventaDetalle->totalVentasXMes(11);
        $diciembre = $ventaDetalle->totalVentasXMes(12);



        //llamamos a la vista
        $titulo = 'Reporte Estadístico';
        $vista = 'vista/reporteestadistico/reporte.php';
        require_once "vista/cargador.php";
    }


    function index2()
    {
        //llamar al modelo venta detalle
        require_once 'modelo/VentaDetalleModelo.php';
        $ventaDetalle = new VentaDetalleModelo();


        $enero = $ventaDetalle->totalVentasXMes(1);
        $febrero = $ventaDetalle->totalVentasXMes(2);
        $marzo = $ventaDetalle->totalVentasXMes(3);
        $abril = $ventaDetalle->totalVentasXMes(4);
        $mayo = $ventaDetalle->totalVentasXMes(5);
        $junio = $ventaDetalle->totalVentasXMes(6);
        $julio = $ventaDetalle->totalVentasXMes(7);
        $agosto = $ventaDetalle->totalVentasXMes(8);
        $septiembre = $ventaDetalle->totalVentasXMes(9);
        $octubre = $ventaDetalle->totalVentasXMes(10);
        $noviembre = $ventaDetalle->totalVentasXMes(11);
        $diciembre = $ventaDetalle->totalVentasXMes(12);

        //llamamos a la vista
        $titulo = 'Reporte Estadístico';
        $vista = 'vista/reporteestadistico/reporte2.php';
        require_once "vista/cargador.php";
    }
}
