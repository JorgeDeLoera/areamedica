<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="VerPacientes" lang="es">
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
            Escriba el paciente a buscar, este se resaltara en la pantalla: &nbsp <input type="search" ng-model="buscador">
            </div>

            <br><br>

            <div id="lista">
                <div class="info">
                    <img src="iconos/ic_info_white_18px.svg"> Se han atendido {{cantidad}} pacientes
                </div>

                <br>

                <div ng-repeat="fila in data | filter: buscador">
                    <formulario>
                    <a href="DatosPaciente.php?id={{fila.nombre}}">
                    {{fila.fecha}} | {{fila.nombre}}
                    </a>
                    </formulario>
                    <br>
                </div>
            </div>

        </section>

    </div>

</body>
<script>
    var VerPacientes = angular.module('VerPacientes', [] );

    VerPacientes.controller('paciente', function($scope,$http) {

        $http.get('recibir/InicioAdministrativos.php').success(function(datos) {
            $scope.data = datos;
            $scope.cantidad = datos.length;
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
