<?php
session_start();

if(isset($_SESSION['codigo'])){

$id= $_GET['id'];
$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');

$sql= "DELETE FROM Cita WHERE fechahora='".$id."'";
if (mysqli_query($link, $sql)) {
header("Location:VerCitas.php#Citas");
}
else {
echo "Hubo un error: <br>".mysqli_error($link);}

mysqli_close($link);

}
else{
echo "Usted no ha iniciado sesion";
}

?> 
