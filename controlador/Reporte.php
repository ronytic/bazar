<?php
class Reporte
{
    function index()
    {
        //llamar a la vista
        $titulo = 'Reporte de Ventas';
        $vista = "vista/reporte/ventas.php";
        require_once 'vista/cargador.php';
    }

    function venta()
    {

        // SACAR LOS DATOS DE LA VENTA
        //LLamar al modelo venta
        require_once 'modelo/VentaModelo.php';
        $ventaModelo = new VentaModelo();
        $ventas = $ventaModelo->seleccionar("*", 'estado=1');



        //GENERANDO EL PDF
        require_once 'librerias/fpdf/fpdf.php';

        // $pdf = new FPDF('L', 'mm', array(350, 50));
        $pdf = new PDF('L', 'mm', 'letter');
        $pdf->AddPage(); // Adicionar pagina
        $pdf->AliasNbPages(); // Para que muestre el total de paginas

        // $pdf->SetFont('Arial', 'BU', 14); // Establecer fuente

        // $pdf->Cell(0, 10, 'Reporte de Ventas', 0, 0, 'C'); // Imprimir texto

        $pdf->ln(10); // Salto de linea
        $pdf->ln();

        $pdf->SetFont('Arial', 'B', 12); // Establecer fuente
        $pdf->Cell(10, 10, "N", 1, "", "C"); // Imprimir texto
        $pdf->Cell(50, 10, "Cliente", 1, "", "C"); // Imprimir texto
        $pdf->Cell(30, 10, "Nit", 1, "", "C"); // Imprimir texto
        $pdf->Cell(40, 10, "Total", 1, "", "C"); // Imprimir texto
        $pdf->Cell(40, 10, "Cancelado", 1, "", "C"); // Imprimir texto
        $pdf->Cell(40, 10, "Cambio", 1, "", "C"); // Imprimir texto
        $pdf->Cell(50, 10, "Fecha/Hora", 1, "", "C"); // Imprimir texto
        $pdf->ln();


        $pdf->SetFont('Arial', '', 10); // Establecer fuente de celda
        //Armar el cuerpo de la tabla
        $i = 0;
        $totalgeneral = 0;
        foreach ($ventas as $venta) {
            $i++;
            $pdf->Cell(10, 10, $i, 1, "", "C"); // Imprimir texto
            $pdf->Cell(50, 10, $venta['cliente'], 1, "", "L"); // Imprimir texto
            $pdf->Cell(30, 10, $venta['nit'], 1, "", "R"); // Imprimir texto
            $pdf->Cell(40, 10, $venta["total"], 1, "", "R"); // Imprimir texto
            $pdf->Cell(40, 10, $venta["cancelado"], 1, "", "R"); // Imprimir texto
            $pdf->Cell(40, 10, $venta["cambio"], 1, "", "R"); // Imprimir texto
            $pdf->Cell(50, 10, $venta["fecha"] . " " . $venta["hora"], 1, "", "R"); // Imprimir texto
            $pdf->ln();
            $totalgeneral += $venta["total"];
        }
        $pdf->SetFont('Arial', 'B', 12); // Establecer fuente de celda
        $pdf->cell(90, 10, "Total General:", 1, "", "R");
        $pdf->cell(40, 10, $totalgeneral, 1, "", "R");

        // $pdf->AddPage(); // Adicionar pagina
        // $pdf->AddPage(); // Adicionar pagina
        // $pdf->AddPage(); // Adicionar pagina
        // $pdf->AddPage(); // Adicionar pagina
        // $pdf->AddPage(); // Adicionar pagina






        $pdf->Output();
    }
}
require_once 'librerias/fpdf/fpdf.php';
require_once "librerias/phpqrcode/qrlib.php";
class PDF extends FPDF
{
    function Header()
    {

        $codeContents = date("Y-m-d H:i:s") . sha1("tucontraseña");

        $pngAbsoluteFilePath = 'imagenes/qr/qrcode.png';

        QRcode::png($codeContents, $pngAbsoluteFilePath);




        $this->Image('imagenes/logo/logotienda.jpg', 5, 3, 25, 25);
        $this->Image($pngAbsoluteFilePath, 235, 3, 27, 27);

        $this->SetFont('Arial', 'BU', 14); // Establecer fuente

        $this->Cell(0, 10, 'Reporte de Ventas', 0, 0, 'C'); // Imprimir texto
    }

    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
