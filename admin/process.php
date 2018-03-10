<?php
  $username = trim($_POST['username']);
  $user_password = trim($_POST['password']);		
  $password = md5($user_password); 	
  include("../controller/user.php");
  include("../controller/base.php");
  $base=new base();
  $user=new user();
  if($base->dex_query_num_rows("select * from usuario where login='{$_POST['username']}' and password='".md5($_POST['password'])."'")<>0){
	  $sql="select * from usuario where login='{$username}' and password='".$password."'";
	  $rs=$base->dex_query($sql);
	  if($base->dex_num_rows($rs)>0){
		echo "ok";
		$dt=$base->dex_fetch_array($rs);				
		$user->set_user($dt['id_user']);
		$user->set_id($dt['id']);	
		$user->set_name($dt["nombre"]);	
		$user->set_level($dt["id_nivel_user"]);
		$user->set_foto($dt["foto"]);
		$user->set_cargo($dt["cargo"]);
		$user->register();}
	  else{
	   echo "Usuario o contraseña no valida."; }	  
  }
  else{
   if($base->dex_query_num_rows("select * from docente_p where login='{$_POST['username']}' and password='".md5($_POST['password'])."'")<>0){
	  $sql="select * from docente_p where login='{$username}' and password='".$password."'";
	  $rs=$base->dex_query($sql);
	  if($base->dex_num_rows($rs)>0){
		echo "ok";
		$dt=$base->dex_fetch_array($rs);
		$user->set_user($dt['id']);				
		$user->set_nivel($dt['nivel']);
		$user->set_id($dt['id']);	
		$user->set_name($dt["nombre"]);	
		$user->set_level($dt["id_nivel_user"]);
		$user->set_foto($dt["foto"]);
		$user->set_cargo($dt["cargo"]);
		$user->register();}
	  else{
	   echo "Usuario o contraseña no valida."; }	   
   }
    else{
    if($base->dex_query_num_rows("select * from docente_s where login='{$_POST['username']}' and password='".md5($_POST['password'])."'")<>0){
	  $sql="select * from docente_s where login='{$username}' and password='".$password."'";
	  $rs=$base->dex_query($sql);
	  if($base->dex_num_rows($rs)>0){
		echo "ok";
		$dt=$base->dex_fetch_array($rs);
		$user->set_user($dt['id']);	
		$user->set_nivel($dt['nivel']);
		$user->set_id($dt['id']);	
		$user->set_name($dt["nombre"]);	
		$user->set_level($dt["id_nivel_user"]);
		$user->set_foto($dt["foto"]);
		$user->set_cargo($dt["cargo"]);
		$user->register();}
	  else{
	   echo "Usuario o contraseña no valida."; }		
    }
    else{
	 if($base->dex_query_num_rows("select * from alumno_primaria where login='{$_POST['username']}' and password='".md5($_POST['password'])."'")<>0){
	  $sql="select * from alumno_primaria where login='{$username}' and password='".$password."'";
	  $rs=$base->dex_query($sql);
	  if($base->dex_num_rows($rs)>0){
		echo "ok";
		$dt=$base->dex_fetch_array($rs);
		$user->set_user($dt['id']);							
		$user->set_nivel($dt['nivel']);
		$user->set_id($dt['id']);	
		$user->set_name($dt["nombre"]);	
		$user->set_level($dt["id_nivel_user"]);
		$user->set_foto($dt["foto"]);
		$user->set_cargo($dt["cargo"]);
		$user->register();}
	  else{
	   echo "Usuario o contraseña no valida."; }		 
	 }
	 else{
	  if($base->dex_query_num_rows("select * from alumno_secundaria where login='{$_POST['username']}' and password='".md5($_POST['password'])."'")<>0){
	  $sql="select * from alumno_secundaria where login='{$username}' and password='".$password."'";
	  $rs=$base->dex_query($sql);
	  if($base->dex_num_rows($rs)>0){
		echo "ok";
		$dt=$base->dex_fetch_array($rs);
		$user->set_user($dt['id']);							
		$user->set_nivel($dt['nivel']);
		$user->set_id($dt['id']);	
		$user->set_name($dt["nombre"]);	
		$user->set_level($dt["id_nivel_user"]);
		$user->set_foto($dt["foto"]);
		$user->set_cargo($dt["cargo"]);
		$user->register();}
	  else{
	   echo "Usuario o contraseña no valida."; }		  
	  }else{		  
	  echo "Usuario o contraseña no valida.";}	 
	 }	
    }	   
   }	  
  } 
?>