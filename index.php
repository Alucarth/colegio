<?php 
session_start();
require_once("index.conf");
include("controller/base.php");
include("controller/user.php");
include("controller/model.php");
include("controller/imagen.php");
$user=new user();
$base=new base();
$modulo=new modulo();
  if($user->check_register()){
   if(!isset($_GET["mod"])){
	if($user->get_level()==1 or $user->get_nivel()==2){
	 $modulo->set_archivo("panel");}else{
	 if($user->get_level()==4){
     $modulo->set_archivo("panel_s");}else{
     $modulo->set_archivo("panel_d");}	
	}}
   else{
    if($_GET["mod"]=="modelo"){
	 $modulo->set_direccion("modelo/".$_GET["cod"]."/");		
	 $modulo->set_archivo("index");}
	else{			
	 $modulo->set_archivo($_GET["mod"]);
	 }
   }
  }
  else{
   $modulo->set_archivo("login");}
  if($user->check_register()){
	 if($user->get_level()==1 or $user->get_nivel()==2){  
	 $modulo->set_layout("layouts_admin");}
	 else{
	 $modulo->set_layout("layou_admin");}
  }
  else{
  $modulo->set_layout();}
	$tabla_0="empresa";
	$sql_01="select * from $tabla_0 order by id asc";
	$rs_01=$base->dex_query($sql_01);
	$dt_01=$base->dex_fetch_array($rs_01);
	$nombre_e=htmlentities($dt_01["nombre_e"]);	
	$logo=$dt_01["logo"];
	$id=$dt_01["id"];  
  require($modulo->get_layout());
?>