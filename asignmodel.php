<?
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}

$name=$_POST['name'];

header("location:http://www.airlinespotting.com/search/$idi/$version/0/0/$name");
?>