<?php
class modulo
{
 private $nombre;
 private $archivo;
 private $direccion;
 private $layout;	
 private $lang;
 private $config;	
 public function __construct(){
	$this->nombre="404.php";
	$this->archivo="";
	$this->dir="admin/";
	$this->direccion="admin/";
	$this->layout="layout_admin";}
 public function set_archivo($nombre){
  $this->nombre=$nombre;
  if ($_GET["cod"]<>""){	  
   if (!file_exists($this->direccion.$this->nombre.".php")){
   $this->archivo=$this->dir."404.php";}
   else{
    $this->archivo=$this->direccion.$this->nombre.".php";}	  
  }  
  else{	 
   $this->archivo=$this->direccion.$this->nombre.".php";}
 }
  
 public function set_direccion($dir){
  $this->direccion=$dir;} 
  
 public function muestra(){
 if (!file_exists($this->archivo)){ 
 $this->archivo=$this->direccion."404.p
 hp";require($this->archivo);}
 else{
 require($this->archivo);}
 }
 public function set_layout($layout){
  if($layout==""){
    $this->layout=$this->layout.".php";}
  else{
    $this->layout=$layout.".php";}
 }
 
 public function check_in(){
  if (!file_exists($this->archivo)){
	 $this->archivo=$this->direccion.$this->archivo;require($this->archivo);}
 }
 public function get_layout(){
  return $this->layout; 	 
 }
}
?>