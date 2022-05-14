<?php

interface CRUD
{
    public function nuevo();
    public function guardar();
    public function listar();
    public function modificar();
    public function actualizar();
    public function eliminar();
}
