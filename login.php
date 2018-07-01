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
function valco(){
	var com=document.getElementById('uploadcom').value;
	if(com==null || com.length==0){
		document.getElementById("uploadcomi").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadcomi").innerHTML="Ok!";
		return true;
	}
}
function valav(){
	var avi=document.getElementById('uploadavi').value;
	if(avi==null || avi.length==0){
		document.getElementById("uploadavii").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadavii").innerHTML="Ok!";
		return true;
	}
}

function valmat(){
	var mat=document.getElementById('uploadmatr').value;
	if(mat==null || mat.length==0){
		document.getElementById("uploadmatri").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadmatri").innerHTML="Ok!";
		return true;
	}
}

function valfec(){
	var fecha=document.getElementById('uploadfecha').value;
	if(fecha==null || fecha.length==0){
		document.getElementById("uploadfechai").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadfechai").innerHTML="Ok!";
		return true;
	}
}
function valaero(){
	var aerop=document.getElementById('uploadaerop').value;
	if(aerop==null || aerop.length==0){
		document.getElementById("uploadaeropi").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadaeropi").innerHTML="Ok!";
		return true;
	}
}

function valciu(){
	var ciudad=document.getElementById('uploadciudad').value;
	if(ciudad==null || ciudad.length==0){
		document.getElementById("uploadciudadi").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadciudadi").innerHTML="Ok!";
		return true;
	}
}

function valpais(){
	var pais=document.getElementById('uploadpais').value;
	if(pais==null || pais.length==0){
		document.getElementById("uploadpaisi").innerHTML="Empty!";
		return false;
	}else{
		document.getElementById("uploadpaisi").innerHTML="Ok!";
		return true;
	}
}

function valfile(){
	var file=document.getElementById('imagen').value;
	var filesize=document.getElementById('imagen');
	var punto=file.lastIndexOf(".");
	var extension=file.substring(punto);
	var extension=extension.toLowerCase();
	if(file==null || file.length==0){
		document.getElementById("imageni").innerHTML="Empty!";
		return false;
	}else if(filesize.files[0].size>5*(1024*1024)){
		document.getElementById("imageni").innerHTML="Max. 5Mb";
		return false;
	}else if(extension!=".jpg"){
		document.getElementById("imageni").innerHTML="Only jpg";
		return false;
	}else{
		document.getElementById("imageni").innerHTML="Ok!";
		return true;
	}
}

function valtotal(){
	var valco1=valco();
	var valav1=valav();
	var valmat1=valmat();
	var valfec1=valfec();
	var valaero1=valaero();
	var valciu1=valciu();
	var valpais1=valpais();
	valfile();
	var valfile1=valfile();
	
	if(valco1==false || valav1==false || valmat1==false || valfec1==false || valaero1==false || valciu1==false || valpais1==false || valfile1==false){
		return false;}else
		{return true;}
	}

	

function valco2(){
	var com=document.getElementById('uploadcom').value;
	if(com==null || com.length==0){
		document.getElementById("uploadcomi").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadcomi").innerHTML="Ok!";
		return true;
	}
}

function valav2(){
	var avi=document.getElementById('uploadavi').value;
	if(avi==null || avi.length==0){
		document.getElementById("uploadavii").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadavii").innerHTML="Ok!";
		return true;
	}
}

function valmat2(){
	var mat=document.getElementById('uploadmatr').value;
	if(mat==null || mat.length==0){
		document.getElementById("uploadmatri").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadmatri").innerHTML="Ok!";
		return true;
	}
}

function valfec2(){
	var fecha=document.getElementById('uploadfecha').value;
	if(fecha==null || fecha.length==0){
		document.getElementById("uploadfechai").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadfechai").innerHTML="Ok!";
		return true;
	}
}

function valaero2(){
	var aerop=document.getElementById('uploadaerop').value;
	if(aerop==null || aerop.length==0){
		document.getElementById("uploadaeropi").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadaeropi").innerHTML="Ok!";
		return true;
	}
}

function valciu2(){
	var ciudad=document.getElementById('uploadciudad').value;
	if(ciudad==null || ciudad.length==0){
		document.getElementById("uploadciudadi").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadciudadi").innerHTML="Ok!";
		return true;
	}
}

function valpais2(){
	var pais=document.getElementById('uploadpais').value;
	if(pais==null || pais.length==0){
		document.getElementById("uploadpaisi").innerHTML="Vac&iacuteo!";
		return false;
	}else{
		document.getElementById("uploadpaisi").innerHTML="Ok!";
		return true;
	}
}


