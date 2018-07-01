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

<script language="JavaScript"> 
function pregunta(){ 
    if (confirm("Todo correcto? Revisa todos los datos.")){ 
       return true;
    } else{return false;}
} 
</script> 

	<?php
include("includes/header.php");
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
$idi=$_GET['id'];
$editado=$_GET['editado'];
if(!isset($_REQUEST['submit'])){
echo"
<form action='http://www.airlinespotting.com/editar/$idi/$version/$editado' method='post'>
<p class='introcontact5'>Editar Campos del Registro:
<table border='1' id='todasfotos'>
						<tr>
						<th>Id foto:</th>
						<th>Compa&ntilde;&iacute;a:</th>
						<th>Modelo avi&oacute;n;</th>
						<th>Fecha de captura:</th>
						<th>Matr&iacute;cula:</th>
						<th>Usuario:</th>
						<th>Aeropuerto:</th>
						<th>Flota de &eacute;ste modelo:</th>
						<th>C&oacute;digo pa&iacute;s:</th>
						<th>Localidad:</th>
						<th>Fecha de subida:</th>
						<th>Etiqueta:</th>
						</tr>";
						$data1=mysqli_query($conexion,"SELECT * FROM aviones WHERE id='$editado'");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td><input style='width:100%;' type='text' value='$arraydata1[0]' name='idedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[1]' name='comedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[2]' name='modedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[4]' name='capedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[6]' name='matedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[7]' name='usedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[8]' name='aeroedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[9]' name='flotedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[10]' name='codedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[11]' name='locedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[12]' name='upedit' /></td>
							<td><input style='width:100%;' type='text' value='$arraydata1[13]' name='etiquedit' /></td>
							</tr>
							</table>
							";
						}
						echo"<input type='submit' id='order2' onclick='return pregunta();' style='margin:auto;display:block;' value='Guardar' name='submit' />
						<p style='margin-top:10px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>
</p>
</form>";}else{
$idedit=$_POST['idedit'];
$comedit=$_POST['comedit'];
$modedit=$_POST['modedit'];
$capedit=$_POST['capedit'];
$matedit=$_POST['matedit'];
$usedit=$_POST['usedit'];
$aeroedit=$_POST['aeroedit'];
$flotedit=$_POST['flotedit'];
$codedit=$_POST['codedit'];
$locedit=$_POST['locedit'];
$upedit=$_POST['upedit'];
$etiquedit=$_POST['etiquedit'];
mysqli_query($conexion,"UPDATE aviones SET id='$idedit', Comp='$comedit', Avion='$modedit', Fecha='$capedit', matricula='$matedit', autor='$usedit', airport='$aeroedit', avion2='$flotedit', airportcountry='$codedit', location2='$locedit', fechaup='$upedit', etiqueta='$etiquedit' WHERE id='$editado'");
header("location:http://www.airlinespotting.com/login/$idi/$version");}
}
include("includes/footer.php");
?>
<?php ob_end_flush(); ?>
</body>
</html>