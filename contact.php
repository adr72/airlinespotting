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
$result=mysqli_query($conexion,"SELECT menusup2 FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
Airlinespotting - $array[0]";}
?>

</title>

  <script type="text/javascript">
  //<![CDATA[
  function validar(){
	var n=valname();
	var a=valemail();
	var e=valmessage();
	if(n==false || a==false || e==false){return false;}
 }
  function valname(){
				var nam=document.getElementById("name").value;
				if(nam==null || nam.length==0 || nam=='Required field'){
					document.getElementById("name").value="Required field";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="orangered";
					return false;
				}else if(!(/\w{1,}\s{1,}\w{1,}/.test(nam)) || nam=='Insert Full Name'){
					document.getElementById("name").value="Insert Full Name";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="orangered";
					return false;
				    }else{
					document.getElementById("nam").style.color="#000";
          			document.getElementById("name").style.textAlign="left";
					return true;
				}
				
  }
  function valemail(){

  				var em=document.getElementById("email").value;
				if(em==null || em.length==0 || em=='Required Field'){
					document.getElementById("email").value="Required Field";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="orangered";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em)) || em=='Invalid e-mail format'){
		document.getElementById("email").value="Invalid e-mail format";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="orangered";
		return false;
	    }else{
					document.getElementById("emai").style.color="#000";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}
				
  }
  function valmessage(){

  				var mes=document.getElementById("mess").value;
				if(mes==null || mes.length==0 || mes=='Required Field'){
					document.getElementById("mess").value="Required Field";
					document.getElementById("mess").style.textAlign="center";
					document.getElementById("mes").style.color="orangered";

					return false;
				}else{
					document.getElementById("mes").style.color="#000";
          			document.getElementById("mess").style.textAlign="left";
					return true;
				}
				
  }
  
   function validar2(){
	var n=valname2();
	var a=valemail2();
	var e=valmessage2();
	if(n==false || a==false || e==false){return false;}
 }
  function valname2(){

  				var nam=document.getElementById("name").value;
				if(nam==null || nam.length==0 || nam=='Campo Obligatorio'){
					document.getElementById("name").value="Campo Obligatorio";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="orangered";
					return false;
				}else if(!(/\w{1,}\s{1,}\w{1,}/.test(nam)) || nam=='Introduce Nombre Completo'){
					document.getElementById("name").value="Introduce Nombre Completo";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="orangered";
					return false;
				    }else{
					document.getElementById("nam").style.color="#000";
          			document.getElementById("name").style.textAlign="left";
					return true;
				}

				
  }
  function valemail2(){
				var em=document.getElementById("email").value;
				if(em==null || em.length==0 || em=='Campo Obligatorio'){
					document.getElementById("email").value="Campo Obligatorio";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="orangered";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em)) || em=='Formato de e-mail no v\u00E1lido'){
		document.getElementById("email").value="Formato de e-mail no v\u00E1lido";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="orangered";
		return false;
	    }else{
					document.getElementById("emai").style.color="#000";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}
				
  }
  function valmessage2(){
				var mes=document.getElementById("mess").value;
				if(mes==null || mes.length==0 || mes=='Campo Obligatorio'){
					document.getElementById("mess").value="Campo Obligatorio";
					document.getElementById("mess").style.textAlign="center";
					document.getElementById("mes").style.color="orangered";

					return false;
				}else{
					document.getElementById("mes").style.color="#000";
          			document.getElementById("mess").style.textAlign="left";
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
$activa="contact";
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

<div id="contenedorcontact">
  
 <?php 

       //comenzamos recogiendo los datos
       function recogeDato($campo)
	   { 
       return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
       } //la función recogeDatos comprueba si se ha recibido un dato y recoge su valor
   
       //si no se ha recibido, le asigna un valor vacío.
       $name    = recogeDato('name');
       $email   = recogeDato('email'); //asignamos cada valor a una variable
       $city  = recogeDato('city');
       $country    = recogeDato('country');
       $message   = recogeDato('mess');
       $nombre=utf8_encode($name);
       $ciudad=utf8_encode($city);
       $pais=utf8_encode($country);
       $mensage=utf8_encode($message);
      
      
     if (isset($_REQUEST['submit'])){
	   $headers="Content-Type: text/html; charset=UTF-8";
       $para="adr72@msn.com"; //si todo es correcto, enviamos el correo
       $asunto="CONTACTO WEB AIRLINESPOTTING - consulta de ".$nombre;
       $mensaje="Datos del formulario de contacto:<br/>". //creamos el mensaje con los datos
				   "Nombre: ".$nombre.".<br/>".
				   "E-mail: ".$email."<br/>".
				   "Ciudad: ".$ciudad.".<br/>".
				   "Pais: ".$pais.".<br/>".
				   "Consulta: ".$mensage;
       mail($para, $asunto, $mensaje,$headers); //y lo enviamos
       $resultado=mysqli_query($conexion,"SELECT contactresp,contactvolver FROM lang WHERE id LIKE '$idi'");
		while($array=mysqli_fetch_array($resultado)){echo"
       <p id='introcontact'>$array[0]</p>
	   <p style='text-align:center;'><button class='botonazul' onclick=window.location.assign('http://www.airlinespotting.com/contact/$idi')>$array[1]</button></p>";
       }} else {
        
       ?>
<form <?php echo"action='http://www.airlinespotting.com/contact/$idi'" ?> method="post" onsubmit=<?php if($idi=='EN'){echo"'return validar();'>";}elseif($idi=='ES'){echo"'return validar2();'>";}else{echo"'return validar3();'>";}
 $result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
 
<p class='introcontact'>$array[8]</p>
<div id='contetable'>
<table>
<tr>
<th colspan='3'>$array[9]</th>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td id='nam' class='pri'>$array[10] * :</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valname();";}elseif($idi=='ES'){echo"valname2();";}echo"
 name='name' id='name' /></td>
<td style='width:10%;' id='namei'></td>
</tr>
<tr>
<td id='emai' class='pri'>E-mail * :</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valemail();";}elseif($idi=='ES'){echo"valemail2();";}echo"
name='email' id='email' /></td>
<td id='emaili'></td>
</tr>
<tr>
<td class='pri'>$array[11] :</td>
<td><input type='text' class='campoazul' name='city' /></td>
<td id='city'></td>
</tr>
<tr>
<td class='pri'>$array[12] :</td>
<td><input type='text' class='campoazul' name='country' /></td>
<td id='country'></td>
</tr>
<tr>
<td id='mes' class='pri'>$array[13] * :</td>
<td><textarea onfocus=this.value='';this.style.textAlign='left'; cols='20' rows='5' name='mess' id='mess' class='campoazul' onblur=";
if($idi=='EN'){echo"valmessage();";}elseif($idi=='ES'){echo"valmessage2();";}echo"
></textarea></td>
<td id='messi'></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul' type='submit' value='$array[14]' name='submit' /><input class='botonazul' type='reset' value='$array[15]' /></td>
</tr>
<tr>
<td colspan='3'>* $array[16]</td>
</tr>";}
?>
</table>
</div>
</form>
<?php
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