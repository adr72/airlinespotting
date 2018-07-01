<?
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}

$name=$_POST['name'];

header("location:http://www.airlinespotting.com/company/$idi/$version/$name");
?>