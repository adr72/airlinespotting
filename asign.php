<?
session_start();

if(!$_GET['id']){$idi='EN';}else{
$idi=$_GET['id'];}

$buscado=$_GET['bsc'];
if(!isset($buscado)){$buscado="0";}
if(!isset($_SESSION['busqueda'])){$_SESSION['busqueda']=$_POST['busca'];}
if(isset($_POST['busca']) && $_SESSION['busqueda']!=$_POST['busca']){$_SESSION['busqueda']=$_POST['busca'];}
$busq=$_SESSION['busqueda'];
if(!isset($busq) || $busq==' ' || $busq==''){$busq="0";}


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

header("location:http://www.airlinespotting.com/search/$idi/0/$busq/$buscado/page$pagina/$orden/$asc");
?>