<?php
$id = $_GET['id'];
$link = mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');
$sql = "SELECT * FROM Cita WHERE fechahora = '".$id."' ";
if ($result = mysqli_query($link, $sql)) {echo "";} 

while ($row = mysqli_fetch_assoc($result)) {
$paciente = $row['paciente'];
$codigo = $row['codigo'];
$fechahora = date("d-m-Y");
$sintomas = $row['sintomas'];
$observaciones = $row['observaciones'];
$plan = $row['plan'];
$diagnostico = $row['diagnostico'];
}
mysql_free_result($result);

$sql = "SELECT edad FROM General_paciente WHERE nombre = '".$paciente."' ";
if ($result = mysqli_query($link, $sql)) {echo "";} 
while ($row = mysqli_fetch_assoc($result)) {
$edad = $row['edad'];
}
mysql_free_result($result);

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF(PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('Helvetica','', 12);
$pdf->AddPage();

$txt ="

$paciente                                                        $edad                   $fechahora

														$sintomas

$observaciones		



$plan



             $diagnostico

	";

$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

$pdf->Output();

?>
