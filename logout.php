<?
session_start();
if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}
$version=$_GET['version'];
session_destroy();
header("location:http://www.airlinespotting.com/index/$idi/$version");
exit();
?>