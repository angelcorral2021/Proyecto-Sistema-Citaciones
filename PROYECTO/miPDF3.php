<?php
session_start();

if (!isset($_SESSION['rut'])) {
    session_destroy();
    header("Location:index.php");
} else {
    $_SESSION['rut'] =  $_SESSION['rut'];
}

?>



<?php
// include class
require('fpdf.php');

// extend class
class KodePDF extends FPDF {
    protected $fontName = 'Arial';

    function renderTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 15);
        $this->Cell(0, 10, utf8_decode($text), 0, 1);
        $this->Ln();
    }

    function renderSubTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 07);
        $this->Cell(0, 13, utf8_decode($text), 0, 1);
        $this->Ln();
    }

    function renderText($text) {
        $this->SetTextColor(51, 51, 51);
        $this->SetFont($this->fontName, 'B', 07);
        $this->MultiCell(0, 13, utf8_decode($text), 1, 1);
        $this->Ln();
    }
}

// create document
$pdf = new KodePDF('L');
$pdf->AddPage();

// config document
$pdf->SetTitle('Generar archivos PDF con PHP');
$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add content
$pdf->renderTitle('Sistema  Citaciónde Apoderados');
$pdf->renderSubTitle('FECHA: '.date("d/m/y").'    HORA : '.date("H:i:s"). '   (Hora y fecha generadas al momento de generar el documento)');
$pdf->renderText('Su fecha y hora de citación esta indicada en la columna Fecha_citacion');
$pdf->renderText('Si tiene dudas o inconvenientes con la informacion presentada puede comunicarse al correo 
colegio@gmail.com o al numero 722245856');


$pdf->renderSubTitle('');

//Recibimos dentro de una cadena la fechaG

$cnn = mysqli_connect("localhost","root","");//servidor, usuario, contraseña
mysqli_select_db($cnn, "citacion");//base de datos
$sql = "SELECT * FROM `citacion` WHERE CORREO_FAMILIAR = '$_SESSION[correo]'";
$rs = mysqli_query($cnn, $sql) or die("database error:". mysqli_error($cnn));



while ($field_info = mysqli_fetch_field($rs)) {
$pdf->Cell(31,15,$field_info->name,1);//PRIMER NUMERO ANCHO COLUMNAS,CELL AJUSTA LAS COLUMNAS, SEGUNDO NUMERO ALTURA COLUMNAS
}
while($rows = mysqli_fetch_assoc($rs)) {
$pdf->SetFont('Arial','',05);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(31,20,$column,1);
}
}

// output file
$pdf->Output('', 'fpdf-advanced.pdf');