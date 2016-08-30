<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="DatosPaciente" lang="es">
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

	<div class="pestana">
		<a class="datospersonales" href="#Datos personales">Datos personales</a>
		<a class="signosvitales" href="#Signos vitales">Signos vitales</a>
		<a class="antropometria" href="#Antropometria">Antropometria</a>
		<a class="anemenesis" href="#Anamenesis">Anamnesis</a>
	</div>

	<br><br>


	<div id="Datos personales" ng-repeat="usuario in general">
		<formulario>
			<h2 class="datospersonales">Datos Personales</h2>
			Fecha de registro: <label>{{usuario.fecha}}</label><br><br>
			<form method="post" action="ModificarPacientes.php?id=<?php echo $_GET['id'] ?>">
			<table>
				<tr>
					<td>Nombre<br><input class="text" type="text" name="nombre" value="{{usuario.nombre}}"></td>
					<td>Edad<br><input class="text" type="number" name="edad" value="{{usuario.edad}}"></td>
					<td>Sexo<br><input class="text" type="text" name="sexo" value="{{usuario.sexo}}"></td>	
				</tr>
				<tr>
					<td>Actividad laboral<br><input class="text" type="text" name="actividadlaboral" value="{{usuario.actividadlaboral}}"></td>
					<td>Dependencia<br><input class="text" type="text" name="dependencia" value="{{usuario.dependencia}}"></td>
					<td>Telefono<br><input class="text" type="text" name="telefono" value="{{usuario.telefono}}"></td>
				</tr>
				<tr>
					<td>Telefono de emergencia<br><input class="text" type="text" name="telefonoemergencia" value="{{usuario.telefonoemergencia}}"></td>
					<td>Codigo<br><input class="text" type="text" name="codigo" value="{{usuario.codigo}}"></td>
					<td>Correo<br><input class="text" type="text" name="correo" value="{{usuario.correo}}"></td>
					<td>Asigne una contraseña<br><input class="text" type="text" name="contrasena" value="{{usuario.contrasena}}"></td>
				</tr>
			</table>
			<br>
			<input type="submit" class="boton2" value="Guardar cambios">
			</form>
			<br>
		</formulario>
		<br>
	</div>

	

	<div id="Signos vitales" ng-repeat="usuario in signosvitales">
		<formulario>
			<h2 class="signosvitales">Signos Vitales</h2>
			Fecha de registro: <label>{{usuario.fecha}}</label><br><br>
			<table>
				<tr>
					<td>Presion arterial<br><label>{{usuario.frecuenciacardiaca}}</label></td>
					<td>Frecuencia respiratoria<br><label>{{usuario.frecuenciarespiratoria}}</label></td>
					<td>Frecuencia cardiaca<br><label>{{usuario.presionarterial}}</label></td>
					<td>Glucosa<br><label>{{usuario.glucosa}}</label></td>
					<td>Oximetria<br><label>{{usuario.oximetria}} %</label></td>
					<td>Temperatura<br><label>{{usuario.temperatura}} °C</label></td>
				</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<div id="Antropometria" ng-repeat="usuario in antropometria">
		<formulario>
			<h2 class="antropometria">Antropometría</h2>
			Fecha de registro: <label>{{usuario.fecha}}</label><br><br>
			<table>
				<tr>
					<td>Peso<br><label>{{usuario.peso}} Kg</label></td>
					<td>Talla<br><label>{{usuario.talla}} cm</label></td>
					<td>IMC<br><label>{{usuario.imc}}</label></td>
					<td>Cintura<br><label>{{usuario.cintura}} cm</label></td>
					<td>Cadera<br><label>{{usuario.cadera}} cm</label></td>
				</tr>
			</table>
			<br>
		</formulario>
		<br>
	</div>

	<div id="Anamenesis" ng-repeat="usuario in anemenesis">
		<formulario>
			<h2 class="anemenesis">Anemnesis</h2>
			Fecha de registro: <label>{{usuario.fecha}}</label><br><br>
			<table>
				<tr>
					<td>Tipo de sangre<br><label>{{usuario.tipodesangre}}</label></td>
				</tr>
				<tr>
					<td>Enfermedades cronicodegenerativas<br><label>{{usuario.cronicodegenerativas}}</label></td>
					<td>Cirugias<br><label>{{usuario.cirugias}}</label></td>
				</tr>
				<tr>
					<td>Toxicomanias<br><label>{{usuario.toxicomanias}}</label></td>
					<td>Alergias<br><label>{{usuario.alergias}}</label></td>
				</tr>	
				<tr>
					<td>Padecimiento actual<br><label>{{usuario.padecimiento}}</label></td>
					<td>Inmunologia<br><label>{{usuario.inmunologia}}</label></td>
				</tr>	
				<tr>
					<td>Transfusiones<br><label>{{usuario.transfusiones}}</label></td>
					<td>Enfermedades hereditarias<br><label>{{usuario.hereditarias}}</label></td>
				</tr>	
			</table>
			<br>
		</formulario>
		<br>
	</div>

</section>

</div>
<br>

<script>
	var DatosPaciente = angular.module('DatosPaciente', [] );
	var id = <?php echo json_encode($_GET['id']); ?>;
	
    DatosPaciente.controller('paciente', function($scope,$http) {

        $http.get('recibir/DatosPaciente.php?id='+id).success(function(datos) {
            $scope.general = datos;
        });

        $http.get('recibir/DatosPaciente2.php?id='+id).success(function(datos) {
            $scope.signosvitales = datos;
        });

        $http.get('recibir/DatosPaciente3.php?id='+id).success(function(datos) {
            $scope.antropometria = datos;
        });

        $http.get('recibir/DatosPaciente4.php?id='+id).success(function(datos) {
            $scope.anemenesis = datos;
        }); 

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
