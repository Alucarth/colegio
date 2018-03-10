<?php
class user
{
	private $user;
	private $nivel_user;
	function __construct(){
		session_start();}
	function check_register(){
		if ($_SESSION[$user] == $$user and $_SESSION["user"]<>""){
			return true;}
		else{
			$_SESSION['user'] == 'user';return false;}}
	function register(){
		$_SESSION[$user] == $$user;}
	function unregister(){
		session_destroy();}
	function set_user($user){
		$_SESSION["user"]=$user;}
	function get_user(){
		return intval($_SESSION["user"]);}
	function set_id($name){
		$_SESSION["user_id"]=$name;}
	function get_id(){
		return $_SESSION["user_id"];}	
	function set_level($nivel){
		$_SESSION["user_level"]=$nivel;}
	function get_level(){
		return $_SESSION["user_level"];}
	function set_name($name){
		$_SESSION["user_name"]=$name;}
	function get_name(){
		return $_SESSION["user_name"];}
	function set_foto($foto){
		$_SESSION["foto_name"]=$foto;}
	function get_foto(){
		return $_SESSION["foto_name"];}		
	function set_cargo($name){
		$_SESSION["cargo_name"]=$name;}
	function get_cargo(){
		return $_SESSION["cargo_name"];}
	function set_nivel($name){
		$_SESSION["nivel"]=$name;}
	function get_nivel(){
		return $_SESSION["nivel"];}						
}
?>