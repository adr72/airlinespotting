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
$result=mysqli_query($conexion,"SELECT register FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
Airlinespotting - $array[0]";}
?>

</title>

<script type="text/javascript">
  //<![CDATA[
  function validar(){
	var a=valuser();
	var b=valpass();
	var c=valname();
	var d=valemail();
	var e=valcheck();
	if(a==false || b==false || c==false || d==false || e==false){return false;}
 }
 
 function valuser(){
				var use=document.getElementById("user").value;
				if(use==null || use.length==0 || use=='Required Field'){
					document.getElementById("user").value="Required Field";
					document.getElementById("user").style.textAlign="center";
					document.getElementById("use").style.color="#000";
					return false;
				}else if(use.length>20 || use=='Max. 20 characters'){
					document.getElementById("user").value='Max. 20 characters';
					document.getElementById("user").style.textAlign="center";
					document.getElementById("use").style.color="#000";
					return false;
				}else{
					document.getElementById("use").style.color="#EAEEF7";
          			document.getElementById("user").style.textAlign="left";
					return true;
				}
				
  }
  
  function valpass(){
				var pas=document.getElementById("pass").value;
				if(pas==null || pas.length==0 || pas=='Required Field'){
					document.getElementById("pass").value="Required Field";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
					return false;
				}else if(!(/\w{5,}/.test(pas)) || pas=='Min. 5 characters'){
					document.getElementById("pass").value="Min. 5 characters";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
				}else if(pas.length>20 || pas=='Max. 20 characters'){
					document.getElementById("pass").value="Max. 20 characters";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
					return false;
					}else{
					document.getElementById("pas").style.color="#EAEEF7";
          			document.getElementById("pass").style.textAlign="left";
					return true;
				}
				
  }
  
  function valname(){
				var nam=document.getElementById("name").value;
				if(nam==null || nam.length==0 || nam=='Required Field'){
					document.getElementById("name").value="Required Field";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="#000"; 
		
					return false;
				}else if(!(/\w{1,}\s{1,}\w{1,}/.test(nam)) || nam=='Insert Full Name'){
					document.getElementById("name").value="Insert Full Name";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="#000"; 
					return false;
				    }else{ 
					document.getElementById("nam").style.color="#EAEEF7";
          			document.getElementById("name").style.textAlign="left";
					return true;
				}
				
  }
  function valemail(){
				var em=document.getElementById("email").value;
				if(em==null || em.length==0 || em=='Required Field'){
					document.getElementById("email").value="Required Field";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="#000";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em)) || em=='Invalid e-mail format'){
		document.getElementById("email").value="Invalid e-mail format";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="#000";
		return false;}else{
					document.getElementById("emai").style.color="#EAEEF7";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}
				
  }
  
  function valcheck(){
	var check=document.getElementById("check").checked;
	if(check == false){
	document.getElementById("checki").innerHTML="You have to accept the terms.";
	return false;}else{
		return true;
	}
  }
  
  
   function validar2(){
	var a=valuser2();
	var b=valpass2();
	var c=valname2();
	var d=valemail2();
	var e=valcheck2();
	if(a==false || b==false || c==false || d==false || e==false){return false;}
 }
 
 function valuser2(){

 				var use=document.getElementById("user").value;
				if(use==null || use.length==0 || use=='Campo Obligatorio'){
					document.getElementById("user").value="Campo Obligatorio";
					document.getElementById("user").style.textAlign="center";
					document.getElementById("use").style.color="#000";
					return false;
				}else if(use.length>20 || use=='Max. 20 caracteres'){
					document.getElementById("user").value='Max. 20 caracteres';
					document.getElementById("user").style.textAlign="center";
					document.getElementById("use").style.color="#000";
					return false;
				}else{
					document.getElementById("use").style.color="#EAEEF7";
          			document.getElementById("user").style.textAlign="left";
					return true;
				}

				
  }
  
  function valpass2(){

  				var pas=document.getElementById("pass").value;
				if(pas==null || pas.length==0 || pas=='Campo Obligatorio'){
					document.getElementById("pass").value="Campo Obligatorio";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
					return false;
				}else if(!(/\w{5,}/.test(pas)) || pas=='Min. 5 caracteres'){
					document.getElementById("pass").value="Min. 5 caracteres";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
				}else if(pas.length>20 || pas=='Max. 20 characters'){
					document.getElementById("pass").value="Max. 20 caracteres";
					document.getElementById("pass").style.textAlign="center";
					document.getElementById("pas").style.color="#000";
					return false;
					}else{
					document.getElementById("pas").style.color="#EAEEF7";
          			document.getElementById("pass").style.textAlign="left";
					return true;
				}

				
  }
 
  function valname2(){

  				var nam=document.getElementById("name").value;
				if(nam==null || nam.length==0 || nam=='Campo Obligatorio'){
					document.getElementById("name").value="Campo Obligatorio";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="#000"; 
		
					return false;
				}else if(!(/\w{1,}\s{1,}\w{1,}/.test(nam)) || nam=='Introduzca Nombre Completo'){
					document.getElementById("name").value="Introduzca Nombre Completo";
					document.getElementById("name").style.textAlign="center";
					document.getElementById("nam").style.color="#000"; 
					return false;
				    }else{ 
					document.getElementById("nam").style.color="#EAEEF7";
          			document.getElementById("name").style.textAlign="left";
					return true;
				}

				
  }
  function valemail2(){

  				var em=document.getElementById("email").value;
				if(em==null || em.length==0 || em=='Campo Obligatorio'){
					document.getElementById("email").value="Campo Obligatorio";
					document.getElementById("email").style.textAlign="center";
					document.getElementById("emai").style.color="#000";
					return false;
				}else if(!(/^\w+@[a-z]+\.[a-z]+$/.test(em)) || em=='Formato de e-mail no v\u00E1lido'){
		document.getElementById("email").value="Formato de e-mail no v\u00E1lido";
		document.getElementById("email").style.textAlign="center";
		document.getElementById("emai").style.color="#000";
		return false;}else{
					document.getElementById("emai").style.color="#EAEEF7";
          			document.getElementById("email").style.textAlign="left";
					return true;
				}

				
  }
  
  function valcheck2(){
	var check=document.getElementById("check").checked;
	if(check == false){
	document.getElementById("checki").innerHTML="Tienes que aceptar los t&eacuterminos.";
	return false;}else{
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
	   $user    = recogeDato('user');
	   $pass    = recogeDato('pass');
       $name    = recogeDato('name');
       $email   = recogeDato('email');

       $user=mysqli_real_escape_string($conexion, $user);
       $pass=mysqli_real_escape_string($conexion, $pass);
       $name=mysqli_real_escape_string($conexion, $name);
       $email=mysqli_real_escape_string($conexion, $email);

       $user2    = recogeDato('user2');
	   $pass2    = recogeDato('pass2');
       $name2    = recogeDato('name2');
       $email2   = recogeDato('email2');

       $user2=mysqli_real_escape_string($conexion, $user2);
       $pass2=mysqli_real_escape_string($conexion, $pass2);
       $name2=mysqli_real_escape_string($conexion, $name2);
       $email2=mysqli_real_escape_string($conexion, $email2);
      
     if(isset($_REQUEST['submit3'])){
     	
		if($user2==$name2){$rep3=1;}
		$compruebauser=mysqli_query($conexion,"SELECT usuario FROM usuarios");
		$compruebaemail=mysqli_query($conexion,"SELECT email FROM usuarios");
		$compruebauser2=mysqli_query($conexion,"SELECT usuario FROM temp_usuarios");
		$compruebaemail2=mysqli_query($conexion,"SELECT email FROM temp_usuarios");
		while($array2=mysqli_fetch_array($compruebauser)){
			if($array2[0]==$user2){$rep=1;}}
			while($array22=mysqli_fetch_array($compruebauser2)){
			if($array22[0]==$user2){$rep=1;}}
		while($array3=mysqli_fetch_array($compruebaemail)){
			if($array3[0]==$email2){$rep2=1;}}
			while($array33=mysqli_fetch_array($compruebaemail2)){
			if($array33[0]==$email2){$rep2=1;}}
			$result=mysqli_query($conexion,"SELECT regnombre,regemail,nombreyuser,volversubir FROM lang WHERE id LIKE '$idi'");
			if($rep==1 || $rep2==1 || $rep3==1){
			while($array=mysqli_fetch_array($result)){
			echo"
       <p class='introcontactlogin'>";if($rep==1){echo $array[0];}else if($rep2==1){echo $array[1];}else{echo $array[2];}echo"</p>
	   <p style='text-align:center;'><button class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/register/$idi/$version'>$array[3]</a></button></p>";
		}
		}else{
		$intro=mysqli_query($conexion,"INSERT INTO temp_usuarios(usuario,password,nombre,email,fecha)VALUES('$user2','$pass2','$name2','$email2',NOW())");
		$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
		while($array=mysqli_fetch_array($result)){
		$emailreg=mysqli_query($conexion,"SELECT * FROM temp_usuarios WHERE usuario LIKE '$user2'");
		while($arrayreg=mysqli_fetch_array($emailreg)){
		$para=$arrayreg[3];
		$asunto="Web 'Airlinespotting.com'";
		$asunto2="Nuevo usuario registrado en la web 'Airlinespotting'.";
		$mensaje3="$array[76] $arrayreg[3], $array[77]
		$array[10]: $arrayreg[3].
		$array[47]: $arrayreg[1].
		$array[48]: $arrayreg[2].
		$array[78] 
		Fco. Escudero.";
		$mensaje2="Nuevo usuario!! 
		El usuario $arrayreg[1], que se llama $arrayreg[3], se ha registrado con el e-mail: $arrayreg[4].";
		if($idi=='ES'){
			$mensaje="Si te has registrado en nuestra web, para activar tu cuenta haz click <a href='http://www.airlinespotting.com/confirm/$idi/$version/$email2'>aqui en este enlace</a>, si no, ignora este e-mail. Este enlace caduca a las 24 horas.<br/>Gracias. Un saludo. Airlinespotting.com";
		}else{
			$mensaje="If you have registered on our website, to activate your account click <a href='http://www.airlinespotting.com/confirm/$idi/$version/$email2'>here in this link</a>, if not, ignore this email. This link expires after 24 hours.<br/>Thanks. Greetings. Airlinespotting.com";
		}
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($para,$asunto,$mensaje,$cabeceras);
		mail('adr72@msn.com',$asunto2,$mensaje2);
		echo"
       <p class='introcontactlogin'>$array[162]</p>
	   <p style='text-align:center;'><button class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>$array[66]</a></button></p>";
	   

       }}}} else if(isset($_REQUEST['submit'])){
     	
     	$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
		while($array=mysqli_fetch_array($result)){
       	 echo"
       	<span style='color:#F8C024;text-decoration:underline;'>";if($idi=='ES'){echo"Datos de Registro:";}else{echo"Registration Data:";} echo"</span><br><br><br>
     	<span style='color:#F8C024;'>$array[160]</span>&nbsp;&nbsp;$user<br><br>
     	<span style='color:#F8C024;'>$array[48]</span>&nbsp;&nbsp;$pass<br><br>
     	<span style='color:#F8C024;'>$array[133]:</span>&nbsp;&nbsp;$name<br><br>
     	<span style='color:#F8C024;'>E-mail:</span>&nbsp;&nbsp;$email<br><br><br>
     	<form action='http://www.airlinespotting.com/register/$idi/$version' method='post' id='formula1' name='formula'>
  <input type='hidden' name='email2' value='$email'>
  <input type='hidden' name='name2' value='$name'>
  <input type='hidden' name='pass2' value='$pass'>
  <input type='hidden' name='user2' value='$user'>
  <input class='botonazul' type='submit' name='submit3' id='submit3' "; if($idi=='ES'){echo"value='Finalizar Registro'>";}else{echo"value='Complete Registration'>";}echo"
  <p style='text-align:center;'><button class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/register/$idi/$version'>$array[111]</a></button></p>
  </form>";}

}else{
        
       ?>
	   <?php $result=mysqli_query($conexion,"SELECT uploadintro FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
<p class='introcontactlogin'>$array[0]</p>";}?>
<div id='contetable2'>
<form <?php echo"action='http://www.airlinespotting.com/register/$idi/$version'" ?> method="post" onsubmit=<?php if($idi=='EN'){echo"'return validar();'>";}elseif($idi=='ES'){echo"'return validar2();'>";} ?>
<table>
<tr>
<?php
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
<th colspan='3'>$array[46]</th>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td id='use' class='pri'>$array[160] * :</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valuser();";}elseif($idi=='ES'){echo"valuser2();";}else{echo"valuser3();";}echo"
 name='user' id='user' /></td>
</tr>
<tr>
<td id='pas' class='pri'>$array[48] * :</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valpass();";}elseif($idi=='ES'){echo"valpass2();";}else{echo"valpass3();";}echo"
name='pass' id='pass' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td id='nam' class='pri'>$array[133]*:</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valname();";}elseif($idi=='ES'){echo"valname2();";}else{echo"valname3();";}echo"
 name='name' id='name' /></td>
</tr>
<tr>
<td id='emai' class='pri'>E-mail * :</td>
<td><input onfocus=this.value='';this.style.textAlign='left'; type='text' class='campoazul' onblur=";
if($idi=='EN'){echo"valemail();";}elseif($idi=='ES'){echo"valemail2();";}else{echo"valemail3();";}echo"
name='email' id='email' /></td>
</tr>
<tr>
<td colspan='3'><input type='checkbox' class='campocheck' onblur=";
if($idi=='EN'){echo"valcheck();";}elseif($idi=='ES'){echo"valcheck2();";}else{echo"valcheck3();";}echo"name='check' id='check' value='accepted' /><a class='termslink' href='http://www.airlinespotting.com/terms/$idi/$version' title='$array[84]'>$array[83]</a></td>
</tr>
<tr>
<td colspan='3'><p id='checki' style='height:25px;margin-bottom:-10px;margin-left:120px;margin-top:7px;'></p></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul' type='submit' value='$array[14]' name='submit' /><input class='botonazul' type='reset' value='$array[15]' /></td>
</tr>
<tr>
<td colspan='3'>* $array[16]</td>
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