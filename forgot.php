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
echo"
Airlinespotting - Login";

?>

</title>

<script type="text/javascript">
  //<![CDATA[
  function validar(){
	var d=valemail();
	if(d==false){return false;}
 }
 
 
  function valemail(){
				var em=document.getElementById("email").value;
				if(em==null || em.length==0){
					document.getElementById("email").value="Required Field";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="#000";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em))){
		document.getElementById("email").value="Invalid e-mail format";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="#000";
		return false;}else{
					document.getElementById("emai").style.color="#EAEEF7";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}
				
  }
  
  
   function validar2(){
	var d=valemail2();
	if(d==false){return false;}
 }
 
 
  function valemail2(){
				var em=document.getElementById("email").value;
				if(em==null || em.length==0){
					document.getElementById("email").value="Campo Obligatorio";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="#000";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em))){
		document.getElementById("email").value="Formato de e-mail no v\u00E1lido";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="#000";
		return false;}else{
					document.getElementById("emai").style.color="#EAEEF7";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}
				
  }
  
  
  //]]>
  </script>

<?php
if(!$_GET['version']){$version='MB';}else{
$version=$_GET['version'];}
if($version=='WB'){
include("includes/header2.php");}else if($version=='MB'){
include("includes/header.php");}
$activa="login";		
include ("includes/menu.php");
include("includes/banner3.php");

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

<div id="contenedor" style="text-align:center;">

 <?php 
       //comenzamos recogiendo los datos
       function recogeDato($campo)
	   { 
       return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
       } //la función recogeDatos comprueba si se ha recibido un dato y recoge su valor
   
       //si no se ha recibido, le asigna un valor vacío.
	   $email=recogeDato('email');
	if (isset($_REQUEST['submit'])){
		$respuestas=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
		while($array6=mysqli_fetch_array($respuestas)){
		$comuser=mysqli_query($conexion,"SELECT email FROM usuarios");
		while($array5=mysqli_fetch_array($comuser)){
			if($email==$array5[0]){$userex=1;}}
		if($userex!=1){echo"<p class='introcontactlogin'>$array6[68]</p>
	   <p style='text-align:center;'><button class='botonazul' onclick=window.location.assign('http://www.airlinespotting.com/forgot/$idi/$version')>$array6[69]</button></p>
	   <p style='text-align:center;'><a href='http://www.airlinespotting.com/login/$idi/$version'><button class='botonazul'>$array6[66]</button></a></p><br/>";}else{
	   $envio=mysqli_query($conexion,"SELECT * FROM usuarios WHERE email LIKE '$email'");
	   while($array=mysqli_fetch_array($envio)){
	   $para=$email;
	   $asunto="Web 'Airlinespotting'.";
	   $mensaje="$array6[79] $array[3]:
	   $array6[80] $array[1].
	   $array6[81] $array[2].
	   $array6[78]
	   Fco. Escudero.";
	   mail($para, $asunto, $mensaje);
	   echo"
	   <p class='introcontactlogin'>$array6[82]</p>
	   <p style='text-align:center;'><a href='http://www.airlinespotting.com/login/$idi/$version'><button class='botonazul'>$array6[66]</button></a></p><br/>";
		}}
		 
}}else{

?>

<?php
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
<p class='introcontactlogin'>$array[67]</p>
<div id='contetable2'>
<form <action='http://www.airlinespotting.com/forgot/$idi/$version'"  ?> method="post" onsubmit=<?php if($idi=='EN'){echo"'return validar();'>";}elseif($idi=='ES'){echo"'return validar2();'>";} ?>
<?php
echo"
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td id='emai' class='pri'>E-mail:</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul2' onblur=";
if($idi=='EN'){echo"valemail();";}elseif($idi=='ES'){echo"valemail2();";}echo"name='email' id='email' /></td>
<td id='emaili' style='width:5%;'></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' type='submit' value='$array[14]' name='submit' /><input class='botonazul2' type='reset' value='$array[15]' /></td>
</tr>
<tr>
<td colspan='3'><a href='http://www.airlinespotting.com/login/$idi/$version'><input class='botonazul' type='button' value='$array[34]' /></a></td>
</tr>
";} 

?>
</table>
</form>
</div>
<?php
       }

?> 

				    
<?php
echo"<div style='text-align:center;margin-bottom:20px;'>";
?>

</div>

<?php
include("includes/footer.php");
?>

</body></html>