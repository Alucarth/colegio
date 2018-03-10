<?php 
$base=new base();
$user=new user();
$fun=new functions();
$cod_mod=$_GET["cod"];
$carpeta =  modelo."/".$cod_mod."/";
if($_GET["cod_0"]==""){  	
  require($carpeta."list.php");}
else{
  if($_GET["cod_1"]=="imprimir"){
  require($carpeta."imprimir.php");}
  else{
  require($carpeta."listar.php");}
  }
?>