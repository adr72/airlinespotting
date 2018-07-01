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
$orden=$_POST['orden'];
if(!isset($orden)){$orden=$_GET['orden'];}
if(!isset($orden)){$orden='Fecha';}
$asc=$_POST['asc'];
if(!isset($asc)){$asc=$_GET['asc'];}
if(!isset($asc)){$asc='DESC';}
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
$busca=$_POST['busca'];
if(!isset($busca)){$busca=$_GET['busca'];}
$buscado1=$_GET['bsc'];
$buscado=utf8_decode($buscado1);
$ord=$_GET['ord'];
$pagina=$_GET['pg'];
$titlegal=mysqli_query($conexion,"SELECT searchtitle FROM lang WHERE id='$idi'");
while($arraytgal=mysqli_fetch_array($titlegal)){
echo"Airlinespotting - $arraytgal[0]";
}
?>

</title>

<?php
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
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

<div id="contenedor">
<div id="contenidocom">
<div class="contetumbs6">
 
<?php
$idioma=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma=mysqli_fetch_array($idioma)){



if(isset($ord) && $ord!='0'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result2=mysqli_query($conexion,"SELECT * FROM aviones");
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY $ord DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result2);
$paginas=ceil($total/24);
echo"
<div class='contetitub4'>
<div class='contetitu2b'>
<span class='letranja3'>$arraydioma[104]</span>";if($ord=='fechaup'){echo"&nbsp;&nbsp;<span class='ambar'>$arraydioma[124]</span>";}else if($ord=='Fecha'){echo"&nbsp;&nbsp;<span class='ambar'>$arraydioma[123]</span>";}else if($ord=='clicks24'){echo"&nbsp;&nbsp;<span class='ambar'>$arraydioma[147]</span>";}else if($ord=='clicks'){echo"&nbsp;&nbsp;<span class='ambar'>$arraydioma[127]</span>";}echo"<br/><span class='letranja3'>$arraydioma[27]</span>&nbsp;&nbsp;<span class='ambar'>$total</span>
</div>
</div>
";

$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){echo"
<p>$arraypl[0]</p>
";}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}
if($ord=='fechaup'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result2=mysqli_query($conexion,"SELECT * FROM aviones");
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY $ord DESC, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result2);
$ultimafecha=mysqli_query($conexion,"SELECT MAX(fechaup) FROM aviones");
while($arrayultima=mysqli_fetch_array($ultimafecha)){
while($array=mysqli_fetch_array($result)){
$totalcount=$array[14];
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
$pais=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array[10]'");
while($arraypais=mysqli_fetch_array($pais)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($array[12]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$nombresin=str_replace(' ','-',$array[1]);
$autorsin=$array[4];
$lugarsin=str_replace(' ','-',$array[8]);
$company=str_replace("*","&","$array[10]");
$buscador=substr($array[8],9);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a></p>
<p class='letrafichas'>$arraydioma[143]&nbsp;$newdate$newdate3$newdates</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[143]&nbsp;$newdate$newdate3$newdates</p>

</div>";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
</a>
"; if($array[12]==$arrayultima[0]){if($idi=='EN'){echo"<p class='letrafichasmini'><span class='peke'>NEW PHOTO</span><br>";}else{echo"<p class='letrafichasmini'><span class='peke'>NUEVA FOTO</span><br>";}}else{
	echo"<p class='letrafichasminino'>";
}
echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
</div>";

}}}}}


else if($ord=='Fecha'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result2=mysqli_query($conexion,"SELECT * FROM aviones");
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY $ord DESC, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result2);
while($array=mysqli_fetch_array($result)){
$totalcount=$array[14];
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
$pais=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array[10]'");
while($arraypais=mysqli_fetch_array($pais)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($array[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$nombresin=str_replace(' ','-',$array[1]);
$autorsin=$array[4];
$lugarsin=str_replace(' ','-',$array[8]);
$company=str_replace("*","&","$array[10]");
$buscador=substr($array[8],9);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a></p>
<p class='letrafichas'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>

</div>";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'><img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />"; if($array[12]==$arrayultima[0]){if($idi=='EN'){echo"<img class='new' src='http://www.airlinespotting.com/imagenes/new.png' alt='$array[1]' />";}else{echo"<img class='new' src='http://www.airlinespotting.com/imagenes/nueva.png' alt='$array[1]' />";}}echo"</a>
<p class='letrafichasminino'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
</div>";

}}}}


