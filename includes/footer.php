<div id="pie">
<div id='texpie'><p><span class='air'>Airline<span class='air2'>Spotting</span></span> &nbsp;&nbsp;Copyright &copy; 2014-2018. &nbsp;&nbsp; <a class='portfolio' href='http://www.fcoescudero.hol.es'> Francisco Escudero.</a> &nbsp;&nbsp; Palma de Mallorca.</p>
<div id="socialpie"><a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://plus.google.com/share?url=http://www.airlinespotting.com"><img class="piesog" src="http://www.airlinespotting.com/imagenes/google.png"
<?php
$social=mysqli_query($conexion,"SELECT googleplus, facebook FROM lang WHERE id='$idi'");
while($arraysocial=mysqli_fetch_array($social)){echo" title='$arraysocial[0]' alt='$arraysocial[0]'";
 ?>
 /></a><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?s=100&p[url]=http://www.airlinespotting.com&p[images][0]=http://www.airlinespotting.com/imagenes/airplanes.jpg&p[title]=Airplaneoftheworld&p[summary]=Fotos de Aviones de Aerolíneas del mundo.','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img class="piesof" src="http://www.airlinespotting.com/imagenes/facebook.png"
<?php
echo" title='$arraysocial[1]' alt='$arraysocial[1]'";
 ?>
 /></a>
</div>
</div>
<p>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="¡CSS Válido!" />
    </a>
</p>
</div>
<div id="subpie">
<?php
}
$result=mysqli_query($conexion,"SELECT footer,menusup1,menusup2,menusup3,termsand,links FROM lang WHERE id LIKE '$idi'");
while($array=mysqli_fetch_array($result)){echo"
<p class='parrfooter'><a href='http://www.airlinespotting.com/index/$idi/$version'>$array[1]</a></p>
<p class='parrfooter'><a href='http://www.airlinespotting.com/contact/$idi/$version'>$array[2]</a></p>
<p class='parrfooter'><a href='http://www.airlinespotting.com/links/$idi/$version'>$array[5]</a></p>
<p class='parrfooter'><a href='http://www.airlinespotting.com/login/$idi/$version'>$array[3]</a></p>
<p class='parrfooterf'><a href='http://www.airlinespotting.com/terms/$idi/$version'>$array[4]</a></p>
</div>
";}
mysqli_close($conexion);
?>