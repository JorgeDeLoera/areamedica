<?php
$link = mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');
$sql = "SELECT * FROM Cita WHERE status='' ";


$result = mysqli_query($link, $sql);

$datos = array();

while($row = mysqli_fetch_assoc($result)){
	$datos[] = $row;
}


echo json_encode($datos);

?>