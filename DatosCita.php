<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="DatosCita" lang="es">
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

<section ng-controller="cita" class="app">

	<div>
		<form method="post" action="ModificarCitas.php?id=<?php echo $_GET['id'] ?>">
		<formulario ng-repeat="cita in data">
			<table>
				<tr>
					<td>Nombre del paciente: <label>{{cita.paciente}}</label> &nbsp&nbsp</td>
					<td>Fecha y hora: <label>{{cita.fechahora}}</label></td>
				</tr>
				<tr>
					<td>Nombre del medico: <label>{{cita.medico}}</label> &nbsp&nbsp&nbsp&nbsp</td>
					<td>Nombre del medico (en curso): <input class="input text" type="text" name="medico" value="<?php echo $medico ?>" readonly></td>
				</tr>
				<tr>
					<td>Motivo de consulta: <input class="input text" type="text" name="sintomas" value="{{cita.sintomas}}"></td>
				</tr>								
			</table>
			<br>
			<table>
				<tr>
					<td>Tx: </td>
					<td><formulario id="citas"><textarea class="input" rows="5" cols="60" name="observaciones">{{cita.observaciones}}</textarea></formulario></td>
				</tr>
				<tr>
					<td>Plan: </td>
					<td><formulario id="citas"><textarea class="input" rows="5" cols="60" name="plan">{{cita.plan}}</textarea></formulario></td>
				</tr>
				<tr>
					<td>Diagnostico: </td>
					<td><formulario id="citas"><textarea class="input" rows="5" cols="60" name="diagnostico">{{cita.diagnostico}}</textarea></formulario></td>
				</tr>
				<tr>
					<td><br>¿Comunmente se<br>le antoja algo?</td>
					<td><formulario id="citas">
						<select class="boton" ng-click="debecomer()" id="antojo">
							<option value=""></option>
							<option value="dulce" >Dulce</option>
							<option value="chocolate">Chocolate</option>
							<option value="refresco">Refresco</option>
							<option value="alcohol">Alcohol</option>
						</select> 
						<textarea class="input" name="debecomer" id="comer" rows="1" cols="40">{{cita.debecomer}}</textarea>
						</formulario></td>
				</tr>
			</table>
			<br><br>
			<table>
				<tr>
					<td><a href="DatosPaciente.php?id={{cita.paciente}}" class="boton2" target="blank">Ver datos del paciente</a></td>
					<td><input type="submit" value="Guardar Cambios" class="boton2"></td>
					<td><a href="pdf.php?id={{id}}" class="boton2" target="blank">Imprimir receta</a></td>
				</tr>
			</table>
		</formulario>
		</form>

	</div>

</section>

</div>

<script>
	var DatosCita = angular.module('DatosCita', [] );

	DatosCita.controller('cita', function($scope,$http) {

		$scope.id = <?php echo json_encode($_GET['id']); ?>;
		$scope.cod = <?php echo json_encode($_GET['cod']); ?>;
		
		$http.get('recibir/DatosCita.php?id='+$scope.id).success(function(datos) {
            $scope.data = datos;
        });

        $scope.debecomer = function() {
        	var a = document.getElementById('antojo').value;
        	console.log(a);
        	if (a == "dulce") {
        		document.getElementById('comer').value = "Debe comer uvas, pollo, res, pescado, huevos, o arandanos";
        	}
        	if (a == "chocolate") {
        		document.getElementById('comer').value = "Debe comer nueces, semillas, legumbres, o frutos";
        	}
        	if (a == "refresco") {
        		document.getElementById('comer').value = "Debe comer mostaza, brocoli, col, legumbres, queso, o ajonjoli";
        	}
        	if (a == "alcohol") {
        		document.getElementById('comer').value = "Debe comer granola, avena, o aceituna negra";
			}
        	if (a == "") {
        		document.getElementById('comer').value = "";
			}
        };

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
