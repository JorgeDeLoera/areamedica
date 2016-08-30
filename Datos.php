<?php
session_start();

if(isset($_SESSION['codigo'])){
?>

<!DOCTYPE html>
<html ng-app="Graficas" lang="es">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="Diseño.css">
<link rel="stylesheet" href="DiseñoAdministrativos.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
<script src="Chart.js/Chart.min.js"></script> 
</head>

<body>

    <header>
        <img src="Titulo.jpg">
        <key>Usted ha iniciado sesion como <?php echo $_SESSION['codigo'];?> &nbsp&nbsp&nbsp</key>
    </header>

    <div class="cont">

        <?php include("header.php"); ?>

        <section ng-controller="datos" class="app">
            
            <div class="pestana">
                <h2>¿Qué grafica quiere ver?</h2>
                <select class="boton" ng-model="tabla">
                    <option value="General_paciente">Datos generales</option>
                    <option value="Signosvitales_paciente">Signos vitales</option>
                    <option value="Anamenesis_paciente">Anamnesis</option>
                </select>
                <select class="boton" ng-model="valor" ng-click="buscar()">
                    <optgroup label="Datos generales">
                        <option value="edad">Edad</option>
                        <option value="sexo">Sexo</option>
                        <option value="nombre">Nombre</option>
                        <option value="actividadlaboral">Actividad laboral</option>
                        <option value="dependencia">Dependencia</option>
                    </optgroup>
                    <optgroup label="Signos vitales">
                        <option value="frecuenciarespiratoria">Frecuencia respiratoria</option>
                        <option value="temperatura">Temperatura</option>   
                    </optgroup>                     
                    <optgroup label="Anemnesis">
                        <option value="tipodesangre">Tipo de sangre</option>  
                    </optgroup>              
                </select>
            </div>
            
            <div>
                <canvas id="canvas" height="500" width="1000"></canvas>
            </div>

        </section>

    </div>

<script>
    var Graficas = angular.module('Graficas',[]);

    Graficas.controller('datos', function($scope,$http) {

        $scope.buscar = function() {

            var data = {valor:$scope.valor,tabla:$scope.tabla};
            console.log(data);
            $http.post('recibir/Datos.php',data).success(function(res) {

                console.log(res[0]);
                console.log(res[1]);

                var BarChart = {
                    labels: res[0],
                    datasets: [{
                    fillColor: "green",
                    strokeColor: "green",
                    pointColor: "black",
                    pointStrokeColor: "#fff",
                    data: res[1]
                    }]
                };

                var myLineChart = new Chart(document.getElementById("canvas").getContext("2d")).Bar(BarChart, {scaleFontSize : 16, scaleFontColor : "#000"});
            });

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
