<?php
session_start();

if(isset($_SESSION['codigo'])){

$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {}
$link->set_charset('utf8');

$datetime= $_POST['fecha'].' '.$_POST['hora'];

$sql= "INSERT INTO Cita (fechahora,paciente,sintomas) VALUES('$datetime','$_POST[nombre]','$_POST[sintomas]')";
if (mysqli_query($link, $sql)) {
header("Location:VerCitas.php#Citas");
}
else {
}

mysqli_close($link);

}
else{
echo "Usted no ha iniciado sesion";
}

?> 