else if($ord=='clicks24'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$totalclicks=mysqli_query($conexion,"SELECT * FROM aviones");
$result=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY (SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND aviones.id=clicks.idfoto) DESC LIMIT $inicio,24");
while($array=mysqli_fetch_array($result)){
	$totalcount=$array[14];
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayclicks24=mysqli_fetch_array($clicks24)){
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
$company=str_replace("*","&","$array[10]");
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($array[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$buscador=substr($array[8],9);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a></p>
<p class='letrafichas'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[7]&nbsp;&nbsp;$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'><img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />"; if($array[12]==$arrayultima[0]){if($idi=='EN'){echo"<img style='margin-top:-58%;margin-bottom:1.5%;' src='http://www.airlinespotting.com/imagenes/new.png' alt='$array[1]' />";}else{echo"<img style='margin-top:-58%;margin-bottom:1.5%;' src='http://www.airlinespotting.com/imagenes/nueva.png' alt='$array[1]' />";}}echo"</a>
<p class='letrafichasminino'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arrayclicks24[0]&nbsp;&nbsp;$arraydioma[7]</p>
</div>";

}}}}else if($ord=='clicks'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$totalclicks=mysqli_query($conexion,"SELECT * FROM aviones");
$total=mysqli_num_rows($totalclicks);
$clicks=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY total DESC LIMIT $inicio,24");
while($array=mysqli_fetch_array($clicks)){
$totalcount=$array[14];
$autor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario='$array[7]'");
while($arrayautor=mysqli_fetch_array($autor)){
if(substr_count($arrayautor[0]," ")>=2){
$para=strrpos($arrayautor[0]," ");
$nombre=substr($arrayautor[0],0,$para);}else{$nombre=$arrayautor[0];}
$autor2=str_replace(' ','&nbsp',$arrayautor[0]);
$autor64=base64_encode($array[7]);
$company=str_replace("*","&","$array[10]");
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($array[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$buscador=substr($array[8],9);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'>
<img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>

<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array[8]</a></p>
<p class='letrafichas'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[6]'>$array[6]</a></p>
<p class='letrafichaza'>$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array[0]'><img src=http://www.airlinespotting.com/$array[5] alt='$array[1]' />"; if($array[12]==$arrayultima[0]){if($idi=='EN'){echo"<img style='margin-top:-58%;margin-bottom:1.5%;' src='http://www.airlinespotting.com/imagenes/new.png' alt='$array[1]' />";}else{echo"<img style='margin-top:-58%;margin-bottom:1.5%;' src='http://www.airlinespotting.com/imagenes/nueva.png' alt='$array[1]' />";}}echo"</a>
<p class='letrafichasminino'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[1]'>$array[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array[2]'>$array[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[42]</p>
</div>";

}}}

$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){echo"
<p>$arraypl[0]</p>
";}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/$ord/0/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}

echo"
</div>
</div>
";}



if(isset($busca) && $ord=="0" && $buscado=="0"){
	
if($_SESSION['busqueda']==""){
	echo"
<div class='contetitub4'>
<div class='contetitu2b'>
<span class='letranja3'>$arraydioma[21]&nbsp;&nbsp;</span>0<br/><span class='letranja3'>$arraydioma[43]&nbsp;&nbsp;</span>-
</div>
</div>
";
}else{
	
$namecode=str_replace("'","&#39;",$busca);

if($orden=='clicks'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$busca%')");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$busca%') ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$busca."' OR etiqueta LIKE '".$busca."' OR matricula LIKE '".$busca."' OR autor LIKE '".$busca."' OR airport LIKE '".$busca."' OR location2 LIKE '".$busca."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$busca."' OR etiqueta LIKE '".$busca."' OR matricula LIKE '".$busca."' OR autor LIKE '".$busca."' OR airport LIKE '".$busca."' OR location2 LIKE '".$busca."' ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$busca%' OR etiqueta LIKE '%$busca%' OR matricula LIKE '%$busca%' OR autor LIKE '%$busca%' OR airport LIKE '%$busca%' OR location2 LIKE '%$busca%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE (Comp LIKE '%$namecode%' OR Avion LIKE '%$busca%' OR etiqueta LIKE '%$busca%' OR matricula LIKE '%$busca%' OR autor LIKE '%$busca%' OR airport LIKE '%$busca%' OR location2 LIKE '%$busca%') ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%' ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
}else{
	
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$busca%')");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$busca%') ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$busca."' OR etiqueta LIKE '".$busca."' OR matricula LIKE '".$busca."' OR autor LIKE '".$busca."' OR airport LIKE '".$busca."' OR location2 LIKE '".$busca."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$busca."' OR etiqueta LIKE '".$busca."' OR matricula LIKE '".$busca."' OR autor LIKE '".$busca."' OR airport LIKE '".$busca."' OR location2 LIKE '".$busca."' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$busca%' OR etiqueta LIKE '%$busca%' OR matricula LIKE '%$busca%' OR autor LIKE '%$busca%' OR airport LIKE '%$busca%' OR location2 LIKE '%$busca%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$busca%' OR etiqueta LIKE '%$busca%' OR matricula LIKE '%$busca%' OR autor LIKE '%$busca%' OR airport LIKE '%$busca%' OR location2 LIKE '%$busca%' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
}
echo"
<div class='contetitub4'>
<div class='contetitu2b'>
<span class='letranja3'>$arraydioma[21]&nbsp;&nbsp;</span><span class='ambar'>$total</span><br/><span class='letranja3'>$arraydioma[43]&nbsp;&nbsp;</span><span class='ambar'>$busca</span>
</div>
</div>
";
$matricula=substr($arraydioma[23],0,-1);
if($total!=0){
echo"<form action='http://www.airlinespotting.com/asign2/$idi/$version/0/$busca/0/page$pagina/$orden/$asc' method='post' id='reorden'><p>$arraydioma[121]&nbsp;&nbsp;<select id='order' name='orden'>
	<option ";if($orden=='matricula'){echo"selected";};echo" value='matricula'>$matricula</option>
	<option ";if($orden=='Comp'){echo"selected";};echo" value='Comp'>$arraydioma[122]</option>
	<option ";if($orden=='Fecha'){echo"selected";};echo" value='Fecha'>$arraydioma[123]</option>
	<option ";if($orden=='fechaup'){echo"selected";};echo" value='fechaup'>$arraydioma[124]</option>
	<option ";if($orden=='clicks'){echo"selected";};echo" value='clicks'>$arraydioma[127]</option>
	</select>
	<select id='order' name='asc'>
	<option ";if($asc=='DESC'){echo"selected";};echo" value='DESC'>$arraydioma[126]</option>
	<option ";if($asc=='ASC'){echo"selected";};echo" value='ASC'>$arraydioma[125]</option></select>
	<input id='order' type='submit' value='$arraydioma[14]' /></p></form>";

	$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){
	
}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}
	
	}

while($array2=mysqli_fetch_array($result2)){
$totalcount=$array2[14];
$autor=str_replace(' ','&nbsp',$array2[7]);
$result3=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($array3=mysqli_fetch_array($result3)){
$result6=mysqli_query($conexion,"SELECT longitud,envergadura FROM longitudes WHERE Avion='$array2[2]'");
while($array6=mysqli_fetch_array($result6)){
$result7=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array2[10]'");
while($array7=mysqli_fetch_array($result7)){
$titles=mysqli_query($conexion,"SELECT verfoto FROM lang WHERE id='$idi'");
while($arraytitles=mysqli_fetch_array($titles)){
$nombreautor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario LIKE '$autor'");
while($arraynomautor=mysqli_fetch_array($nombreautor)){
if(substr_count($arraynomautor[0]," ")>=2){
$para=strrpos($arraynomautor[0]," ");
$nombre=substr($arraynomautor[0],0,$para);}else{$nombre=$arraynomautor[0];}
$autor2=str_replace(' ','&nbsp',$arraynomautor[0]);
$autor64=base64_encode($array2[7]);
$longitud=str_replace(' ','&nbsp',$array3[25]);
$aerop=str_replace(' ','&nbsp',$array2[8]);
$actualurl=$_SERVER['REQUEST_URI'];
$location2=str_replace(' ','&nbsp',$array2[11]);
$nombre22=str_replace('&nbsp','~',$nombre2);
$nombre11=str_replace('&nbsp','~',$nombre);
$newdate=date("j/M/Y", strtotime($array2[13]));
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$newdate2=strtotime($array2[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$newdate5=strtotime($array2[12]);
$newdatee=strftime("%d&nbsp;/&nbsp;", $newdate5);
$newdatees=strftime("&nbsp;/&nbsp;%Y", $newdate5);
$newdate6=strftime("%B", $newdate5);
$newdate7=ucfirst($newdate6);
$mensaje=str_replace(' ','&nbsp;',$array3[112]);
$aeropuertocon=str_replace(' ','~',$array2[8]);
$nombretitle=str_replace("&nbsp","\u0020",$nombre);
$nombretitle2=str_replace("&nbsp","\u0020",$nombre2);
$buscador=substr($array2[8],9);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array2[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array2[0]'>
<img src=http://www.airlinespotting.com/$array2[5] alt='$array2[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>


<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array2[8]</a></p>
"; if($orden=="fechaup"){echo"
<p class='letrafichas'>$arraydioma[143]&nbsp;$newdatee$newdate7$newdatees</p>";}else{echo"
<p class='letrafichas'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>";}echo"

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a></p>
<p class='letrafichaza'>$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>
";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array2[0]'><img src=http://www.airlinespotting.com/$array2[5] alt='$array2[1]' /></a>
<p class='letrafichasminino'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
if($orden=='clicks'){echo"$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p></div>";}else{echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a></p>
</div>
";}

}}}}}}

$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){
}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/$busca/0/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}
}
echo"
</div>
</div>
";

}

if(isset($buscado) && $ord=="0" && $busca=="0" && $buscado!="0"){

$namecode=str_replace("'","&#39;",$buscado);
$buscado64=base64_decode($buscado);
	
if($orden=='clicks'){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$buscado%')");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$buscado%') ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$buscado."' OR matricula LIKE '".$buscado."' OR airport LIKE '".$buscado."' OR location2 LIKE '".$buscado."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$buscado."' OR matricula LIKE '".$buscado."' OR airport LIKE '".$buscado."' OR location2 LIKE '".$buscado."' ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$buscado%' OR matricula LIKE '%$buscado%' OR airport LIKE '%$buscado%' OR location2 LIKE '%$buscado%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE (Comp LIKE '%$namecode%' OR Avion LIKE '%$buscado%' OR matricula LIKE '%$buscado%' OR airport LIKE '%$buscado%' OR location2 LIKE '%$buscado%') ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%' ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '".$buscado64."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '".$buscado64."' ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
if($total!=0){$gal=1;}
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '%$buscado64%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE (autor LIKE '%$buscado64%') ORDER BY total $asc LIMIT $inicio,24");
$total=mysqli_num_rows($result);
if($total!=0){$gal=1;}
$paginas=ceil($total/24);
}
}else{
	
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$buscado64%')");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor IN(SELECT usuario FROM usuarios WHERE nombre LIKE '%$buscado64%') ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$buscado."' OR matricula LIKE '".$buscado."' OR airport LIKE '".$buscado."' OR location2 LIKE '".$buscado."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '".$namecode."' OR Avion LIKE '".$buscado."' OR matricula LIKE '".$buscado."' OR airport LIKE '".$buscado."' OR location2 LIKE '".$buscado."' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$buscado%' OR matricula LIKE '%$buscado%' OR airport LIKE '%$buscado%' OR location2 LIKE '%$buscado%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE Comp LIKE '%$namecode%' OR Avion LIKE '%$buscado%' OR matricula LIKE '%$buscado%' OR airport LIKE '%$buscado%' OR location2 LIKE '%$buscado%' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE concat_ws(' ', Comp, Avion) LIKE '%$namecode%' OR concat_ws(' ', Avion, Comp) LIKE '%$namecode%' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '".$buscado64."'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '".$buscado64."' ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
if($total!=0){$gal=1;}
$paginas=ceil($total/24);
}
if($total==0){
if(!isset($pagina)){$pagina=1;}
$inicio=($pagina-1)*24;
$result=mysqli_query($conexion,"SELECT * FROM aviones WHERE autor LIKE '%$buscado64%'");
$result2=mysqli_query($conexion,"SELECT * FROM aviones WHERE (autor LIKE '%$buscado64%') ORDER BY $orden $asc, id DESC LIMIT $inicio,24");
$total=mysqli_num_rows($result);
if($total!=0){$gal=1;}
$paginas=ceil($total/24);
}
}

