<?php
session_start();

if(isset($_SESSION['administrador'])){
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

<nav>
<a href="logout.php">Cerrar sesión</a>
</nav>

<section class="app">

<div>
<br><br>
<sign>
<form method="POST" action="RegistroAdministrativos.php"><table>
<h2>Registrar un medico</h2>
<br><br><br>
<tr><td>Nombre<br><input type="TextBox" name="nombre"></td><td>Apellido paterno<br><input type="TextBox" name="apellidopaterno"></td><td>Apellido materno<br><input type="TextBox" name="apellidomaterno"></td></tr>
<tr><td>Especialidad<br><input type="TextBox" name="especialidad"></td></tr>
<tr><td>Codigo<br><input type="TextBox" name="codigo"></td></tr>
<tr><td>Telefono<br><input type="TextBox" name="telefono"></td><td>Celular<br><input type="TextBox" name="celular"></td></tr>
<tr><td>Correo electronico<br><input type="TextBox" name="correo"></td></tr>
<tr><td>Escriba una contraseña<br><input type="TextBox" name="contrasena"></td></tr>
<tr><td><input type="submit" name="enviar" value="Enviar"></td></tr>
</table></form>
<br><br><br>
</sign>
<br><br><br>
</div>

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
