<?php
$codigo= $_POST['codigo'];
$contrasena= $_POST['contrasena'];

/*$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');
$sql= "SELECT * FROM Administrativo WHERE codigo = '$codigo' and contrasena = '$contrasena'";
if ($rec= mysqli_query($link, $sql)) {echo "";}
else {echo "Error: " . $sql . "<br>" . mysqli_error($link);}

$nm= mysqli_num_rows($rec);

if($nm>=1){*/
session_start();
$_SESSION['codigo']= $codigo;
header("Location:InicioAdministrativos.php");
/*}
else if($nm==0){
echo "Error: no existe este usuario";
}

mysqli_close($link);*/
?>
