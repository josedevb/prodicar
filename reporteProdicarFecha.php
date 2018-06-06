<?php
require('fpdf/fpdf.php');
require('core/core.php');

//$conexion=mysqli_connect("localhost","tesis_charcuteri","tesis_tesis","ocrendbb");
$conexion = mysqli_connect("localhost", "root", "", "ocrendbb");
$usuario = $_SESSION['app_id'];
$fechaini = $_GET['fechaini'];
$fechafin = $_GET['fechafin'];
$query = "SELECT *, datospersonales.nombre as usernombre, categorias.nombre as catenombre 
FROM datospersonales
INNER JOIN users ON datospersonales.iduser = users.iduser
INNER JOIN factura ON users.iduser = factura.iduser
INNER JOIN categorias ON factura.idcate = categorias.idcate
INNER JOIN precio ON precio.idprecio = categorias.idprecio
WHERE fecha BETWEEN '$fechaini' AND '$fechafin'";
$registros = mysqli_query($conexion, $query) or die("Problemas con la conexión");

ini_set('date.timezone', 'America/Caracas');
$time3 = date('H:i:s', time());
class pdf extends FPDF{
    function header(){
      $this->SetTextColor(0,0,0);
      $this->Setfont('Arial','B','14');
      $this->Cell(196,6,utf8_decode("Prodicar Zulia 2015 C.A"),0,1,"R");
      $this->Cell(196,6,utf8_decode("Rif: J-40740227-7"),0,1,"R");
      $this->Cell(196,6,utf8_decode("Teléfono: 0261-3299011"),0,1,"R");
      $this->Ln(15);
    }

    function footer(){
      $this->SetY(-15);
      $this->Setfont('Arial','I','10');
      $this->Cell(0,5,$this->PageNo()."/{nb}",0,1,"C");
    }
 }

$pdf = new PDF('P','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage();
while($fila=mysqli_fetch_array($registros)){

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B','24');
$pdf->Cell(0,16,utf8_decode('Factura # ').$fila['idfact'] ,0,1,'C');

$pdf->Ln(10);

$pdf->SetTextColor(250,250,250);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(0,10,"Detalles del comprador",1,1,'C',true);



$pdf->SetTextColor(0,0,0);
$pdf->Cell(98,10,"Nombre: ".$fila['usernombre'],1,0);
$pdf->Cell(98,10,"Apellido: ".$fila['apellido'],1,1);

$pdf->Cell(98,10,"Correo: ".$fila['email'],1,0);
$pdf->Cell(98,10,utf8_decode("Teléfono Celular: ".$fila['numero']),1,1);
$pdf->Cell(98,10,utf8_decode("Razón Social: ".$fila['razon_social']),1,0);
$pdf->Cell(98,10,utf8_decode("Información: ".$fila['informacion']),1,1);


$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,10,utf8_decode("Dirección: ".$fila['direccion']."                                                                                                                                                                               "),1,1,'L',true);

$pdf->Ln(20);


$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0,0,0);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(0,10,"Detalles de la compra",1,1,'C',true);


$pdf->SetTextColor(0,0,0);
$pdf->Cell(98,10,utf8_decode("Referencia: ".$fila['referencia']),1,0); 
$pdf->Cell(98,10,"Producto: ".$fila['catenombre'],1,1);
$pdf->Cell(98,10,utf8_decode("Cantidad: ").$fila['cantidad'],1,0);
$pdf->Cell(98,10,utf8_decode("Tipo: ").$fila['tipo'],1,1);
$pdf->Cell(98,10,utf8_decode("Corte: ").$fila['corte'],1,0);
$pdf->Cell(98,10,utf8_decode("Precio: ").$fila['precio'],1,1);
$precioTotal = $fila['precio'] * $fila['cantidad'];
$pdf->Cell(196,10,utf8_decode("Precio total: ".$precioTotal),1,1);



$pdf->Ln(140);



}
mysqli_close($conexion);


$pdf->Output();

?>
