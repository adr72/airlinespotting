<?php
session_start();
?>
<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8_spanish_ci" />
  <meta http-equiv="content-language" content="en-gb" /> 
  <meta name="author" content="Francisco Escudero" />
  <meta name="title" content="Airlinespotting" />
  <meta name="description" content="Airlinespotting plane spotter database images of commercial airliners airlines overview of the types of aircraft and airlines." />
  <meta name="keywords" content="airplanes photos spotting spotter world aircraft airlines images database planes aviones fotos aerolineas mundo imagenes base de datos" />
  <meta name="Robots" content="all" />
  <meta name="distribution" content="global"/> 

<title>
Airlinespotting - Login
</title>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47423555-1', 'airlinespotting.com');
  ga('send', 'pageview');

</script>

	<?php
?>
</head>
<body>
<?php
$conexion=mysqli_connect("rdbms.strato.de","U2429507","Mallorca1972");
if(!mysqli_select_db($conexion,"DB2429507"))die("Error, no esiste esta base de datos.");
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
$activa="login";
if(isset($_SESSION['user'])){
$usuario=$_SESSION['user'];}else{$usuario='adr72';}
$super=mysqli_query($conexion,"SELECT numero FROM usuarios WHERE usuario='$usuario'");
while($superadmin=mysqli_fetch_array($super)){
if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){
	include ("includes/menu.php");
}else{
	include ("includes/menu.php");
	include("includes/banner3.php");}
$conf=$_POST['conf'];
$borrar=$_GET['borrado'];
if(!isset($conf)){
echo"
<form action='http://www.airlinespotting.com/borrar/$idi/$version/$borrar' method='post'>
<p class='introcontact5'>Estas seguro de borrar el Registro: $borrar ? s/n<input type='text' id='order3' name='conf' /><input type='submit' id='order2' value='Enviar' name='submit' /></p>
</form>";}else{
if($conf=='s' || $conf=='S'){
mysqli_query($conexion,"DELETE FROM aviones WHERE id='$borrar'");
header("location:http://www.airlinespotting.com/login/$idi/$version");}else{
	header("location:http://www.airlinespotting.com/login/$idi/$version");
}}
}
include("includes/footer.php");
?>
<?php ob_end_flush(); ?> 
</body>
</html>