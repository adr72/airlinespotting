<?php
session_start();
?>
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
$result=mysqli_query($conexion,"SELECT links FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
Airlinespotting - $array[0]";}
?>

</title>

<?php
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
$activa="links";		
if(isset($_SESSION['user'])){
$usuario=$_SESSION['user'];}else{$usuario='adr72';}
$super=mysqli_query($conexion,"SELECT numero FROM usuarios WHERE usuario='$usuario'");
while($superadmin=mysqli_fetch_array($super)){
if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){
include ("includes/menu.php");
include("includes/banner3.php");
}else{
include ("includes/menu.php");
include("includes/banner3.php");}}

include("includes/barracookies2.php");

?>

<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47423555-1', 'airlinespotting.com');
  ga('send', 'pageview');

</script>

 <script src="http://www.airlinespotting.com/jquery-latest.js"></script>

  <script src="http://www.airlinespotting.com/main.js"></script>

</head><body id='top'>

<div id="contenedor2">

<?php
$terms=mysqli_query($conexion,"SELECT linksintro,linksair,closeavion,links FROM lang WHERE id LIKE '$idi'");
while($arrayterms=mysqli_fetch_array($terms)){
	$may1=strtoupper($arrayterms[3]);
	$may2=strtoupper($arrayterms[1]);
	echo"
	<p class='introcontact'>$arrayterms[0]</p>
	<div id='contable'>
	<table id='tablelinks'>
	<tr>
	<td colspan='2' class='titularlinks'>$may1</td>
	</tr>
	<tr>
	<td class='titularlinks2'>WEBS</td>
	<td class='titularlinks2'>$may2</td>
	</tr>
	</table>
	<table id='tablelinks2'>";
	$webs=mysqli_query($conexion,"SELECT * FROM linkswebs ORDER BY webs");
	while($arraywebs=mysqli_fetch_array($webs)){
		echo"
		<tr>
		<td><a href='$arraywebs[0]' target='_blank'>$arraywebs[1]</a></td>
		</tr>";
	}
	echo"</table>
	<table id='tablelinks3'>";
	$comps=mysqli_query($conexion,"SELECT * FROM linkscomps ORDER BY comps");
	while($arraycomps=mysqli_fetch_array($comps)){
		echo"
		<tr>
		<td><a href='$arraycomps[0]' target='_blank'>$arraycomps[1]</a></td>
		</tr>";
	}
	echo"</table>
	</div>
	<br/>
	";
}

?>
</div>
<?php
echo"<div style='text-align:center;margin-bottom:20px;'>";
?>

</div>

<?php
include("includes/footer.php");
?>

</body></html>