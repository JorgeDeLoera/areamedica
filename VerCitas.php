<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="VerCitas" lang="es">
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

        <section ng-controller="citas" class="app">

            <div class="pestana">
            Escriba la cita a buscar: &nbsp <input type="search" ng-model="buscador">
            </div>

            <br><br>

            <div id="Citas" class="citas">
                <div ng-repeat="caja in cita | filter: buscador">
                    <formulario>
                        Fecha: <label>{{caja.fechahora}}</label> &nbsp&nbsp&nbsp&nbsp&nbsp
                        Nombre del paciente: <label>{{caja.paciente}}</label> <br>
                        Sintomas: <label>{{caja.sintomas}}</label> <br><br>
                        <a href="DatosCita.php?id={{caja.fechahora}}&cod={{caja.paciente}}" class="boton2">Atender cita</a> &nbsp 
                        <a href="EliminarCitas.php?id={{caja.fechahora}}" class="boton2">Cancelar cita</a>
                    </formulario>
                    <br>
                </div>
            </div>

            <div id="Historial" class="citas">
                <div ng-repeat="caja in historial | filter: buscador">
                    <formulario id="citas">
                        Fecha: <label>{{caja.fechahora}}</label> &nbsp&nbsp&nbsp&nbsp&nbsp
                        Nombre del paciente: <label>{{caja.paciente}}</label> <br>
                        Atendido por: <label>{{caja.medico}}</label> <br>
                        Sintomas: <label>{{caja.sintomas}}</label> <br><br>
                        <a href="DatosCita.php?id={{caja.fechahora}}&cod={{caja.paciente}}" class="boton2">Revisar cita</a>                 
                    </formulario>
                    <br>
                </div>
            </div>

        </section>

    </div>

</body>
<script>
    var VerPacientes = angular.module('VerCitas', [] );

    VerPacientes.controller('citas', function($scope,$http) {

        $http.get('recibir/VerCitas.php').success(function(datos) {
            $scope.cita = datos;
        });

        $http.get('recibir/VerCitas2.php').success(function(datos) {
            $scope.historial = datos;
        });  

    });
</script>

</html>

<?php
}
else{
echo "Usted no ha iniciado sesion";
}
?>
