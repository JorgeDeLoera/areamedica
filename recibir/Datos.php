<?php

$post = json_decode(file_get_contents("php://input"));

$col = $post->valor;
$tabla = $post->tabla;

$link = mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');
$sql = "SELECT ".$col." FROM ".$tabla;


$result = mysqli_query($link, $sql);

$data = array();

while($row = mysqli_fetch_assoc($result)){
	$data[] = $row[$col];
}

$aux = array_count_values($data);
foreach ($aux as $valor => $veces) {
	$datos[0][] = $valor;
	$datos[1][] = $veces;
}

echo json_encode($datos);