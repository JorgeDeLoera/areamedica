<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="Pacientes" lang="es">
<head>
<meta charset="utf-8">
<title>Administrativos</title>
<link rel="stylesheet" href="Diseño.css">
<link rel="stylesheet" href="DiseñoAdministrativos.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
</head>

<body>

<header>
<img src="Titulo.jpg">
<key>Usted ha iniciado sesion como <?php echo $_SESSION['codigo'];?> &nbsp&nbsp&nbsp</key>
</header>

<div class="cont">

<?php include("header.php"); ?>

<section ng-controller="paciente" class="app">

	<form method="post" action="RegistroPacientes.php">
	
	<div class="pestana">
		<a class="datospersonales" href="#Datos personales">Datos personales</a>
		<a class="signosvitales" href="#Signos vitales">Signos vitales</a>
		<a class="antropometria" href="#Antropometria">Antropometria</a>
		<a class="anemenesis" href="#Anamenesis">Anamenesis</a>
		<input type="submit" value="Enviar datos" class="boton">
	</div>

	<br><br>

	<div id="Datos personales">
			<formulario>
			<h2 class="datospersonales">Datos Personales</h2>
			<table>
			<tr>
				<td>Fecha de registro<br><input name="fecha" type="date" value="<?php echo date("Y-m-d");?>" readonly></td>
			</tr>
			<tr>
				<td>Apellido paterno<br><input class="text" type="text" name="paterno"></td>
				<td>Apellido materno<br><input class="text" type="text" name="materno"></td>
				<td>Nombre<br><input class="text" type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Edad<br><input class="text" type="number" name="edad" min="0" ></td>
				<td>Actividad laboral<br><input class="text" type="text" name="laboral" placeholder="opcional"></td>
				<td>Dependencia<br><input class="text" type="text" name="dependencia" placeholder="opcional"></td>
				<td>Sexo<br><select class="text" name="sexo"><option value="M">Masculino</option><option value="F">Femenino</option></select></td>
			</tr>
			<tr>
				<td>Telefono<br><input class="text" type="text" name="telefono" placeholder="opcional"></td>
				<td>Telefono de emergencia<br><input class="text" type="text" name="telefonoemergencia" placeholder="opcional"></td>
				<td>Correo<br><input class="text" type="email" name="correo" placeholder="opcional"></td>
			</tr>
			<tr>
				<td>Asigne una contraseña<br><input class="text" type="text" name="contrasena" placeholder="opcional"></td>
				<td>Codigo<br><input class="text" type="text" name="codigo" ng-model="codigo" placeholder="opcional"></td>
			</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<div id="Signos vitales">
		<formulario>
			<h2 class="signosvitales">Signos Vitales</h2>
			<table>
			<tr>
				<td>Presion arterial<br><input class="text" type="text" name="frecuenciacardiaca"></td>
				<td>Frecuencia respiratoria<br><input class="text" type="number" min="0" name="frecuenciarespiratoria"></td>
				<td>Frecuencia cardiaca<br><input class="text" type="number" min="0" name="presionarterial"></td>
			</tr>
			<tr>
				<td>Glucosa<br><input class="text" type="number" min="0" name="glucosa"></td>
				<td>Oximetria<br><input class="text" type="number" min="0" name="oximetria"> %</td>
				<td>Temperatura<br><input class="text" type="text" name="temperatura"> °C</td>
			</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<div id="Antropometria">
		<formulario>
			<h2 class="antropometria">Antropometría</h2>
			<table>
			<tr>
				<td>Peso<br><input class="text" type="text" name="peso" ng-model="peso"> Kg</td>
				<td>Talla<br><input class="text" type="text" name="talla" ng-model="talla"> m</td>
			</tr>
			<tr>
				<td>IMC<br><input class="text" type="text" name="imc" value="{{peso/(talla*talla)}}"></td>
				<td>Cintura<br><input class="text" type="number" min="0" name="cintura"> Cm</td>
				<td>Cadera<br><input class="text" type="number" min="0" name="cadera"> Cm</td>
			</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<div id="Anamenesis">
		<formulario>
			<h2 class="anemenesis">Anemnesis</h2>
			<table>
			<tr>
				<td>Tipo de sangre<br><input class="text" type="text" name="tipodesangre"></td>
			</tr>
			<tr>
				<td>Enfermedades cronicodegenerativas<br><textarea class="text" cols="40" name="cronicodegenerativas"></textarea></td>
				<td>Cirugias<br><textarea class="text" cols="40" name="cirugias"></textarea></td>
			</tr>
			<tr>
				<td>Toxicomanias<br><textarea class="text" cols="40" name="toxicomanias"></textarea></td>
				<td>Alergias<br><textarea class="text" cols="40" name="alergias"></textarea></td>
			</tr>
			<tr>				
				<td>Padecimiento actual<br><textarea class="text" cols="40" name="padecimiento"></textarea></td>
				<td>Inmunologia<br><textarea class="text" cols="40" name="inmunologia"></textarea></td>
			</tr>
			<tr>				
				<td>Transfusiones<br><textarea class="text" cols="40" name="transfusiones"></textarea></td>
				<td>Enfermedades hereditarias<br><textarea class="text" cols="40" name="hereditarias"></textarea></td>
			</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<input type="submit" value="Enviar datos" class="boton2">	
	</form>

	
</section>

</div>
<br>
<script>
	var Pacientes = angular.module('Pacientes', [] );

	Pacientes.controller('paciente', function($scope) {
	});
</script>

</body>
</html>

<?php
}
else{
echo "Usted no ha iniciado sesion";
}
?>
