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
$result=mysqli_query($conexion,"SELECT menusup1 FROM lang WHERE id='$idi'");
while($array=mysqli_fetch_array($result)){echo"
Airlinespotting - $array[0]";}

?>

</title>

<?php
mysqli_query($conexion, "DELETE FROM clicks WHERE date < DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
mysqli_query($conexion, "DELETE FROM temp_usuarios WHERE fecha < DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
$vis=$_GET['vis'];
if(!isset($vis)){$vis='24';}
$activa="index";    
if(isset($_SESSION['user'])){
$usuario=$_SESSION['user'];}else{$usuario='adr72';}
$super=mysqli_query($conexion,"SELECT numero FROM usuarios WHERE usuario='$usuario'");
while($superadmin=mysqli_fetch_array($super)){
if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){
  include ("includes/menu.php");
}else{
  include ("includes/menu.php");
  
  include("includes/barracookies.php"); 
}}
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

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

 <script>
 function mostrarContenido(url){
var contenedor;
contenedor = document.getElementById("contenidoazar");
$(contenedor).load(url);
}
</script>

<script>
 function mostrar(url){
var conten;
conten = document.getElementById("contenidopri");
$(conten).load(url);
}
</script>

</head><body id='top'>
  
  <div id="contenedor">

<?php

$idioma=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma=mysqli_fetch_array($idioma)){

echo"
<div id='conteslider'>
";
$ultimafecha=mysqli_query($conexion,"SELECT MAX(fechaup) FROM aviones");
while($arrayultima=mysqli_fetch_array($ultimafecha)){
$newdate=date("j/M/Y", strtotime($arrayultima[0]));

echo"
<section class='slider'>
          <ul class='slides'>

<p id='latest'><a href='http://www.airlinespotting.com/search/$idi/$version/Fecha' title='$arraydioma[151]'><span class='latest1'>$arraydioma[154]"; if($idi=='ES'){echo" por ";}else{echo" by ";} echo"$arraydioma[123]>>></span></a>$arraydioma[140]<a href='http://www.airlinespotting.com/search/$idi/$version/fechaup' title='$arraydioma[151]'><span class='latest2'>$arraydioma[154]"; if($idi=='ES'){echo" por ";}else{echo" by ";} echo"$arraydioma[124]>>></span></a></p>";

$result3=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($array3=mysqli_fetch_array($result3)){
$cuento=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY fechaup DESC, id DESC LIMIT 9");
while($array=mysqli_fetch_array($result)){
$autor=str_replace(' ','&nbsp',$array[7]);
$nombre=str_replace(' ','&nbsp',$array[1]);
$nombre2=str_replace(' ','&nbsp',$array[2]);
$nombreautor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario LIKE '$autor'");
while($arraynomautor=mysqli_fetch_array($nombreautor)){
$autor2=str_replace(' ','&nbsp',$arraynomautor[0]);
$autor64=base64_encode($array[7]);
if(substr_count($arraynomautor[0]," ")>=2){
$para=strrpos($arraynomautor[0]," ");
$autor3=substr($arraynomautor[0],0,$para);}else{$autor3=$arraynomautor[0];}
$mensaje=str_replace(' ','&nbsp;',$array3[112]);
$nombretitle=str_replace("&nbsp","\u0020",$nombre);
$nombretitle2=str_replace("&nbsp","\u0020",$nombre2);
$newarray=str_replace("fotos/","fotoslider/",$array[3]);
$compy=$array[1];
$namecode=str_replace("'","&#39;",$compy);
$avi=$array[2];
$matr=$array[6];
$primerab=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE matricula='$matr'"));
$primerabc=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp='$namecode'"));
$primerabcd=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE Avion='$avi'"));
echo"
            
          <li class='pic$cuento'>
            <a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
            <img src='http://www.airlinespotting.com/$array[5]' alt='$array[0]' />
            <p class='flotante'>&nbsp;&nbsp;$autor3&nbsp;&copy;</p>
            "; if($array[12]==$arrayultima[0]){
            	if($idi=='EN'){
            		if($primerabc==1){
                  echo"<p class='pickyp'>1st PHOTO OF THIS AIRLINE</p>";
                }
                 else if($primerabcd==1){
                  echo"<p class='pickyp'>1st PHOTO OF THIS AIRPLANE MODEL</p>";
                }
                else if($primerab==1){
                  echo"<p class='pickyp'>1st PHOTO OF THIS AIRPLANE</p>";
                }
            		else{echo"<p class='picky'>NEW PHOTO</p>";}}
            		else{
            			if($primerabc==1){echo"<p class='pickyp'>1ra FOTO DE ESTA AEROLINEA</p>";}
            			else if($primerabcd==1){echo"<p class='pickyp'>1ra FOTO DE ESTE MODELO DE AVION</p>";}
                  else if($primerab==1){echo"<p class='pickyp'>1ra FOTO DE ESTE AVION</p>";}
            			else{echo"<p class='picky'>NUEVA FOTO</p>";}}} echo"
            </a>

            <p class='letrapic$cuento'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
            <p class='letrapic$cuento'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
            
            <p class='miniletrapic$cuento'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
            </li>";}
$cuento++;
}}
echo"       </ul>
      </section>
      </div>";
 
include("includes/submenu.php");
include("includes/banner.php");
?>

<div id="contenido">
<?php
echo"<p class='introcontact3'>$arraydioma[1]</p>";
?>
<?php
echo"
<div class='contetumbstul'>
<a href='http://www.airlinespotting.com/search/$idi/$version/fechaup' title='$arraydioma[151]'><div class='contetitul'>
<div class='contetitu2'>
<p>$arraydioma[140]</p>";
?>
</div>
</div></a>
<?php
$pasovar=1;
$ultimafecha=mysqli_query($conexion,"SELECT MAX(fechaup) FROM aviones");
while($arrayultima=mysqli_fetch_array($ultimafecha)){
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE fechaup='$arrayultima[0]' ORDER BY nombre");
$result3=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY fechaup DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result3)){
$count=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clicks WHERE idfoto='$array[0]'"));
$totalcount=$count;
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$newdate=date("j/M/Y", strtotime($array[13]));
$buscador=substr($array[8],9);
$compy=$array[1];
$namecode=str_replace("'","&#39;",$compy);
$avi=$array[2];
$matr=$array[6];
$primera=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp='$namecode' AND Avion='$avi'"));
$primerab=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE matricula='$matr'"));
$primerabc=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp='$namecode'"));
$primerabcd=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones WHERE Avion='$avi'"));

echo"
<div class='fichasmini$pasovar'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
</a>
"; if($array[12]==$arrayultima[0]){
  if($idi=='EN'){
  	  if($primerabc==1){
                  echo"<p class='letrsfichasmini'><span class='peke'>1st PHOTO OF THIS AIRLINE</span><br>";
                }
               else if($primerabcd==1){
                  echo"<p class='letrsfichasmini'><span class='peke'>1st PHOTO OF THIS AIRPLANE MODEL</span><br>";
                }
     else if($primerab==1){
                  echo"<p class='letrafichasmini'><span class='peke'>1st PHOTO OF THIS AIRPLANE</span><br>";
                }
    else{echo"<p class='letrafichasmini'><span class='peke'>NEW PHOTO</span><br>";}}
      else{
      	if($primerabc==1){echo"<p class='letrafichasmini'><span class='peke'>1ra FOTO DE ESTA AEROLINEA</span><br>";}
      	else if($primerabcd==1){echo"<p class='letrafichasmini'><span class='peke'>1ra FOTO DE ESTE MODELO DE AVION</span><br>";}
      else if($primerab==1){echo"<p class='letrafichasmini'><span class='peke'>1ra FOTO DE ESTE AVION</span><br>";}
      else{echo"<p class='letrafichasmini'><span class='peke'>NUEVA FOTO</span><br>";}}}else{
	echo"<p class='letrafichasminino'>";
}
echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
</div>";

$pasovar++;
}}}}
 ?>