echo"
<div class='contetitub4'>
<div class='contetitu2b'>";
if($gal==1){
$nombreautor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario LIKE '$buscado64'");
while($arraynomautor=mysqli_fetch_array($nombreautor)){
echo"
<span class='letranja3'>$arraydioma[87]&nbsp;&nbsp;</span><span class='ambar'>$arraynomautor[0]</span><br/><span class='letranja3'>$arraydioma[88]&nbsp;&nbsp;</span><span class='ambar'>$total</span>
</div>
</div>
";
}}else{
echo"
<span class='letranja3'>$arraydioma[21]&nbsp;&nbsp;</span><span class='ambar'>$total</span><br/><span class='letranja3'>$arraydioma[43]&nbsp;&nbsp;</span><span class='ambar'>$buscado</span>
</div>
</div>
";}
$matricula=substr($arraydioma[23],0,-1);
if($total!=0){
echo"<form action='http://www.airlinespotting.com/asign3/$idi/$version/0/0/$buscado/page$pagina/$orden/$asc' method='post' id='reorden'><p>$arraydioma[121]&nbsp;&nbsp;<select id='order' name='orden'>
	<option ";if($orden=='matricula'){echo"selected";};echo" value='matricula'>$matricula</option>
	<option ";if($orden=='Comp'){echo"selected";};echo" value='Comp'>$arraydioma[122]</option>
	<option ";if($orden=='Fecha'){echo"selected";};echo" value='Fecha'>$arraydioma[123]</option>
	<option ";if($orden=='fechaup'){echo"selected";};echo" value='fechaup'>$arraydioma[124]</option>
	<option ";if($orden=='clicks'){echo"selected";};echo" value='clicks'>$arraydioma[127]</option>
	</select>
	<select id='order' name='asc'>
	<option ";if($asc=='DESC'){echo"selected";};echo" value='DESC'>$arraydioma[126]</option>
	<option ";if($asc=='ASC'){echo"selected";};echo" value='ASC'>$arraydioma[125]</option></select>
	<input id='order' type='submit' value='$arraydioma[14]' /></p></form>";

	$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){
	
}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}
	
	}

