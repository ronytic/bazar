<?php
require_once  "modelo/BD.php";
class ProductoModelo extends BD
{
    function __construct()
    {
        parent::__construct();
        $this->nombreTabla = 'producto';
    }
}
