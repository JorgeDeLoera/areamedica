<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Administrativos</title>
<link rel="stylesheet" href="Diseño.css">
<link rel="stylesheet" href="DiseñoAdministrativos.css">
</head>

<body>

<header>
<img src="Titulo.jpg">
<key>Usted ha iniciado sesion como <?php echo $_SESSION['codigo'];?> &nbsp&nbsp&nbsp</key>
</header>

<div class="cont">

<?php include("header.php"); ?>

<section class="app">
<sign>
<form method="POST" action="RegistroCitas.php"> 
<br>
<table>
	<tr>
		<td>Fecha de la cita<br><input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" required=”required” autocomplete="on"></td>
		<td>Hora<br><input type="time" name="hora" required=”required” autocomplete="on"></td>
		<td>Nombre del paciente<br><input class="text" name="nombre" required=”required” list="paciente"></td>
		</tr>
</table>

Motivo de la consulta<br><textarea class="input" name="sintomas" rows="5" cols="70"></textarea><br><br>
<input type="submit" name="enviar" value="Registrar" class="boton">
<br><br>
</form>
</sign>
<br><br><br>

</section>
</div>

</body>
</html>

<?php
}
else{
echo "Usted no ha iniciado sesion";
}
?>
