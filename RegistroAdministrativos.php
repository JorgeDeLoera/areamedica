<?php
session_start();

if(isset($_SESSION['codigo'])){

$link = mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');
$sql = "INSERT INTO Administrativo (nombre,apellidopaterno,apellidomaterno,especialidad,codigo,telefono,celular,correo,contrasena) VALUES('$_POST[nombre]','$_POST[apellidopaterno]','$_POST[apellidomaterno]','$_POST[especialidad]','$_POST[codigo]','$_POST[telefono]','$_POST[celular]','$_POST[correo]','$_POST[contrasena]')";
if (mysqli_query($link, $sql)) {
echo "Enviado";
header("Location:RegistroAdministrativos.php");
} 
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}
mysqli_close($link);

}
else{
echo "Usted no ha iniciado sesion";
}

?> 
