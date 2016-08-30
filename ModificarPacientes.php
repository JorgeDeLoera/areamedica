<?php
session_start();

if(isset($_SESSION['codigo'])){

$id = $_GET['id'];

$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');

$fecha= date("Y-m-d H:i");

$sql= "UPDATE General_paciente SET fecha='$fecha',nombre='$_POST[nombre]',edad='$_POST[edad]',sexo='$_POST[sexo]',actividadlaboral='$_POST[actividadlaboral]',dependencia='$_POST[dependencia]',telefono='$_POST[telefono]',telefonoemergencia='$_POST[telefonoemergencia]',codigo='$_POST[codigo]',correo='$_POST[correo]',contrasena='$_POST[contrasena]' WHERE nombre='".$id."'";
if (mysqli_query($link, $sql)) {} 

$sql= "UPDATE Signosvitales_paciente SET nombre='$_POST[nombre]' WHERE nombre='".$id."'";
if (mysqli_query($link, $sql)) {}
$sql= "UPDATE Antropometria_paciente SET nombre='$_POST[nombre]' WHERE nombre='".$id."'";
if (mysqli_query($link, $sql)) {}
$sql= "UPDATE Anamenesis_paciente SET nombre='$_POST[nombre]' WHERE nombre='".$id."'";
if (mysqli_query($link, $sql)) {
header("Location:DatosPaciente.php?id=".$_POST['nombre']."");
}

mysqli_close($link);

}
else{
echo "Usted no ha iniciado sesion";
}

?> 