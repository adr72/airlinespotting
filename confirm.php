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
<?php
$conexion=mysqli_connect("rdbms.strato.de","U2429507","Mallorca1972");
if(!mysqli_select_db($conexion,"DB2429507"))die("Error, no esiste esta base de datos.");
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
Airlinespotting - $array[148]";}
?>

</title>


 
</head>



<body>
<?php
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
$eme=$_GET['eme'];
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}  
$activa="login";    
include ("includes/menu.php");
include("includes/banner3.php");

include("includes/barracookies2.php");
mysqli_query($conexion, "DELETE FROM temp_usuarios WHERE fecha < DATE_SUB(CURDATE(), INTERVAL 1 DAY)");

?>
<div id='contenidoficha4'>
<?php
$temp=mysqli_query($conexion, "SELECT * FROM temp_usuarios WHERE email='$eme'");
while($tempc=mysqli_fetch_array($temp)){
  mysqli_query($conexion, "INSERT INTO usuarios (nombre,password,email,usuario) VALUES ('$tempc[1]','$tempc[2]','$tempc[3]','$tempc[4]')");
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){
echo"
       <p class='introcontact'>$array[65]</p>
     <p style='text-align:center;'><button class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>$array[66]</a></button></p>";
mysqli_query($conexion, "DELETE FROM temp_usuarios WHERE email='$eme'");
$varpaso=1;
}}
if($varpaso!=1){
  $result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){
  echo"
       <p class='introcontact'>$array[163]</p>
     <p style='text-align:center;'><button class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/register/$idi/$version'>$array[111]</a></button></p>";
}
}
?>
</div>
<?php
include("includes/pie.php");
?>
</body></html>