</div>
</div>


<div id="contenidopri">
<div class="contetumbs3">
<?php
if($vis=='24'){
echo"
<div class='contetitu'>
<div class='contetitu2'>
<p><a href= javascript:mostrar('http://www.airlinespotting.com/bises.php?id=$idi&vis=clicks&version=$version'); ><span class='landa2' title='$arraydioma[141]'>$arraydioma[141]</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='landa'>$arraydioma[147]</span><a href='http://www.airlinespotting.com/search/$idi/$version/clicks24' title='$arraydioma[151]'><span class='latest3'>$arraydioma[154] >>></span></a></p>
";

?>
</div>
</div>
<?php
$pasovar3=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY (SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND aviones.id=clicks.idfoto) DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result)){
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayclicks24=mysqli_fetch_array($clicks24)){
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$compy=$array[1];

echo"
<div class='fichass$pasovar3'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>


<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichas'>$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[7]</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[7]</p>

</div>";

$pasovar3++;
}}}
}else{
  echo"
<div class='contetitu'>
<div class='contetitu2'>
<p><span class='landa'>$arraydioma[141]</span><a href='http://www.airlinespotting.com/search/$idi/$version/clicks' title='$arraydioma[151]'><span class='latest3'>$arraydioma[154] >>></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href= javascript:mostrar('http://www.airlinespotting.com/bises.php?id=$idi&vis=24&version=$version'); title='$arraydioma[147]'><span class='landa2'>$arraydioma[147]</span></a></p>";
?>
</div>
</div>
<?php
$pasovar2=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY total DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result)){
$totalcount=$array[14];
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$compy=$array[1];

echo"
<div class='fichass$pasovar2'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichas'>$totalcount&nbsp;&nbsp;$arraydioma[42]</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

$pasovar2++;
}}
}
 ?>
