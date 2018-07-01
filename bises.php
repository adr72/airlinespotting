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
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
$vis=$_GET['vis'];
if(!isset($vis)){$vis='clicks';}
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
$idioma=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma=mysqli_fetch_array($idioma)){
  ?>
<div class="contetumbs3">
<?php
if($vis=='24'){
  $masvistas=utf8_encode($arraydioma[141]);
  $mas24=utf8_encode($arraydioma[147]);
echo"
<div class='contetitu'>
<div class='contetitu2'>
<p><a href= javascript:mostrar('http://www.airlinespotting.com/bises.php?id=$idi&vis=clicks&version=$version'); ><span class='landa2' title='$masvistas'>$masvistas</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='landa'>$mas24</span><a href='http://www.airlinespotting.com/search/$idi/$version/clicks24' title='$arraydioma[151]'><span class='latest3'>$arraydioma[154] >>></span></a></p>
";
?>
</div>
</div>
<?php
$pasovar3=1;
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY (SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND aviones.id=clicks.idfoto) DESC, id DESC LIMIT 4");
while($array=mysqli_fetch_array($result)){
$compa=utf8_encode($array[1]);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayclicks24=mysqli_fetch_array($clicks24)){
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$autor3=substr($arrayautor[0],0,$para);}else{$autor3=$arrayautor[0];}
$nombre22=utf8_encode($autor3);
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$lugar=utf8_encode($array[1]);
$compy=$array[1];

echo"
<div class='fichass$pasovar3'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre22&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$compy</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichas'>$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[7]</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[7]&nbsp;&nbsp;$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

$pasovar3++;
}}}
}else{
  $masvistas=utf8_encode($arraydioma[141]);
  $mas24=utf8_encode($arraydioma[147]);
  echo"
<div class='contetitu'>
<div class='contetitu2'>
<p><span class='landa'>$masvistas</span><a href='http://www.airlinespotting.com/search/$idi/$version/clicks' title='$arraydioma[151]'><span class='latest3'>$arraydioma[154] >>></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href= javascript:mostrar('http://www.airlinespotting.com/bises.php?id=$idi&vis=24&version=$version'); title='$mas24'><span class='landa2'>$mas24</span></a></p>";
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
$autor3=substr($arrayautor[0],0,$para);}else{$autor3=$arrayautor[0];}
$nombre22=utf8_encode($autor3);
$company=str_replace("*","&","$array[10]");
$newdate2=date("j/M/Y", strtotime($array[4]));
$buscador=substr($array[8],9);
$lugar=utf8_encode($array[1]);
$compy=$array[1];

echo"
<div class='fichass$pasovar2'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre22&nbsp;&copy;</p>
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
}
 ?>
</div>