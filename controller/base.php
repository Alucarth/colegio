<?php
class base
{	
	private $servidor;
	private $usuario;
	private $password;
	private $base;
	private $conexion;
	public $prefig;
	function __construct(){
		$this->servidor="localhost";
		$this->usuario="root";
		$this->password='vertrigo';
		$this->base="colegio";			
		$this->prefig="";
		$this->conexion = mysql_connect($this->servidor, $this->usuario, $this->password) or die ("error conexion");
		mysql_select_db($this->base, $this->conexion) or die ("error base no existe");}
	function dex_query($sql){
		$rs=mysql_query($sql) or die("Erro query-> ".mysql_error()."<br />".$sql);
		return $rs;}
	function dex_query_fetch_array($sql){
		$rs=mysql_query($sql) or die("Erro query-> ".mysql_error());
		$dt=mysql_fetch_array($rs) ;
		return $dt;}
	function dex_query_num_rows($sql){
		$rs=mysql_query($sql) or die("Error c -> ".mysql_error());
		$n=mysql_num_rows($rs);
		return $n;}
	function dex_num_rows($rs){
		$rs=mysql_num_rows($rs) ;
		return $rs;}
	function dex_fetch_array($rs){
		$rs=mysql_fetch_array($rs);
		return $rs;}
}
?>