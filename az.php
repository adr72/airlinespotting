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

<?php
$conexion=mysqli_connect("rdbms.strato.de","U2429507","Mallorca1972");
if(!mysqli_select_db($conexion,"DB2429507"))die("Error, no esiste esta base de datos.");
$letra=$_GET['let'];
$letramay=strtoupper($letra);
echo"
<title>Airlinespotting- $letramay</title>";
?>

<?php
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
$activa3=$letra;
if(isset($_SESSION['user'])){
$usuario=$_SESSION['user'];}else{$usuario='adr72';}
$super=mysqli_query($conexion,"SELECT numero FROM usuarios WHERE usuario='$usuario'");
while($superadmin=mysqli_fetch_array($super)){
if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){
include ("includes/menu.php");
include("includes/banner4.php");
include ("includes/submenu.php");
}else{
include ("includes/menu.php");
include("includes/banner4.php");
include ("includes/submenu.php");
}}

include("includes/barracookies2.php");

?>

<script>
document.getElementById("menusup1").style.display="block";
document.getElementById("menusup1a").style.display="block";
document.getElementById("menusup2").style.display="block";
</script>

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

<div id="contenedor">
<div id="contenidocom">
<div class="contetumbs4">
<?php
$titles=mysqli_query($conexion,"SELECT todasfotos,verfoto,idiomasdeu FROM lang WHERE id='$idi'");
while($arraytitles=mysqli_fetch_array($titles)){

$anotacion=mysqli_query($conexion,"SELECT anotacion FROM lang WHERE id='$idi'");
while($arraynota=mysqli_fetch_array($anotacion)){
$nota=str_replace(' ','&nbsp',$arraynota[0]);echo"
<p id='flotas'>$nota</p>";

$result3=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($array3=mysqli_fetch_array($result3)){

$result=mysqli_query($conexion,"SELECT DISTINCT Comp FROM aviones WHERE Comp LIKE '$letra%' ORDER BY Comp");
while($array=mysqli_fetch_array($result)){
if($idi=='ES'){
    setlocale(LC_ALL,"es_ES");
  }else{
    setlocale(LC_ALL,"en_EN");
  }
$result4=mysqli_query($conexion,"SELECT pais,flota,fechacese FROM compa WHERE Comp LIKE '$array[0]'");
while($array4=mysqli_fetch_array($result4)){
$newdate2=strtotime($array4[2]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$result5=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array4[0]'");
while($array5=mysqli_fetch_array($result5)){
echo"
<div class='fichaaero' align='center'>
<h3><span class='letranja'><span class='ambargal'>$array[0]</span>&nbsp;&nbsp;($array4[1]**)</span>";
if($array[0]=="SAS Scandinavian Airlines"){echo"<span class='letraflo'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;"; if($idi=='ES'){echo"Suecia, Noruega, Dinamarca";}else{echo"Sweden, Norway, Denmark";} echo"&nbsp;&nbsp;<img src='http://www.airlinespotting.com/imagenes/flags/SWE.png' />&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://www.airlinespotting.com/imagenes/flags/NOR.png' />&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://www.airlinespotting.com/imagenes/flags/DNK.png' />&nbsp;)";}
else{echo"<span class='letraflo'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;$array5[0]&nbsp;&nbsp;<img src='http://www.airlinespotting.com/imagenes/flags/$array4[0].png' />&nbsp;)";}
if($array4[2]!="0000-00-00"){echo"<br>$array3[44]&nbsp;&nbsp;$newdate$newdate3$newdates</span>";}
echo"</h3>";
$caja=1;
$prueba=mysqli_query($conexion,"SELECT Avion FROM aviones WHERE Comp LIKE '$array[0]' GROUP BY Avion");
while($arrayprueba=mysqli_fetch_array($prueba)){
$result2=mysqli_query($conexion,"SELECT Avion,Foto,Fecha,minifoto,matricula,autor,airport,avion2,airportcountry FROM aviones WHERE Comp LIKE '$array[0]' AND Avion='$arrayprueba[0]' ORDER BY Fecha DESC, id DESC LIMIT 1");
while($array2=mysqli_fetch_array($result2)){
$longitud=str_replace(' ','&nbsp',$array3[25]);$nombre=str_replace(' ','&nbsp',$array[0]);$autor=str_replace(' ','&nbsp',$array2[5]);$nombre2=str_replace(' ','&nbsp',$array2[0]);$aerop=str_replace(' ','&nbsp',$array2[6]);
$result6=mysqli_query($conexion,"SELECT longitud FROM longitudes WHERE Avion='$array2[0]'");
while($array6=mysqli_fetch_array($result6)){
$result7=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array2[8]'");
while($array7=mysqli_fetch_array($result7)){$comcon=str_replace(" ","~",$array[0]);$avicon=str_replace(" ","~",$array2[0]);
echo"
<div class='fichaz'>
<a href='http://www.airlinespotting.com/gallery/$idi/$version/$array[0]/$array2[0]'>
<img src='http://www.airlinespotting.com/$array2[3]' alt='$array[0] $array2[0]' />
<img class='ampliar'"; if($idi=='ES'){echo" src='http://www.airlinespotting.com/imagenes/fotos.png' alt='$array[1]'";}else if($idi=='EN'){echo" src='http://www.airlinespotting.com/imagenes/fotos2.png' alt='$array[1]'";}echo" /></a>
<p><span class='fleet'>$array2[0]&nbsp;&nbsp;&nbsp;&nbsp;($array2[7]*)</span></p>
</div>";}}}}
echo"
</div>";}}}}}}
if($caja!=1){
$noplanes=mysqli_query($conexion,"SELECT noplanes FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
echo"
<div class='fichaaero'>
<p>$arraypl[0]</p>
</div>";}}
$arriba=mysqli_query($conexion,"SELECT arriba FROM lang WHERE id='$idi'");
while($arrayba=mysqli_fetch_array($arriba)){
echo"
</div>
</div>
";}
?>

<?php
echo"<div style='text-align:center;margin-bottom:20px;'>";
?>
 
</div>

<?php
include("includes/footer.php");
?>
</body></html>