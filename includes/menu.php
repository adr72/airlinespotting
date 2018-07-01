<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
function despe(){
	if(document.getElementById('menuh').style.display=='none' || document.getElementById('menuh').style.display==''){document.getElementById('menuh').style.display='block';document.getElementById('menuh').style.height='385px';document.getElementById('menuh').style.transition='height 0.5s';}else{document.getElementById('menuh').style.display='none';}
}
</script>
<script type="text/javascript">
$(document).ready(function(){
 
    $(document).click(function(e){
        if(e.target.id!='menuhidden')
            $('#menuh').slideUp();
        });
 
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#menuhidden").click(function(){
    
    var target = $(this).parent().children("#menuh");
    $(target).slideToggle();
  });
});	
</script>

<div class="cabecera">
<?php
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
$login=$_GET['log'];
$totalavi=mysqli_query($conexion,"SELECT * FROM aviones");
$numeroaviones=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM aviones"));
$distintavi=mysqli_num_rows(mysqli_query($conexion,"SELECT DISTINCT matricula FROM aviones"));
$numeroaerolineas=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM compa"));
$result=mysqli_query($conexion,"SELECT * FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){
	
	$actualurl2=$_SERVER['REQUEST_URI'];
$web=strpos($actualurl2,"/WB");
$mobile=strpos($actualurl2,"/MB");
if($web!==false){
	$actualurlmobile=str_replace("/WB","/MB",$actualurl2);
}else if($mobile!==false){
	$actualurlweb=str_replace("/MB","/WB",$actualurl2);
}else if($actualurl2=="/"){
	$actualurlweb='http://www.airlinespotting.com/index/'.$idi.'/WB';
	$acualurlmobile='http://www.airlinespotting.com/index/'.$idi.'/MB';
}else{
	$actualurlweb=$actualurl2."/WB";
	$actualurlmobile=$actualurl2."/MB";
}	

if($version=='MB'){echo"
<a class='conteversion' href='$actualurlweb'><p>$array[153]</p></a>";}else if($version=='WB'){echo"
<a class='conteversion' href='$actualurlmobile'><p>$array[152]</p></a>";}echo"

<div id='contelogo'>
<h1 id='logotexto'><img id='noel' src='http://www.airlinespotting.com/imagenes/noel.png' /><a href='http://www.airlinespotting.com/index/$idi/$version'>Airline<span class='minilogo3'>spotting</span></a></h1>
</div>";
?>
<div id="social"><a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://plus.google.com/share?url=http://www.airlinespotting.com"><img style="width:30px;" src="http://www.airlinespotting.com/imagenes/google.png"<?php echo" title='$array[138]' alt='$array[138]'"; ?> /></a><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?s=100&p[url]=http://www.airlinespotting.com&p[images][0]=http://www.airlinespotting.com/imagenes/ships.jpg&p[title]=Shipsoftheworld&p[summary]=Fotos de Cruceros y Ferries del mundo.','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img style="width:30px;padding-left:5px;" src="http://www.airlinespotting.com/imagenes/facebook.png"<?php echo" title='$array[139]' alt='$array[139]'"; ?> /></a>
</div>
<?php
$men1=strtoupper($array[2]);
$men2=strtoupper($array[3]);
$men3=strtoupper($array[135]);
$men4=strtoupper($array[4]);
$men5=strtoupper($array[149]);
echo"
<div id='menuhidden'>
</div>
<ul id='menu'>
<a href='http://www.airlinespotting.com/login/$idi/$version'><li id='login'"; if($activa=='login'){echo" class='activa'";} echo"><p>";if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){echo"$men5";}else{echo"$men4";}echo"</p></li></a>
<a href='http://www.airlinespotting.com/links/$idi/$version'><li id='links'"; if($activa=='links'){echo" class='activa'";} echo"><p>$men3</p></li></a>
<a href='http://www.airlinespotting.com/contact/$idi/$version'><li id='contact'"; if($activa=='contact'){echo" class='activa'";} echo"><p>$men2</p></li></a>
<a href='http://www.airlinespotting.com/index/$idi/$version'><li id='home'";if($activa=='index'){echo" class='activa'";} echo"><p>$men1</p></li></a>

</ul>

<ul id='menuh'>
<a href='http://www.airlinespotting.com/index/$idi/$version'><li id='home'";if($activa=='index'){echo" class='activa'";} echo"><p>$men1</p></li></a>
<a href='http://www.airlinespotting.com/contact/$idi/$version'><li id='contact'"; if($activa=='contact'){echo" class='activa'";} echo"><p>$men2</p></li></a>
<a href='http://www.airlinespotting.com/links/$idi/$version'><li id='links'"; if($activa=='links'){echo" class='activa'";} echo"><p>$men3</p></li></a>
<a href='http://www.airlinespotting.com/login/$idi/$version'><li id='login'"; if($activa=='login'){echo" class='activa'";} echo"><p>";if($_SESSION['logged']=='loged' && $superadmin[0]=='0'){echo"$men5";}else{echo"$men4";}echo"</p></li></a>
</ul>";
$actualurl=$_SERVER['REQUEST_URI'];
$residies=strpos($actualurl,"/ES");
$residien=strpos($actualurl,"/EN");
if($residies!==false){
	$esp=str_replace("/ES","/ES",$actualurl);
	$eng=str_replace("/ES","/EN",$actualurl);
}else if($residien!==false){
	$esp=str_replace("/EN","/ES",$actualurl);
	$eng=str_replace("/EN","/EN",$actualurl);
}else if($actualurl=="/"){
	$esp=$actualurl."index/ES";
	$eng=$actualurl."index/EN";
}else{
	$esp=$actualurl."/ES";
	$eng=$actualurl."/EN";
}
echo"
<ul id='idiomas'>
<a href='$esp'><li id='sp'"; if($idi=='ES'){echo" class='activa'";} echo">ESP</li></a>
<a href='$eng'><li id='ng'"; if($idi=='EN'){echo" class='activa'";} echo">ENG</li></a>
</ul>
";
if($idi=='ES'){
		setlocale(LC_ALL,"es_ES");
	}else{
		setlocale(LC_ALL,"en_EN");
	}
date_default_timezone_set("GMT");
$time=time();
if($idi=='ES'){
echo"
<div id='fecha'>";
$newdate=strftime("%A", $time);
$newdate2=strftime("%e", $time);
$newdate3=strftime("%B", $time);
$newdate4=strftime("%Y", $time);
$newdate5=ucfirst($newdate);
$newdate6=ucfirst($newdate3);
echo"$newdate5,&nbsp;$newdate2&nbsp;de&nbsp;$newdate6,&nbsp;$newdate4";}else{
	echo"
<div id='fecha'>";
$newdate=strftime("%A", $time);
$newdate2=strftime("%e", $time);
$newdate3=strftime("%B", $time);
$newdate4=strftime("%Y", $time);
$newdate5=date('S', $time);
echo"$newdate,&nbsp;$newdate2$newdate5&nbsp;$newdate3,&nbsp;$newdate4";
}
	echo"
<div id='reloj'></div>
</div>
<div id='buscar'>
<form method='post' action='http://www.airlinespotting.com/asign/$idi/$version'>
<input type='image' src='http://www.airlinespotting.com/imagenes/lupa.png' id='botbuscar' /><input onfocus=this.value=''; type='text' id='busca' name='busca' value='$array[5]' />
</form>
</div>
<p id='total1' "; if($idi=='ES'){echo"title='Fotos de Barcos'";}else{echo"title='Photos of Ships'";} echo"><a href='http://www.shipsoftheworld.com'>Shipsoftheworld.com</a></p>
<p id='total2' "; if($idi=='ES'){echo"title='Fotos de Faros'";}else{echo"title='Photos of Lighthouses'";} echo"><a href='http://www.lightsoftheworld.xyz'>Lightsoftheworld.xyz</a></p>
<p id='total'><span class='letragran'>$numeroaviones</span>&nbsp;&nbsp;$array[94]&nbsp;&nbsp;<span class='letragran'>$distintavi</span>&nbsp;&nbsp;$array[146]&nbsp;&nbsp;<span class='letragran'>$numeroaerolineas</span>&nbsp;&nbsp;$array[137].</p>";

echo"
<ul id='idiomas2'>
<a href='$esp'><li id='sp'"; if($idi=='ES'){echo" class='activa'";} echo">ESP</li></a>
<a href='$eng'><li id='ng'"; if($idi=='EN'){echo" class='activa'";} echo">ENG</li></a>
</ul>
<div id='buscar2'>
<form method='post' action='http://www.airlinespotting.com/asign/$idi/$version'>
<input type='image' src='http://www.airlinespotting.com/imagenes/lupa.png' id='botbuscar2' /><input onfocus=this.value=''; type='text' id='busca2' name='busca' value='$array[5]' />
</form>
</div>
";
if($_SESSION['logged']=='loged' && $_SESSION['user']!='adr72adr'){$user=$_SESSION['user'];$user22=base64_encode($user);
echo"<p id='logeo'>$array[128], &nbsp;&nbsp;<span class='user'>$user</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id='boton' href='http://www.airlinespotting.com/search/$idi/$version/0/0/$user22'>$array[129]</a>&nbsp;&nbsp;<span class='pesta'>/</span>&nbsp;&nbsp;<a class='logout' href='http://www.airlinespotting.com/logout/$idi/$version'>LOG-OUT</a></p>";
}else if($_SESSION['logged']=='loged' && $_SESSION['user']=='adr72adr'){
echo"<p id='logeo'>Bienvenido, &nbsp;&nbsp;<span class='user'>ADMINISTRADOR</span>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='logout' href='http://www.airlinespotting.com/logout/$idi/$version'>LOG-OUT</a></p>";
}else{
echo"<p id='logeo'>$array[128], &nbsp;&nbsp;<span class='user'>$array[130]</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id='boton' href='http://www.airlinespotting.com/login/$idi/$version'>LOGIN </a>&nbsp;&nbsp;<span class='pesta'>/</span>&nbsp;&nbsp;<a id='boton' href='http://www.airlinespotting.com/register/$idi/$version'> $array[132] </a></p>";
}
echo"
</div>
<a href='#top' onclick='scrollToTop();return false' title='$array[99]'> <div id='flecharriba'>
	<img id='flechanegra' src='http://www.airlinespotting.com/imagenes/6.png' />
</div></a>";
}
?>
<script type="text/javascript">
function HoraActual(){
var idioma="<?php echo $idi; ?>";
var esteMomento = new Date();
var hora = esteMomento.getUTCHours();
if(hora < 10) hora = '0' + hora;
var minuto = esteMomento.getUTCMinutes();
if(minuto < 10) minuto = '0' + minuto;
var segundo = esteMomento.getUTCSeconds();
if(segundo < 10) segundo = '0' + segundo;
HoraCompleta= hora + " : " + minuto + " : " + segundo;
if(idioma=="ES"){
document.getElementById('reloj').innerHTML = HoraCompleta + "&nbsp;&nbsp;&nbsp;&nbsp;Hora GMT";}else{
document.getElementById('reloj').innerHTML = HoraCompleta + "&nbsp;&nbsp;&nbsp;&nbsp;GMT Time";
}
setTimeout("HoraActual()",1000)
} 
HoraActual();
</script>  
