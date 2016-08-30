<?php
session_start();

if(isset($_SESSION['codigo'])){

$link= mysqli_connect("127.0.0.1","administrador","peticion","Usuarios");
if (!$link) {die(" ". mysqli_connect_error());}
$link->set_charset('utf8');

$fecha = date("Y-m-d h:i");
$nombre = $_POST[paterno].' '.$_POST[materno].' '.$_POST[nombre];

$sql= "SELECT * FROM General_paciente WHERE nombre = '".$nombre."' ";
$result= mysqli_num_rows(mysqli_query($link, $sql));

if($result>0){
$sql= "UPDATE General_paciente SET fecha='$fecha' WHERE nombre='".$nombre."'";
if (mysqli_query($link, $sql)) {} 
else {
echo "Hubo un error al enviar los datos generales del paciente: " . $sql . "<br>" . mysqli_error($link);}
} 
else{
$sql= "INSERT INTO General_paciente (nombre,fecha,edad,sexo,actividadlaboral,dependencia,telefono,telefonoemergencia,codigo,correo,contrasena) VALUES('$nombre','$fecha','$_POST[edad]','$_POST[sexo]','$_POST[laboral]','$_POST[dependencia]','$_POST[telefono]','$_POST[telefonoemergencia]','$_POST[codigo]','$_POST[correo]','$_POST[contrasena]')";
if (mysqli_query($link, $sql)) {} 
else {
echo "Hubo un error al enviar los datos generales del paciente: " . $sql . "<br>" . mysqli_error($link);}
}

$sql= "INSERT INTO Cita (fechahora,paciente) VALUES('$fecha','$nombre')";
if (mysqli_query($link, $sql)) {} 
else {
echo "Hubo un error al enviar los datos de la cita del paciente: " . $sql . "<br>" . mysqli_error($link);}


$sql= "INSERT INTO Signosvitales_paciente (nombre,fecha,frecuenciacardiaca,frecuenciarespiratoria,presionarterial,glucosa,oximetria,temperatura) VALUES('$nombre','$fecha','$_POST[frecuenciacardiaca]','$_POST[frecuenciarespiratoria]','$_POST[presionarterial]','$_POST[glucosa]','$_POST[oximetria]','$_POST[temperatura]')";
if (mysqli_query($link, $sql)) {
}
else {
echo "Hubo un error al enviar los datos medicos del paciente: " . $sql . "<br>" . mysqli_error($link);}

$sql= "INSERT INTO Antropometria_paciente (nombre,fecha,peso,talla,imc,cintura,cadera) VALUES('$nombre','$fecha','$_POST[peso]','$_POST[talla]','$_POST[imc]','$_POST[cintura]','$_POST[cadera]')";
if (mysqli_query($link, $sql)) {
}
else {
echo "Hubo un error al enviar los datos medicos del paciente: " . $sql . "<br>" . mysqli_error($link);}


$sql= "INSERT INTO Anamenesis_paciente (nombre,fecha,tipodesangre,cronicodegenerativas,cirugias,toxicomanias,alergias,padecimiento,inmunologia,hereditarias,transfusiones) VALUES('$nombre','$fecha','$_POST[tipodesangre]','$_POST[cronicodegenerativas]','$_POST[cirugias]','$_POST[toxicomanias]','$_POST[alergias]','$_POST[padecimiento]','$_POST[inmunologia]','$_POST[hereditarias]','$_POST[transfusiones]')";
if (mysqli_query($link, $sql)) {
header("Location:DatosCita.php?id=".$fecha."");
}
else {
echo "Hubo un error al enviar los datos medicos del paciente: " . $sql . "<br>" . mysqli_error($link);}

mysqli_close($link);

}
else{
echo "Usted no ha iniciado sesion";
}

?> 
