<?php
$id=$_GET['name'];
$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');

$sql= "SELECT * FROM Cita_docs WHERE nombre = '".$id."' ";
if ($result= mysqli_query($link, $sql)) {echo "";}
while ($row= mysqli_fetch_assoc($result)) {
	$documento= $row['documento'];
}
mysql_free_result($result);

header('Content-type: application/pdf');
echo $documento;
?>