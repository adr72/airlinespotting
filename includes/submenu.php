<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php
$idioma2=mysqli_query($conexion,"SELECT * FROM lang WHERE id='$idi'");
while($arraydioma2=mysqli_fetch_array($idioma2)){
echo"
<div id='subman'>
<ul id='menusup1'>
<a><li id='flechali'>$arraydioma2[6]&nbsp;<p id='flecha'></p>";
?>

<script type="text/javascript">
function desplegar(){
	if(document.getElementById('submenu1').style.display=='none' || document.getElementById('submenu1').style.display==''){document.getElementById('submenu1').style.display='block';document.getElementById('flecha').innerHTML="&#9650;";}else{document.getElementById('submenu1').style.display='none';document.getElementById('flecha').innerHTML="&#9660;";}
}

document.getElementById('flecha').innerHTML="&#9660;";

</script>

<script type="text/javascript">
$(document).ready(function(){
 
    $(document).click(function(e){
        if(e.target.id!='flechali' && e.target.id!='submenu1' && e.target.id!='flecha')
            $('#submenu1').slideUp();
        });
 
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#flechali").click(function(){
    
    var target1 = $("#submenu1");
    $(target1).slideToggle();
  });
}); 
</script>

<?php
echo"
</li></a>
<form id='sub' method='post' action='http://www.airlinespotting.com/asigncom/$idi/$version'>
<select name='name' id='submenu1' onchange='this.form.submit();'>
";
if($idi=='ES'){echo"
<option>Elige Aerol&iacute;nea</option>
";}else{echo"
<option>Choose Airline</option>
";}
$compas=mysqli_query($conexion,"SELECT * FROM compa ORDER BY Comp ASC");
while($arraycompas=mysqli_fetch_array($compas)){
echo"
<option value='$arraycompas[1]'>$arraycompas[1]</option>";}
echo"
</select>
</form>
</ul>
";



echo"
<ul id='menusup1a'>
<a><li id='flechali2'>$arraydioma2[164]&nbsp;<p id='flecha2'></p>";
?>
<script type="text/javascript">
function desplegar2(){
	if(document.getElementById('submenu2').style.display=='none' || document.getElementById('submenu2').style.display==''){document.getElementById('submenu2').style.display='block';document.getElementById('flecha2').innerHTML="&#9650;";}else{document.getElementById('submenu2').style.display='none';document.getElementById('flecha2').innerHTML="&#9660;";}
}

document.getElementById('flecha2').innerHTML="&#9660;";

</script>

<script type="text/javascript">
$(document).ready(function(){
 
    $(document).click(function(e){
        if(e.target.id!='flechali2' && e.target.id!='submenu2' && e.target.id!='flecha2')
            $('#submenu2').slideUp();
        });
 
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#flechali2").click(function(){
    
    var target1 = $("#submenu2");
    $(target1).slideToggle();
  });
}); 
</script>

<?php
echo"
</li></a>
<form id='sub' method='post' action='http://www.airlinespotting.com/asignmodel/$idi/$version'>
<select name='name' id='submenu2' onchange='this.form.submit();'>
<option>$arraydioma2[165]</option>";
$compas=mysqli_query($conexion,"SELECT * FROM longitudes ORDER BY Avion ASC");
while($arraycompas=mysqli_fetch_array($compas)){
echo"
<option value='$arraycompas[0]'>$arraycompas[0]</option>";}
echo"
</select>
</form>
</ul>
";




echo"
<ul id='menusup2'>
<a href='http://www.airlinespotting.com/az/$idi/$version/a'><li"; if($activa3=='a'){echo" class='activa3'";} echo">A</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/b'><li"; if($activa3=='b'){echo" class='activa3'";} echo">B</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/c'><li"; if($activa3=='c'){echo" class='activa3'";} echo">C</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/d'><li"; if($activa3=='d'){echo" class='activa3'";} echo">D</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/e'><li"; if($activa3=='e'){echo" class='activa3'";} echo">E</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/f'><li"; if($activa3=='f'){echo" class='activa3'";} echo">F</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/g'><li"; if($activa3=='g'){echo" class='activa3'";} echo">G</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/h'><li"; if($activa3=='h'){echo" class='activa3'";} echo">H</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/i'><li"; if($activa3=='i'){echo" class='activa3'";} echo">I</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/j'><li"; if($activa3=='j'){echo" class='activa3'";} echo">J</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/k'><li"; if($activa3=='k'){echo" class='activa3'";} echo">K</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/l'><li"; if($activa3=='l'){echo" class='activa3'";} echo">L</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/m'><li"; if($activa3=='m'){echo" class='activa3'";} echo">M</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/n'><li"; if($activa3=='n'){echo" class='activa3'";} echo">N</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/o'><li"; if($activa3=='o'){echo" class='activa3'";} echo">O</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/p'><li"; if($activa3=='p'){echo" class='activa3'";} echo">P</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/q'><li"; if($activa3=='q'){echo" class='activa3'";} echo">Q</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/r'><li"; if($activa3=='r'){echo" class='activa3'";} echo">R</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/s'><li"; if($activa3=='s'){echo" class='activa3'";} echo">S</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/t'><li"; if($activa3=='t'){echo" class='activa3'";} echo">T</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/u'><li"; if($activa3=='u'){echo" class='activa3'";} echo">U</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/v'><li"; if($activa3=='v'){echo" class='activa3'";} echo">V</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/w'><li"; if($activa3=='w'){echo" class='activa3'";} echo">W</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/x'><li"; if($activa3=='x'){echo" class='activa3'";} echo">X</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/y'><li"; if($activa3=='y'){echo" class='activa3'";} echo">Y</li></a>
<a href='http://www.airlinespotting.com/az/$idi/$version/z'><li"; if($activa3=='z'){echo" class='activa3'";} echo">Z</li></a>
</ul></div>
";}
?>