</div>
</div>


<div id="contenido">
<div class="contetumbs33">
<?php
echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/clicks24' title='$arraydioma[151]'><div class='contetitul'>
<div class='contetitu2'><p>$arraydioma[147]</p>
";
?>
</div>
</div></a>
<?php
$pasovar3=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY (SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND aviones.id=clicks.idfoto) DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result)){
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayclicks24=mysqli_fetch_array($clicks24)){
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);

echo"
<div class='fichassmini$pasovar3'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'><img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' /></a>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[7]</a></p>
</div>";

$pasovar3++;
}}}
 ?>
</div>
</div>


<div id="contenido">
<div class="contetumbs33">
<?php
echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/clicks' title='$arraydioma[151]'><div class='contetitul'>
<div class='contetitu2'>
<p>$arraydioma[141]</p>";
?>
</div>
</div></a>
<?php
$pasovar2=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY total DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result)){
$totalcount=$array[14];
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$compy=$array[1];

echo"
<div class='fichass$pasovar2'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[7]'>$nombre&nbsp;&copy;</a>&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[142]&nbsp;$newdate2</p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

echo"
<div class='fichassmini$pasovar2'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'><img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' /></a>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
</div>";

$pasovar2++;
}}
 ?>
</div>
</div>


  <div id="contenidoazar">
  <div class="contetumbs3">
  <div class="contetitu">
  <div class="contetitu2">
  <?php
  echo"
 <p class='none'>$arraydioma[113]<a href= javascript:mostrarContenido('http://www.airlinespotting.com/azar.php?id=$idi&version=$version'); title='$arraydioma[155]'><span class='latest4'>$arraydioma[155] >>></span></a></p>";
  ?>
  </div>
  </div>
  <?php
  $pasovar3=1;
  $result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY RAND() LIMIT 4");
  while($array=mysqli_fetch_array($result)){
  $count=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clicks WHERE idfoto='$array[0]'"));
  $totalcount=$count;
  $autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$compy=$array[1];

echo"
<div class='fichass$pasovar3'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[142]&nbsp;$newdate2</p>

<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[7]'>$nombre&nbsp;&copy;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[142]&nbsp;$newdate2</p>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

$pasovar3++;
}}
 ?>
</div>
</div>

</div>
<?php
echo"<p class='introcontact4'>$arraydioma[114]</p>";
}
include("includes/banner2.php");
?>
 


<?php
include("includes/footer.php");
?>
</body></html>