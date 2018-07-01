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
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
$idioma=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma=mysqli_fetch_array($idioma)){
  ?>
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
  $compa=utf8_encode($array[1]);
  $count=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clicks WHERE idfoto='$array[0]'"));
  $totalcount=$count;
  $autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$nombre22=utf8_encode($nombre);
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

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[142]&nbsp;$newdate2</p>

<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[7]'>$nombre&nbsp;&copy;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[142]&nbsp;$newdate2</p>
<p class='letrafichasmini'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

$pasovar3++;
}}
}
 ?>
</div>