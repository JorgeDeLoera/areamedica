<?php
$codigo= $_POST['codigo'];
$contrasena= $_POST['contrasena'];

session_start();
$_SESSION['administrador']= $codigo;
header("Location:Administrador.php");

?>
