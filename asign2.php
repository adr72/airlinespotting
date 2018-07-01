<?
session_start();

if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}

$busca=$_POST['busca'];
if(!isset($busca)){$busca=$_GET['busca'];}

$_SESSION['orden']=$_POST['orden'];
if(!isset($_SESSION['orden'])){$_SESSION['orden']=$_GET['orden'];}
if(!isset($_SESSION['orden'])){$_SESSION['orden']='Fecha';}
$orden=$_SESSION['orden'];

$_SESSION['asc']=$_POST['asc'];
if(!isset($_SESSION['asc'])){$_SESSION['asc']=$_GET['asc'];}
if(!isset($_SESSION['asc'])){$_SESSION['asc']='DESC';}
$asc=$_SESSION['asc'];

$_SESSION['pagina']=$_GET['pag'];
if(!isset($_SESSION['pagina'])){$_SESSION['pagina']='1';}
$pagina=$_SESSION['pagina'];

header("location:http://www.airlinespotting.com/search/$idi/0/$busca/0/page$pagina/$orden/$asc");
?>