function valfile2(){
	var file=document.getElementById('imagen').value;
	var filesize=document.getElementById('imagen');
	var punto=file.lastIndexOf(".");
	var extension=file.substring(punto);
	var extension=extension.toLowerCase();
	if(file==null || file.length==0){
		document.getElementById("imageni").innerHTML="Vac&iacuteo!";
		return false;
	}else if(filesize.files[0].size>5*(1024*1024)){
		document.getElementById("imageni").innerHTML="M&aacutex. 5Mb";
		return false;
	}else if(extension!=".jpg"){
		document.getElementById("imageni").innerHTML="S&oacutelo jpg";
		return false;
	}else{
		document.getElementById("imageni").innerHTML="Ok!";
		return true;
	}
}

function valtotal2(){
	var valco1=valco2();
	var valav1=valav2();
	var valmat1=valmat2();
	var valfec1=valfec2();
	var valaero1=valaero2();
	var valciu1=valciu2();
	var valpais1=valpais2();
	valfile2();
	var valfile1=valfile2();
	
	if(valco1==false || valav1==false || valmat1==false || valfec1==false || valaero1==false || valciu1==false || valpais1==false || valfile1==false){
		return false;}else
		{return true;}
	}
	

</script>

<script language="JavaScript"> 
function pregunta(){ 
    if (confirm('Todo correcto? Revisa todos los datos.')){ 
       return true;
    } else{return false;}
} 

function pregunta2(){ 
    if (confirm('All right? Check all data.')){ 
       return true;
    } else{return false;}
} 
</script> 

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
}else{
	include ("includes/menu.php");
	include("includes/banner3.php");}
	
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

