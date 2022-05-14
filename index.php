<?php
$c = $_GET['c'] ?? 'Principal';
$m = $_GET['m'] ?? 'inicio';

//Establecer la zona horario de la Paz
date_default_timezone_set('America/La_Paz');

// Colocar el mayuscula el primer caracter de la clase
$c = ucfirst($c);

require_once "controlador/" . $c . ".php";
// Instancias de Clase Dinamica
$objeto = new $c();
$objeto->$m();
