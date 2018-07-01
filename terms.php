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
$result=mysqli_query($conexion,"SELECT termsbar FROM lang WHERE id LIKE '$idi'");
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
$activa="login";		
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

<div id="contenedorterms">

<?php
$terms=mysqli_query($conexion,"SELECT terms,closeavion FROM lang WHERE id LIKE '$idi'");
while($arrayterms=mysqli_fetch_array($terms)){
	echo"
	<p class='introcontact'>$arrayterms[0]";
	if($idi=='ES'){echo"
	<span class='sub'>11 . Pol&iacute;tica de Cookies</span><br/><br/>
    Haz click <a class=portfolio2  href=http://www.airlinespotting.com/cookies/$idi/$version>aqu&iacute;</a> para leer nuestra Pol&iacute;tica de Coookies.";}else{echo"
	<span class='sub'>11 . Cookies Policy</span><br/><br/>
	Click <a class=portfolio2  href=http://www.airlinespotting.com/cookies/$idi/$version>here</a> to see our Cookies Policy.";}echo"
	</p><br/>
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