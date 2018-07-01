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
$idfoto=$_GET['idft'];
$result=mysqli_query($conexion,"SELECT Comp,Avion,matricula FROM aviones WHERE id LIKE '$idfoto'");
while($array=mysqli_fetch_array($result)){echo"
$array[2]&nbsp;&nbsp;$array[0]&nbsp;&nbsp;$array[1]";}
?>

</title>
	
<?php
if($_SESSION['lleno']!=$idfoto && $_SESSION['user']!='adr72adr'){mysqli_query($conexion,"INSERT INTO clicks (date, idfoto) VALUE (NOW(), $idfoto)");
mysqli_query($conexion,"UPDATE aviones SET total=total+1 WHERE id='$idfoto'");
$_SESSION['lleno']=$idfoto;}
$idioma=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma=mysqli_fetch_array($idioma)){
$fotos=mysqli_query($conexion,"SELECT * FROM aviones WHERE id = '$idfoto'");
while($arrayfoto=mysqli_fetch_array($fotos)){
	
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header3.php");}

$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$arrayfoto[0]'");
while($arrayclicks24=mysqli_fetch_array($clicks24)){
$totalcount=$arrayfoto[14];
$maxidfoto=mysqli_query($conexion,"SELECT MAX(id) FROM aviones");
while($maxfoto=mysqli_fetch_array($maxidfoto)){
$gen=mysqli_query($conexion,"SELECT * FROM compa WHERE Comp='$arrayfoto[1]'");
while($arraygen=mysqli_fetch_array($gen)){
	if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($arrayfoto[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$result7=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$arrayfoto[10]'");
while($array7=mysqli_fetch_array($result7)){
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$arrayfoto[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
	if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$result6=mysqli_query($conexion,"SELECT longitud,envergadura FROM longitudes WHERE Avion='$arrayfoto[2]'");
while($array6=mysqli_fetch_array($result6)){
$buscador=substr($arrayfoto[8],9);
$localidad=substr($arrayfoto[11],0,-2);
	
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

</head><body>

<div id="contenedor3">

<?php

echo"
<div id='fb-root'></div>";

if($idi=='ES'){
	echo"
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/es_LA/all.js#xfbml=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	";}else if($idi=='EN'){
		echo"
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	";
	}
$nomfran=$arrayfoto[1];
echo"
<div id='contenedorvista'><div class='fichaaerohv'><div id='contelogo'>
<p id='logotexto2'><a href='http://www.airlinespotting.com/index/$idi/$version'>Airline<span class='minilogo2'>spotting</span></a></p><h1 id='logotexto3'><span class='minilogo'><span class='ambarfran'>$nomfran</span>&nbsp;&nbsp;&nbsp;$arrayfoto[2]&nbsp;&nbsp;$arrayfoto[6]</span></h1>
</div><div><img src='http://www.airlinespotting.com/$arrayfoto[3]' alt='$arrayfoto[1]&nbsp;&nbsp;$arrayfoto[2]&nbsp;&nbsp;$arrayfoto[6]' title='$arrayfoto[1]&nbsp;&nbsp;$arrayfoto[2]&nbsp;&nbsp;$arrayfoto[6]' />";
$idfotomenos=$idfoto-1;
	$idfotomas=$idfoto+1;
if($idfoto!=1){
echo"
<div id='flechanextizda'>
<a href='http://www.airlinespotting.com/image/$idi/$version/$idfotomenos' title='$arraydioma[117]'><img id='flechanextizda' src='http://www.airlinespotting.com/imagenes/7.png' /></a>
</div>";
}
if($idfoto!=$maxfoto[0]){
	echo"
<div id='flechanextdcha'>
<a href='http://www.airlinespotting.com/image/$idi/$version/$idfotomas' title='$arraydioma[118]'><img id='flechanextdcha' src='http://www.airlinespotting.com/imagenes/8.png' /></a>
</div>";
}
echo"
	<div id='tabla'>
	<div>
	<p class='titutabla'>$arraydioma[157]</p>
	<p class='titutabla'>$arraydioma[158]</p>
	<p class='titutabla'>$arraydioma[159]</p>
	</div>
	<div>
	<p class='letabla'>$arraydioma[144]&nbsp;&nbsp;$newdate$newdate3$newdates</p>
	<p class='letabla'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[1]'>$arrayfoto[1]</a></p>
	<p class='letabla'>$arraydioma[24]&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$arrayfoto[8]</a></p>
	</div>
	<div>
	<p class='letabla'>$arraydioma[47]&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/"; echo base64_encode($arrayfoto[7]); echo"'>$arrayautor[0]&nbsp;&copy;</a></p>
	<p class='letabla'><a id='nombrenlace' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[2]'>$arrayfoto[2]</a></p>
	<p class='letabla'>$arraydioma[41]&nbsp;&nbsp;$localidad</p>
	</div>
	<div>
	<p class='letabla'>$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[42]&nbsp;(24h)</p>
	<p class='letabla'>$arraydioma[23]&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[6]'>$arrayfoto[6]</a></p>
	<p class='letabla'>$arraydioma[161]&nbsp;$array7[0]</p>
	</div>
	<div>
	<p class='letabla'>$totalcount&nbsp;&nbsp;$arraydioma[42]</p>
	<p class='letabla'>$arraydioma[25]&nbsp;/&nbsp;$arraydioma[40]&nbsp;&nbsp;</span>$array6[0]&nbsp;/&nbsp;$array6[1]&nbsp;mts</p>
	<div class='cajafb'><div style='display:inline-block;text-align:left;width:100px;' class='fb-share-button' data-href='http://www.airlinespotting.com/image/$idi/$version/$idfoto' data-layout='button' data-size='small' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'></a></div></div>
	</div>
	</div>


	<div id='tablamovil'>
	<div>
	<p class='titutablamovil'>$arraydioma[158]</p>
	<p class='letablamovil'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[1]'>$arrayfoto[1]</a></p>
	<p class='letablamovil'><a id='nombrenlace' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[2]'>$arrayfoto[2]</a></p>
	<p class='letablamovil'>$arraydioma[23]&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[6]'>$arrayfoto[6]</a></p>
	<p class='letablamovil'>$arraydioma[25]&nbsp;/&nbsp;$arraydioma[40]&nbsp;&nbsp;</span>$array6[0]&nbsp;/&nbsp;$array6[1]&nbsp;mts</p>
	</div>
	<div>
	<p class='titutablamovil'>$arraydioma[157]</p>
	<p class='letablamovil'>$arraydioma[144]&nbsp;&nbsp;$newdate$newdate3$newdates</p>
	<p class='letablamovil'>$arraydioma[47]&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/"; echo base64_encode($arrayfoto[7]); echo"'>$arrayautor[0]&nbsp;&copy;</a></p>
	<p class='letablamovil'>$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[42]&nbsp;(24h)</p>
	<p class='letablamovil'>$totalcount&nbsp;&nbsp;$arraydioma[42]</p>
	</div>
	<div>
	<p class='titutablamovil'>$arraydioma[159]</p>
	<p class='letablamovil'>$arraydioma[24]&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$arrayfoto[8]</a></p>
	<p class='letablamovil'>$arraydioma[41]&nbsp;&nbsp;$localidad</p>
	<p class='letablamovil'>$arraydioma[161]&nbsp;$array7[0].</p>
	<div class='cajafb'><div style='display:inline-block;text-align:left;width:100px;' class='fb-share-button' data-href='http://www.airlinespotting.com/image/$idi/$version/$idfoto' data-layout='button' data-size='small' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'></a></div></div>
	</div>
	
	<div>
	
	
	</div>
	</div>


	";
    /*
	<tr>
	<td style='text-align:left;'><span style='color:#000;'>$arraydioma[144]</span>&nbsp;&nbsp;$newdate.</td>
	<td><a id='nombrenlace' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[1]'>$arrayfoto[1]</a></td>
	<td style='text-align:right;'><span style='color:#000;'>$arraydioma[24]</span>&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$arrayfoto[8]</a></td>
	</tr>
	<tr>
	<td style='text-align:left;'><span style='color:#000;'>$arraydioma[47]</span>&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[7]'>$arrayfoto[7].</a></td>
	<td><a id='nombrenlace' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[2]'>$arrayfoto[2]</a></td>
	<td style='text-align:right;'><span style='color:#000;'>$arraydioma[41]</span>&nbsp;&nbsp;$arrayfoto[11]&nbsp;$array7[0]</td>
	</tr>
	<tr>
	<td style='text-align:left;'>$totalcount&nbsp;&nbsp;$arraydioma[42]</td>
	<td><span style='color:#000;'>$arraydioma[23]</span>&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$arrayfoto[6]'>$arrayfoto[6]</a></td>
	<td style='text-align:right;'><span style='color:#000;'>$arraydioma[25]&nbsp;/&nbsp;$arraydioma[40]&nbsp;&nbsp;</span>$array6[0]&nbsp;/&nbsp;$array6[1]&nbsp;mts.</td>
	</tr>
	<tr>
	<td colspan='3'><div class='fb-like' data-href='http://www.airlinespotting.com/image/$idi/$version/$idfoto' data-layout='button_count' data-action='like' data-show-faces='false' data-share='true'></div></div></td>
	</tr> */
	echo"
	<a href='javascript:window.close();'>
	<div class='cerrar'>$arraydioma[22]</div></a>
	</div></div></div></div>";
}}}}}}}}

?>

</body></html>