while($array2=mysqli_fetch_array($result2)){
$totalcount=$array2[14];
$autor=str_replace(' ','&nbsp',$array2[7]);
$result3=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($array3=mysqli_fetch_array($result3)){
$result6=mysqli_query($conexion,"SELECT longitud,envergadura FROM longitudes WHERE Avion='$array2[2]'");
while($array6=mysqli_fetch_array($result6)){
$result7=mysqli_query($conexion,"SELECT $idi FROM paises WHERE id='$array2[10]'");
while($array7=mysqli_fetch_array($result7)){
$titles=mysqli_query($conexion,"SELECT verfoto FROM lang WHERE id='$idi'");
while($arraytitles=mysqli_fetch_array($titles)){
$nombreautor=mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE usuario LIKE '$autor'");
while($arraynomautor=mysqli_fetch_array($nombreautor)){
if(substr_count($arraynomautor[0]," ")>=2){
$para=strrpos($arraynomautor[0]," ");
$nombre=substr($arraynomautor[0],0,$para);}else{$nombre=$arraynomautor[0];}
$autor2=str_replace(' ','&nbsp',$arraynomautor[0]);
$autor64=base64_encode($array2[7]);
$longitud=str_replace(' ','&nbsp',$array3[25]);
$aerop=str_replace(' ','&nbsp',$array2[8]);
$actualurl=$_SERVER['REQUEST_URI'];
$location2=str_replace(' ','&nbsp',$array2[11]);
$nombre22=str_replace('&nbsp','~',$nombre2);
$nombre11=str_replace('&nbsp','~',$nombre);
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
$mensaje=str_replace(' ','&nbsp;',$array3[112]);
$aeropuertocon=str_replace(' ','~',$array2[8]);
$nombretitle=str_replace("&nbsp","\u0020",$nombre);
$nombretitle2=str_replace("&nbsp","\u0020",$nombre2);
$buscador=substr($array2[8],9);
$newdate2=strtotime($array2[4]);
$newdate=strftime("%d&nbsp;/&nbsp;", $newdate2);
$newdates=strftime("&nbsp;/&nbsp;%Y", $newdate2);
$newdate4=strftime("%B", $newdate2);
$newdate3=ucfirst($newdate4);
$newdate5=strtotime($array2[12]);
$newdatee=strftime("%d&nbsp;/&nbsp;", $newdate5);
$newdatees=strftime("&nbsp;/&nbsp;%Y", $newdate5);
$newdate6=strftime("%B", $newdate5);
$newdate7=ucfirst($newdate6);
$clicks24=mysqli_query($conexion,"SELECT COUNT(idfoto) FROM clicks WHERE date >= date_sub(NOW(), interval 24 hour) AND idfoto='$array2[0]'");
while($arrayc24=mysqli_fetch_array($clicks24)){
	$c24=$arrayc24[0];
}

echo"
<div class='fichas'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array2[0]'>
<img src=http://www.airlinespotting.com/$array2[5] alt='$array2[1]' />
<p class='flotante'>&nbsp;&nbsp;$nombre&nbsp;&copy;</p>
</a>


<p class='letrafichas'><a class='ambar' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a><a class='visa'>$c24&nbsp;&nbsp;$arraydioma[7]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a></a><a class='visa'>$totalcount&nbsp;&nbsp;$arraydioma[42]</a></p>
<p class='letrafichas'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscador'>$array2[8]</a></p>
"; if($orden=="fechaup"){echo"
<p class='letrafichas'>$arraydioma[143]&nbsp;$newdatee$newdate7$newdatees</p>";}else{echo"
<p class='letrafichas'>$arraydioma[144]&nbsp;$newdate$newdate3$newdates</p>";}echo"

<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a></p>
<p class='letrafichaza'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a></p>
<p class='letrafichaza'>$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>

</div>
";

echo"
<div class='fichasmini'>
<a target='_blank' href='http://www.airlinespotting.com/image/$idi/$version/$array2[0]'><img src=http://www.airlinespotting.com/$array2[5] alt='$array2[1]' /></a>
<p class='letrafichasminino'><a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[1]'>$array2[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[2]'>$array2[2]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
if($orden=='clicks'){echo"$arraydioma[42]&nbsp;&nbsp;$totalcount&nbsp;&nbsp;$arraydioma[109]</p>
</div>";}else{echo"
<a href='http://www.airlinespotting.com/search/$idi/$version/0/0/$array2[6]'>$array2[6]</a></p>
</div>
";}

}}}}}}

$noplanes=mysqli_query($conexion,"SELECT noplanes,totalpag,pag,pagant,pagsig,primera,ultima FROM lang WHERE id='$idi'");
while($arraypl=mysqli_fetch_array($noplanes)){
$pag=$_SERVER['QUERY_STRING'];
$url=$_SERVER['PHP_QUERY'];
$maspag=$pagina+1;
$menospag=$pagina-1;
if($total==0){
}else if($paginas>10){if($pagina!=1 && $pagina!=$paginas){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	$inicio=$tope-9;
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page1'>$arraypl[5]&nbsp;</a>";}echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	for ($a=$inicio; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	if($pagina+9>=$paginas){$tope=$paginas;}else{$tope=$pagina+9;}
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=$pagina; $a<=$tope; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]&nbsp;</a>";
	if($tope!=$paginas){echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$paginas'>$arraypl[6]</a>";}
	echo"</p></div>";
	
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	if($inicio!=1){echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page1/$orden/$asc'>$arraypl[5]&nbsp;</a>";}
	echo"/&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=$paginas-9; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}


else if($pagina!=1 && $pagina!=$paginas){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==1 && $paginas!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas' id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$maspag/$orden/$asc'>$arraypl[4]</a>";
	echo"</p></div>";
	
}else if($pagina==$paginas && $pagina!=1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	echo"&nbsp;&nbsp;<a id='paginas' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$menospag/$orden/$asc'>$arraypl[3]&nbsp;&nbsp;</a>";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}else if($pagina==1 && $paginas==1){
	echo"
	<div class='totalpag'><p style='text-align:left;'>$arraypl[1]&nbsp;&nbsp;&nbsp;$paginas</p>
	<p class='pagright'>$arraypl[2]&nbsp;&nbsp;&nbsp;";
	for ($a=1; $a<=$paginas; $a++){echo "<a id='paginas'";if($a==$pagina){echo" class='activa'";}echo" href='http://www.airlinespotting.com/search/$idi/$version/0/0/$buscado/page$a/$orden/$asc'>$a&nbsp;&nbsp;</a>";}
	echo"</p></div>";
	
}}

echo"
</div>
</div>
";

}

}

?>
</div>
</div>
</div>
<?php
echo"<div style='text-align:center;margin-bottom:20px;'>";

?>

</div>

<?php
include("includes/footer.php");
?>
</body></html>