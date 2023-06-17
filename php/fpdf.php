<?php 
require 'conexion.php'; require 'FPDF/fpdf.php';
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Restaurante Le Macia - Resumen de tu pedido',"B",0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',13);
$cabecera = false;
session_start();
$correo = $_SESSION['correo'];
$mostrar = "SELECT c.nombre, ca.precio, ca.cantidad FROM carrito ca
            INNER JOIN comida c ON ca.idComida = c.id
            WHERE ca.idPedido = '$correo'";
$Tabla = $conexion->query($mostrar); 
$total = 0;
while($Registro = $Tabla->fetch_assoc()){
    if(!$cabecera){
        foreach($Registro as $indice=>$valor){
            $pdf->Cell(50,10,$indice);
        }
        $cabecera = true;
        $pdf->Ln(10);
    }
    foreach($Registro as $indice=>$valor){
        $pdf->Cell(50,10,$valor);
    }
    $subtotal = $Registro['precio'] * $Registro['cantidad'];
    $total += $subtotal;
    $pdf->Ln(10);
}

$pdf->Cell(0,10,'Total: '.$total.' Euros',0,0,'R'); // Imprimir el total en el PDF
$Tabla->free();
$conexion->close();
$pdf->Output();
?>




