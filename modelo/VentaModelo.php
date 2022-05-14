<?php
require_once  "modelo/BD.php";
class VentaModelo extends BD
{
    function __construct()
    {
        parent::__construct();
        $this->nombreTabla = 'venta';
    }
}