<div id='contelogin'>

 <?php 
       //comenzamos recogiendo los datos
       function recogeDato($campo)
	   { 
       return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
       } //la función recogeDatos comprueba si se ha recibido un dato y recoge su valor
		
       //si no se ha recibido, le asigna un valor vacío.
	    $userlogin=recogeDato('userlogin');
	    $passlogin=recogeDato('passlogin');
		$hoy = date("Y-m-d H:i:s");
	    $fotonombre=$_FILES['imagen']['name'].$hoy;
	    move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/".$fotonombre);
		$nombrehid=recogeDato('nombrehid');
		$usuariohid=recogeDato('usuariohid');
		$emailhid=recogeDato('emailhid');
		$com=recogeDato('uploadcom');
		$avion=recogeDato('uploadavi');
		$matricula=recogeDato('uploadmatr');
		$fecha=recogeDato('uploadfecha');
		$aeropuerto=recogeDato('uploadaerop');
		$ciudad=recogeDato('uploadciudad');
		$pais=recogeDato('uploadpais');
      
     if (isset($_REQUEST['submit2'])){
		$respuestas=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
		while($array6=mysqli_fetch_array($respuestas)){
		$comuser=mysqli_query($conexion,"SELECT usuario FROM usuarios");
		while($array5=mysqli_fetch_array($comuser)){
			if($userlogin==$array5[0]){$userex=1;}}
		if($userex!=1){echo"<p class='introcontactres'>$array6[53]</p>
	   <p style='text-align:center;'><button class='botonazul' onclick=window.location.assign('http://www.airlinespotting.com/login/$idi/$version')>$array6[70]</button></p>";}else{
		$compass=mysqli_query($conexion,"SELECT password FROM usuarios WHERE usuario='$userlogin'");
		while($array4=mysqli_fetch_array($compass)){
		if($passlogin==$array4[0]){$_SESSION['logged']='loged';$_SESSION['user']=$userlogin;
		?>
			<script>
			location.href='<?php echo"http://www.airlinespotting.com/login/$idi/$version" ?>';
			</script>
			<?php }
			else{echo"<p class='introcontactres'>$array6[54]</p>
	   <p style='text-align:center;'><button class='botonazul' onclick=window.location.assign('http://www.airlinespotting.com/login/$idi/$version')>$array6[70]</button></p>";}
	   	}}}}
		else if(isset($_REQUEST['submit3'])){
				$respupload=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
				while($array7=mysqli_fetch_array($respupload)){
				$com2=mysqli_query($conexion,"SELECT usuario FROM usuarios WHERE usuario LIKE '$usuariohid'");
				while($arrayrep=mysqli_fetch_array($com2)){
				$contenido="Autor de la foto: ".$nombrehid."\n"."Usuario: ".$usuariohid."\n"."E-mail: ".$emailhid."\n"."Nombre del archivo: ".$fotonombre."\n"."Compañía: ".$com."\n"."Avión: ".$avion."\n"."Matrícula: ".$matricula."\n"."Fecha de la foto: ".$fecha."\n"."Aeropuerto: ".$aeropuerto."\n"."Ciudad: ".$ciudad."\n"."País: ".$pais."\n";}
				$reportes=fopen("uploads/reportes.txt","a");
				fwrite($reportes,$contenido.PHP_EOL);
				fclose($reportes);
				$headers="Content-Type: text/html; charset=UTF-8";
				$ast="Nueva foto recibida en airlinespotting.com";
				$msg="Nueva foto recibida de la Aeronave: ".$com.",  ".$avion." del usuario: ".$usuariohid.".";
				mail('adr72@msn.com',$ast,$msg,$headers);
				if($_FILES['imagen']['error']==0){
				echo"
		<p class='introcontactres'>$array7[74]</p>
		<p style='text-align:center;'><button class='botonazul' onclick=javascript:history.back();><a style='text-decoration:none;' href=''>$array7[110]</a></button></p>
		<p style='text-align:center;'><button class='botonazul'><a href='http://www.airlinespotting.com/index/$idi/$version'>$array7[2]</a></button></p>
		";
		}else{echo"
		<p class='introcontactres'>$array7[75]</p>
		<p style='text-align:center;'><button class='botonazul' onclick=javascript:history.back();><a style='text-decoration:none;' href=''>$array7[111]</a></button></p>
		<p style='text-align:center;'><button class='botonazul'><a href='http://www.airlinespotting.com/index/$idi/$version'>$array7[2]</a></button></p>
		";}
				}}else if(isset($_REQUEST['submit4'])){
					$nomus=$_POST['nomus'];
					$nomuscomp='fotos/'.$nomus.'w.jpg';
					$idiomaus=$_POST['idiomaus'];
					$datosav=mysqli_query($conexion,"SELECT Comp,Avion,Fecha,autor,matricula FROM aviones WHERE Foto='$nomuscomp'");
					$numdatosav=mysqli_num_rows($datosav);
					if($numdatosav!=0){
					while($arraydata=mysqli_fetch_array($datosav)){
					$datosusu=mysqli_query($conexion,"SELECT nombre,email FROM usuarios WHERE usuario='$arraydata[3]'");
					while($arraydatus=mysqli_fetch_array($datosusu)){
					if($idiomaus=='ES'){
					$headers="Content-Type: text/html; charset=ISO-8859-1";
					$asunto="Web 'Airlinespotting'. Asunto: Foto aprobada.";
					$mensaje="Hola, ".utf8_decode($arraydatus[0]).".<br/> La foto que nos enviaste, del ".$arraydata[1].", de ".$arraydata[0].", matrícula: ".$arraydata[4].", y capturada el ".$arraydata[2].", ha sido aceptada para formar parte de nuestra base de datos.<br/>En breve será añadida en la siguiente actualización de nuestra web. Enhorabuena y muchas gracias por tu colaboración.<br/>Fco. Escudero.";
					mail($arraydatus[1],$asunto,$mensaje,$headers);}else if($idiomaus=='EN'){
					$headers="Content-Type: text/html; charset=UTF-8";
					$asunto="Web 'Airlinespotting'. Subject: Photo approved.";
					$mensaje="Hello, ".$arraydatus[0]."<br/> The photo you sent us, of ".$arraydata[1].", of ".$arraydata[0].", registration: ".$arraydata[4].", and captured on ".$arraydata[2].", has been accepted to be part of our database.<br/>Soon will be added in the next update of our web. Congratulations and thank you very much for your collaboration.<br/>Fco. Escudero.";
					mail($arraydatus[1],$asunto,$mensaje,$headers);}else{echo"
					<p class='introcontactres'>Idioma desconocido E-mail no Enviado!<br/><br/><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'><button style='margin:auto;' class='botonazul'>Volver al panel de administraci&oacute;n</button></a></p>";$otro=1;
					}
					if($otro!=1){
					echo"
					<p class='introcontactres'>E-mail Enviado!<br/><br/><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'><button style='margin:auto;' class='botonazul'>Volver al panel de administraci&oacute;n</button></a></p>";}
				}}}else{
					echo"<p style='margin-top:60px;text-align:center;'>No existe esa foto en la base de datos.<br/><br/>
					<a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'><button style='margin:auto;' class='botonazul'>Volver al panel de administraci&oacute;n</button></a></p>
					";
				}}else if(isset($_REQUEST['submit5'])){
					$fotus=$_POST['fotus'];
					$foto='fotos/'.$fotus.'w.jpg';
					$minifoto='fotos/'.$fotus.'wm.jpg';
					$compa=$_POST['compa'];
					$avi=$_POST['avi'];
					$capdate=$_POST['capdate'];
					$matri=$_POST['matri'];
					$usu=$_POST['usu'];
					$aero=$_POST['aero'];
					$flota=$_POST['flota'];
					$paisae=$_POST['paisae'];
					$local=$_POST['local'];
					$newdate=date('Y-m-d');
					$etiqueta=$_POST['etiqueta'];
					mysqli_query($conexion,"INSERT INTO aviones (Comp,Avion,Foto,Fecha,minifoto,matricula,autor,airport,avion2,airportcountry,location2,fechaup,etiqueta) VALUES ('$compa','$avi','$foto','$capdate','$minifoto','$matri','$usu','$aero','$flota','$paisae','$local','$newdate','$etiqueta')");
					echo"
					<p class='introcontactres'>Foto introducida correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if($_REQUEST['submit6']){
					$com=$_POST['com'];
					$coun=$_POST['coun'];
			        $fleet=$_POST['fleet'];
					$cese=$_POST['cese'];
					mysqli_query($conexion,"INSERT INTO compa (Comp,pais,flota,fechacese) VALUES ('$com','$coun','$fleet','$cese')");
					echo"
					<p class='introcontactres'>Compa&ntilde;&iacute;a introducida correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if($_REQUEST['submit7']){
					$avion=$_POST['avion'];
					$long=$_POST['long'];
					$env=$_POST['env'];
					mysqli_query($conexion,"INSERT INTO longitudes (Avion,longitud,envergadura) VALUES ('$avion','$long','$env')");
					echo"
					<p class='introcontactres'>Caracter&iacute;sticas nuevo avi&oacute;n introducidas correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if($_REQUEST['submit8']){
					$paisn=$_POST['paisn'];
					$engp=$_POST['engp'];
					$espp=$_POST['espp'];
					mysqli_query($conexion,"INSERT INTO paises (id,EN,ES) VALUES ('$paisn','$engp','$espp')");
					echo"
					<p class='introcontactres'>Nuevo Pa&iacute;s introducido correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if($_REQUEST['submit9']){
					$web=$_POST['web'];
					$dirweb=$_POST['dirweb'];
					mysqli_query($conexion,"INSERT INTO linkswebs (websdir,webs) VALUES ('$dirweb','$web')");
					echo"
					<p class='introcontactres'>Nueva Web introducida correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if($_REQUEST['submit10']){
					$comweb=$_POST['comweb'];
					$dircomweb=$_POST['dircomweb'];
					mysqli_query($conexion,"INSERT INTO linkscomps (compsdir,comps) VALUES ('$dircomweb','$comweb')");
					echo"
					<p class='introcontactres'>Nueva Web de Compa&ntilde;&iacute;a introducida correctamente en la base de datos.<br/><br/><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
				}else if(isset($_REQUEST['summit'])){
					$reorden=$_POST['reorden'];
					$asc=$_POST['asc'];
					if(!isset($asc)){$asc='DESC';}
					$opcion=$_POST['opcion'];
					if($opcion==''){
						echo"
						<script>
						document.location.href = 'http://www.airlinespotting.com/login/$idi/$version';
						</script>
						";
					}
					if($opcion=='listusu'){
					$respuestas=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
		            while($array6=mysqli_fetch_array($respuestas)){
					$maximo=mysqli_query($conexion,"SELECT MAX(numero) FROM usuarios");
					while($arraymaximo=mysqli_fetch_array($maximo)){
					echo"<p class='introcontactres'>N&uacute;mero de usuarios registrados:&nbsp;&nbsp;$arraymaximo[0]</p>";}
					echo"<div id='contetableus'><table><tr><th>N&uacute;mero</th><th>Usuario</th><th>Contrase&ntilde;a</th><th>Nombre y Apellidos</th><th>E-mail</th></tr>";
					$listado=mysqli_query($conexion,"SELECT numero FROM usuarios");
					while($arraylistado=mysqli_fetch_array($listado)){
						$listado2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE numero=$arraylistado[0]");
						while($arraylistado2=mysqli_fetch_array($listado2)){
							if($arraylistado2[1]!='adr72adr'){
							echo"<tr><td>$arraylistado2[0]</td><td>$arraylistado2[1]</td><td>$arraylistado2[2]</td><td>$arraylistado2[3]</td><td>$arraylistado2[4]</td></tr>";}
						}
					}echo"</table></div>
					<a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'><button style='margin:auto;' class='botonazul'>Volver al panel de administraci&oacute;n</button></a>";
					}}else if($opcion=='emailaccept'){
						echo"
<p class='introcontactres'>Enviar email de foto aceptada:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Nombre del archivo de la foto (sin el final ...w.jpg):</td>
<td><input type='text' class='campoazul' name='nomus' id='nomus' /></td>
</tr>
<tr>
<td class='pri'>idioma del email a enviar (ES/EN):</td>
<td><input type='text' class='campoazul' name='idiomaus' id='idiomaus' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' type='submit' value='Enviar e-mail' name='submit4' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'><button style='margin:auto;' class='botonazul'>Volver al panel de administraci&oacute;n</button></a></p>";
					}else if($opcion=='nuevafoto'){
						echo"
<p class='introcontactres'>Introduca datos nueva foto:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Nombre del archivo de la foto (sin el final ...w.jpg):</td>
<td><input type='text' class='campoazul' name='fotus' id='fotus' /></td>
</tr>
<tr>
<td class='pri'>Compa&ntilde;&iacute;a:</td>
<td><input type='text' class='campoazul' name='compa' id='compa' /></td>
</tr>
<tr>
<td class='pri'>Modelo de avi&oacute;n:</td>
<td><input type='text' class='campoazul' name='avi' id='avi' /></td>
</tr>
<tr>
<td class='pri'>Capturada&nbsp;&nbsp;(YYYY-MM-DD):</td>
<td><input type='date' class='campoazul' name='capdate' id='capdate' /></td>
</tr><tr>
<td class='pri'>Matr&iacute;cula (en may&uacute;sculas):</td>
<td><input type='text' class='campoazul' name='matri' id='matri' /></td>
</tr>
<tr>
<td class='pri'>Autor (nick del usuario):</td>
<td><input type='text' class='campoazul' name='usu' id='usu' /></td>
</tr>
<tr>
<td class='pri'>Aeropuerto (ICAO/IATA aeropuerto):</td>
<td><input type='text' class='campoazul' name='aero' id='aero' /></td>
</tr>
<tr>
<td class='pri'>aviones de &eacute;ste modelo en la compa&ntilde;&iacute;a:</td>
<td><input type='text' class='campoazul' name='flota' id='flota' /></td>
</tr>
<tr>
<td class='pri'>c&oacute;digo pa&iacute;s aeropuerto:</td>
<td><input type='text' class='campoazul' name='paisae' id='paisae' /></td>
</tr>
<tr>
<td class='pri'>Localidad (terminado en punto y espacio):</td>
<td><input type='text' class='campoazul' name='local' id='local' /></td>
</tr>
<tr>
<td class='pri'>Etiqueta (si la tiene):</td>
<td><input type='text' class='campoazul' name='etiqueta' id='ticket' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit5' id='submit5' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todasfotos'){
						if(!isset($reorden)){$reorden='id';}
						echo"<p class='introcontactres'>Base de Datos. Fotos:</p><table border='1' id='todasfotos'>
						
						<tr>
						<th></th>
						<th></th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='id' />
						<input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='id' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='id' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='Comp' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='Comp' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='Comp' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='Avion' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='Avion' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='Avion' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='Fecha' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='Fecha' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='Fecha' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='matricula' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='matricula' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='matricula' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='autor' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='autor' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='autor' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='airport' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='airport' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='airport' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='avion2' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='avion2' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='avion2' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='airportcountry' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='airportcountry' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='airportcountry' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='location2' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='location2' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='location2' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='fechaup' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='fechaup' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='fechaup' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th><th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasfotos' />
						<input type='hidden' name='reorden' value='etiqueta' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='etiqueta' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='etiqueta' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						</tr>
					
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Id foto:</th>
						<th>Compa&ntilde;&iacute;a:</th>
						<th>Modelo avi&oacute;n:</th>
						<th>Fecha de captura:</th>
						<th>Matr&iacute;cula:</th>
						<th>Usuario:</th>
						<th>Aeropuerto:</th>
						<th>Flota de &eacute;ste modelo:</th>
						<th>C&oacute;digo pa&iacute;s:</th>
						<th>Localidad:</th>
						<th>Fecha de subida:</th>
						<th>Etiqueta:</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM aviones ORDER BY $reorden $asc");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar/$idi/$version/$arraydata1[0]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar/$idi/$version/$arraydata1[0]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[0]</td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[2]</td>
							<td>$arraydata1[4]</td>
							<td>$arraydata1[6]</td>
							<td>$arraydata1[7]</td>
							<td>$arraydata1[8]</td>
							<td>$arraydata1[9]</td>
							<td>$arraydata1[10]</td>
							<td>$arraydata1[11]</td>
							<td>$arraydata1[12]</td>
							<td>$arraydata1[13]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='nuevacom'){
						echo"
<p class='introcontactres'>Introduca datos nueva Compa&ntilde;&iacute;a:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Nombre de la compa&ntilde;&iacute;a:</td>
<td><input type='text' class='campoazul' name='com' id='com' /></td>
</tr>
<tr>
<td class='pri'>C&oacute;digo Pa&iacute;s:</td>
<td><input type='text' class='campoazul' name='coun' id='coun' /></td>
</tr>
<tr>
<td class='pri'>Flota actual:</td>
<td><input type='text' class='campoazul' name='fleet' id='fleet' /></td>
</tr>
<tr>
<td class='pri'>Fecha de cese (dejar vac&iacute;o sino)(YYYY-MM-DD):</td>
<td><input type='text' class='campoazul' name='cese' id='cese' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit6' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todascom'){
						if(!isset($reorden)){$reorden='id';}
						echo"<p class='introcontactres'>Base de Datos. Compa&ntilde;&iacute;as:</p><table border='1' id='todasfotos'>
						
						<tr>
						<th></th>
						<th></th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todascom' />
						<input type='hidden' name='reorden' value='id' />
						<input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='id' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='id' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todascom' />
						<input type='hidden' name='reorden' value='Comp' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='Comp' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='Comp' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todascom' />
						<input type='hidden' name='reorden' value='pais' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='pais' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='pais' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todascom' />
						<input type='hidden' name='reorden' value='flota' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='flota' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='flota' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						</th>
					
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Id Compa&ntilde;&iacute;a:</th>
						<th>Compa&ntilde;&iacute;a:</th>
						<th>C&oacute;digo Pa&iacute;s:</th>
						<th>Flota actual:</th>
						<th>Fecha de cese (si ha cesado):</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM compa ORDER BY $reorden $asc");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar2/$idi/$version/$arraydata1[0]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar2/$idi/$version/$arraydata1[0]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[0]</td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[2]</td>
							<td>$arraydata1[3]</td>
							<td>$arraydata1[4]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='nuevavi'){
						echo"
<p class='introcontactres'>Introduzca caracter&iacute;sticas nuevo avi&oacute;n:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Avi&oacute;n:</td>
<td><input type='text' class='campoazul' name='avion' id='avion' /></td>
</tr>
<tr>
<td class='pri'>Longitud:</td>
<td><input type='text' class='campoazul' name='long' id='long' /></td>
</tr>
<tr>
<td class='pri'>Envergadura:</td>
<td><input type='text' class='campoazul' name='env' id='env' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit7' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todasavi'){
						if(!isset($reorden)){$reorden='Avion';}
						echo"<p class='introcontactres'>Base de Datos. Caracter&iacute;sticas Aviones:</p><table border='1' id='todasfotos'>
						
						<tr>
						<th></th>
						<th></th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasavi' />
						<input type='hidden' name='reorden' value='Avion' />
						<input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='Avion' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='Avion' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasavi' />
						<input type='hidden' name='reorden' value='longitud' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='longitud' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='longitud' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todasavi' />
						<input type='hidden' name='reorden' value='envergadura' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='envergadura' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='envergadura' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Avi&oacute;n:</th>
						<th>Longitud:</th>
						<th>Envergadura:</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM longitudes ORDER BY $reorden $asc");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar3/$idi/$version/$arraydata1[0]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar3/$idi/$version/$arraydata1[0]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[0]</td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[2]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='nuevopais'){
						echo"
<p class='introcontactres'>Introduzca nuevo Pa&iacute;s:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>C&oacute;digo Pa&iacute;s (3 letras may&uacute;sculas:</td>
<td><input type='text' class='campoazul' name='paisn' id='paisn' /></td>
</tr>
<tr>
<td class='pri'>Nombre en Ingl&eacute;s:</td>
<td><input type='text' class='campoazul' name='engp' id='engp' /></td>
</tr>
<tr>
<td class='pri'>Nombre en espa&ntilde;ol:</td>
<td><input type='text' class='campoazul' name='espp' id='espp' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit8' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todospais'){
						if(!isset($reorden)){$reorden='id';}
						echo"<p class='introcontactres'>Base de Datos. C&oacute;digos Pa&iacute;ses:</p><table border='1' id='todasfotos'>
						
						<tr>
						<th></th>
						<th></th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todospais' />
						<input type='hidden' name='reorden' value='id' />
						<input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='id' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='id' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todospais' />
						<input type='hidden' name='reorden' value='EN' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='EN' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='EN' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						<th>
						<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
						<input type='hidden' name='opcion' value='todospais' />
						<input type='hidden' name='reorden' value='ES' />
					    <input type='hidden' name='asc'";if($asc=='DESC'){echo" value='ASC'";}else{echo "value='DESC'";}echo" />
						";if($reorden=='ES' && $asc=='ASC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar asc' />";}
						else if($reorden=='ES' && $asc=='DESC'){echo"<input type='submit' id='order5' name='summit' value='Reordenar desc' />";}else{echo"<input type='submit' id='order4' name='summit' value='Reordenar' />";}
						echo"
						</form>
						</th>
						
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Pa&iacute;s:</th>
						<th>Nombre en Ingl&eacute;s:</th>
						<th>Nombre en Espa&ntilde;ol:</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM paises ORDER BY $reorden $asc");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar4/$idi/$version/$arraydata1[0]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar4/$idi/$version/$arraydata1[0]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[0]</td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[2]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='nuevaweb'){
						echo"
<p class='introcontactres'>Introduzca nueva Web:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Nombre Web:</td>
<td><input type='text' class='campoazul' name='web' id='web' /></td>
</tr>
<tr>
<td class='pri'>Direcci&oacute;n Nueva web:</td>
<td><input type='text' class='campoazul' name='dirweb' id='dirweb' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit9' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todaswebs'){
						echo"<p class='introcontactres'>Base de Datos. Enlaces Webs:</p><table border='1' id='todasfotos'>
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Web:</th>
						<th>Direcci&oacute;n Web:</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM linkswebs ORDER BY webs ASC");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar5/$idi/$version/$arraydata1[1]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar5/$idi/$version/$arraydata1[1]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[0]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='nuevacomweb'){
						echo"
<p class='introcontactres'>Introduzca nueva Web Compa&ntilde;&iacute;a A&eacute;rea:</p>
<div id='contetable2'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<table>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>Nombre Compa&ntilde;&iacute;a A&eacute;rea:</td>
<td><input type='text' class='campoazul' name='comweb' id='comweb' /></td>
</tr>
<tr>
<td class='pri'>Direcci&oacute;n web:</td>
<td><input type='text' class='campoazul' name='dircomweb' id='dircomweb' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul2' onclick='return pregunta();' type='submit' value='Enviar datos' name='submit10' /><input class='botonazul2' type='reset' value='Borrar datos' /></td>
</tr>
</table>
</form>
</div>
";
echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}else if($opcion=='todascomwebs'){
						echo"<p class='introcontactres'>Base de Datos. Enlaces Webs Compa&ntilde;&iacute;as A&eacute;reas:</p><table border='1' id='todasfotos'>
						<tr>
						<th>Borrar</th>
						<th>Editar</th>
						<th>Web Compa&ntilde;&iacute;a A&eacute;rea:</th>
						<th>Direcci&oacute;n Web:</th>
						</tr>
						";
						$data1=mysqli_query($conexion,"SELECT * FROM linkscomps ORDER BY comps ASC");
						while($arraydata1=mysqli_fetch_array($data1)){
							echo"
							<tr>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/borrar6/$idi/$version/$arraydata1[1]'><img title='Borrar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/basura.png' /></a></td>
							<td style='width:50px;'><a href='http://www.airlinespotting.com/editar6/$idi/$version/$arraydata1[1]'><img title='Editar Registro' style='width:18px;' src='http://www.airlinespotting.com/imagenes/editar.png' /></a></td>
							<td>$arraydata1[1]</td>
							<td>$arraydata1[0]</td>
							</tr>
							";
						}
						echo"</table>";
						echo"
					<p style='margin-top:20px;margin-bottom:40px;text-align:center;'><button style='margin:auto;' class='botonazul'><a style='text-decoration:none;' href='http://www.airlinespotting.com/login/$idi/$version'>Volver al panel de administraci&oacute;n</a></button></p>";
					}
					}else if($_SESSION['logged']=='loged' && $superadmin[0]!='0'){
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){
$nomus=mysqli_query($conexion,"SELECT nombre,usuario,email FROM usuarios WHERE usuario LIKE '$user'");
while($arrayus=mysqli_fetch_array($nomus)){
echo"
<p class='introcontactresno'>$array[73] $arrayus[0]</p>
<p class='introcontact2'>$array[55]</p>
<div id='contetable2'>
<form onsubmit=";if($idi=='EN'){echo"'return valtotal();'";}elseif($idi=='ES'){echo"'return valtotal2();'";}echo" action='http://www.airlinespotting.com/login/$idi/$version' method='post' enctype='multipart/form-data'>
<table>
<input type='hidden' name='nombrehid' value='$arrayus[0]' /><input type='hidden' name='usuariohid' value='$arrayus[1]' /><input type='hidden' name='emailhid' value='$arrayus[2]' />";}
echo"
<tr>
<th colspan='3'>$array[56]</th>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>$array[57]</td>
<td><input type='text' class='campoazul' name='uploadcom' id='uploadcom' onblur=";if($idi=='EN'){echo"valco();";}elseif($idi=='ES'){echo"valco2();";}echo" /></td>
<td style='width:10%;' id='uploadcomi'></td>
</tr>
<tr>
<td class='pri'>$array[58]</td>
<td><input type='text' class='campoazul' name='uploadavi' id='uploadavi' onblur=";if($idi=='EN'){echo"valav();";}elseif($idi=='ES'){echo"valav2();";}echo" /></td>
<td id='uploadavii'></td>
</tr>
<tr>
<td class='pri'>$array[64]</td>
<td><input type='text' class='campoazul' name='uploadmatr' id='uploadmatr' onblur=";if($idi=='EN'){echo"valmat();";}elseif($idi=='ES'){echo"valmat2();";}echo" /></td>
<td id='uploadmatri'></td>
</tr>
<tr>
<td class='pri'>$array[59]</td>
<td><input type='date' class='campoazul' name='uploadfecha' id='uploadfecha' onblur=";if($idi=='EN'){echo"valfec();";}elseif($idi=='ES'){echo"valfec2();";}echo" /></td>
<td id='uploadfechai'></td>
</tr>
<tr>
<td class='pri'>$array[60]</td>
<td><input type='text' class='campoazul' name='uploadaerop' id='uploadaerop' onblur=";if($idi=='EN'){echo"valaero();";}elseif($idi=='ES'){echo"valaero2();";}echo" /></td>
<td id='uploadaeropi'></td>
</tr>
<tr>
<td class='pri'>$array[61]</td>
<td><input type='text' class='campoazul' name='uploadciudad' id='uploadciudad' onblur=";if($idi=='EN'){echo"valciu();";}elseif($idi=='ES'){echo"valciu2();";}echo" /></td>
<td id='uploadciudadi'></td>
</tr>
<tr>
<td class='pri'>$array[62]</td>
<td><input type='text' class='campoazul' name='uploadpais' id='uploadpais' onblur=";if($idi=='EN'){echo"valpais();";}elseif($idi=='ES'){echo"valpais2();";}echo" /></td>
<td id='uploadpaisi'></td>
</tr>
<tr>
<td class='pri'>$array[63]</td>
<td><input type='file' class='campoazul' name='imagen' id='imagen' style='color:black;' onblur=";if($idi=='EN'){echo"valfile();";}elseif($idi=='ES'){echo"valfile2();";}echo" /></td>
<td id='imageni'></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul'";if($idi=='EN'){echo"onclick='return pregunta2();'";}elseif($idi=='ES'){echo"onclick='return pregunta();'";}echo" type='submit' value='$array[14]' name='submit3' /><input class='botonazul' type='reset' value='$array[15]' /></td>
</tr>
</table>
</form>
</div>
<p class='introcontactres'>$array[93]</p>
";}
?>
<?php
     
			
			}else if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){
			echo"
<p class='introcontadmin'>Panel de Administraci&oacute;n de <span class='air'>Airline<span class='air2'>spotting</span></span></p>
<p id='disabled'>Panel deshabilitado en dispositivos m&oacute;viles</p>
<p class='introcontact2'>Elige una opci&oacute;n:</p>
<div id='contepanel'>
<form action='http://www.airlinespotting.com/login/$idi/$version' method='post'>
<select id='order2' name='opcion'>
	<option value='' selected>--Opciones--</option>
	<option value='todasfotos'>Ver todas las Fotos</option>
	<option value='nuevafoto'>Introducir nueva Foto</option>
	<option value='todascom'>Ver todas las Compa&ntilde;&iacute;as</option>
	<option value='nuevacom'>Introducir nueva Compa&ntilde;&iacute;a</option>
	<option value='todasavi'>Ver caracter&iacute;sticas aviones</option>
	<option value='nuevavi'>Introducir  caracter&iacute;sticas nuevo avi&oacute;n</option>
	<option value='todospais'>Ver todos los pa&iacute;ses</option>
	<option value='nuevopais'>Introducir  c&oacute;digo nuevo pa&iacute;s</option>
	<option value='todaswebs'>Ver todas las Webs</option>
	<option value='nuevaweb'>Introducir  Web</option>
	<option value='todascomwebs'>Ver todas las Webs de las Compa&ntilde;&iacute;as</option>
	<option value='nuevacomweb'>Introducir  Web Compa&ntilde;&iacute;a</option>
	<option value='emailaccept'>Enviar email foto aceptada</option>
	<option value='listusu'>Ver listado Usuarios</option>
	</select>
	<input id='order2' type='submit' value='Enviar' name='summit' />
</form>
</div>
";
			
			}
	else{

$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
<form id='formlogin' action='http://www.airlinespotting.com/login/$idi/$version' method='post'>

<p class='introcontact'>$array[49]</p>

 <div id='contetable2'>

<table>
<tr>
<th colspan='3'>LOGIN</th>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td class='pri'>$array[160]</td>
<td><input type='text' class='campoazul' name='userlogin' id='userlogin' /></td>
</tr>
<tr>
<td class='pri'>$array[48]</td>
<td><input type='password' class='campoazul' name='passlogin' id='passlogin' /></td>
</tr>
<tr>
<td colspan='3'><br /></td>
</tr>
<tr>
<td colspan='3'><input class='botonazul' type='submit' value='$array[14]' name='submit2' /><input class='botonazul' type='reset' value='$array[15]' /></td>
</tr>
<tr>
<td class='forgot' colspan='3'><a href='http://www.airlinespotting.com/register/$idi/$version'>$array[71]</a></td>
</tr>
<tr>
<td class='forgot' colspan='3'><a href='http://www.airlinespotting.com/forgot/$idi/$version'>$array[72]</a></td>
</tr>
</table>
</form>
</div>
<p class='introcontacto'>$array[93]</p>
";} 

?>
<?php
       }
		
if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){}else{

}}
?>




<?php
include("includes/footer.php");
?>

</body></html>