<?php
class functions
{
	public function ob_tipofile($file)
	{
		$n=strrpos($file,".");
		return substr($file,$n+1,strlen($file));
		
	}
	public function upload_file_1($archivo,$carpeta,$valida,$sis)
	{
		$fun=new functions;
		if($_FILES[$archivo]['name']<>"")
		{
			$extencion=$fun->ob_tipofile($_FILES[$archivo]['name']);
			$sw=0;
			for($i=0;$i<=count($valida);$i++)
			{
				if($valida[$i]==$extencion)
				{
					$sw=1;
				}
			}
			if($sw==1)
			{
				$destination = $carpeta.$_FILES[$archivo]['name'];
				$temp_file = $_FILES[$archivo]['tmp_name'];
				if (move_uploaded_file($temp_file,$destination))
				{				
					$sis->dextel_alert("correcto","El archivo se subio");				
				}
				else
				{
					$sis->dextel_alert("Ocurrio un error al guardar el archivo");
				}
				return true;
			}
			else
			{
				$sis->dextel_alert("Este Tipo de archivo no es valido");
				return false;
			}

		}	
		else
		{
			$sis->dextel_alert("Archivo no valido --  Archivo".$_FILES[$archivo]['name']."-- codigo".$val_codigo);
		}
	}
	public function upload_file($tabla, $nom_codigo, $val_codigo,$campo,$archivo,$carpeta,$valida,$sis,$base,$prefig="")
	{
		$fun=new functions;
		if($_FILES[$archivo]['name']<>"" and $val_codigo<>"")
		{
			$extencion=$fun->ob_tipofile($_FILES[$archivo]['name']);
			$sw=0;
			for($i=0;$i<=count($valida);$i++)
			{
				if($valida[$i]==$extencion)
				{
					$sw=1;
				}
			}
			if($sw==1)
			{
				$destination = $carpeta.$prefig.$val_codigo.".".$extencion;
				$temp_file = $_FILES[$archivo]['tmp_name'];
				if (move_uploaded_file($temp_file,$destination))
				{				
					//$sis->dextel_alert("correcto","El archivo se subio");
					$sql="update $tabla set $campo='$extencion' where $nom_codigo='$val_codigo'";
					$base->dex_query($sql);
				}
/*				else
				{
					//$sis->dextel_alert("Ocurrio un error al guardar el archivo");
				}
*/				return true;
			}
			else
			{
				$sis->dextel_alert("Este Tipo de archivo no es valido");
				return false;
			}

		}	
/*		else
		{
			$sis->dextel_alert("Archivo no valido --  Archivo".$_FILES[$archivo]['name']."-- codigo".$val_codigo);
		}*/
	}
	public function upload_file_install($tabla,$nom_codigo,$val_codigo,$archivo,$carpeta,$valida,$sis,$base)
	{
		$fun=new functions;
		if($_FILES[$archivo]['name']<>"" and $val_codigo<>"")
		{
			$extencion=$fun->ob_tipofile($_FILES[$archivo]['name']);
			$sw=0;
			for($i=0;$i<=count($valida);$i++)
			{
				if($valida[$i]==$extencion)
				{
					$sw=1;
				}
			}
			if($sw==1)
			{
				$destination = $carpeta.$val_codigo.".".$extencion;
				$temp_file = $_FILES[$archivo]['tmp_name'];
				if (move_uploaded_file($temp_file,$destination))
				{				
					$sis->dextel_alert("correcto","El archivo se subio");
					//instalando el modulo
					//incluimos la libreria de zip
					include('pclzip.lib.php');
					//indicamos el
					$archive = new PclZip($destination); 				 
					//Ejecutamos la funcion extract 				 
					if ($archive->extract(PCLZIP_OPT_PATH, "modulos_install/$val_codigo",PCLZIP_OPT_REMOVE_PATH, 'modulos_install') == 0) 
					{ 
						echo ("Error : ".$archive->errorInfo(true)); 
						$sql="delete from $tabla where $nom_codigo='$val_codigo'";
						$base->dex_query($sql);	
					}
					
					if (($list = $archive ->listContent()) == 0) {
							die("Error : ".$archive->errorInfo(true));
					}

					$error_modulo=false;
					$sw=0;					
					$verifica_file[0]="index.php";
					$verifica_file[1]="thumbnail.png";
					$verifica_file[2]="base.xml";
					for ($i=0; $i<sizeof($list); $i++) 
					{	
						for($j=0;$j<count($verifica_file);$j++)	
						{				
							if ($list[$i]["stored_filename"]==$verifica_file[$j])
							{
								$sw++;
							}
						}					
					}		
					
					if($sw<>count($verifica_file))
					{
						$message="falta archivos de configuracion";
						$error_modulo=true;
					}
					else
					{
						//verificando la base de datos
						$contents = file_get_contents("modulos_install/$val_codigo/base.xml");
						$result = xml2array($contents);
						
						if($result["base_dato"]["tipo"]=="install_base")
						{
 							$sis->dextel_alert("Es un modulode de multitablas");
							if (count($result["base_dato"]["tabla"])>0)
							{
								$n_t=0;
								$c_t=0;
								while($n_t<count($result["base_dato"]["tabla"]))
								{						
		 							$sis->dextel_alert("Es una archivo de una sola tabla");		
									if($result["base_dato"]["tabla"][$n_t]["name"]=="")
									{
										$c_t++;
									}
									else
									{
										if($base->dex_verifica_exite_tabla($result["base_dato"]["tabla"][$n_t]["name"]))
										{
											$c_t++;
										}
									}
									$n_t++;	
								}
								if($c_t==0)
								{									
									//ensamblando la tabla
									for ($i_tabla=0;$i_tabla<count($result["base_dato"]["tabla"]);$i_tabla++)
									{
										$sql_create="create table ";
										$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["name"]." (";
										//ensamblando los campos
										for ($i_col=0;$i_col<count($result["base_dato"]["tabla"][$i_tabla]["campo"]);$i_col++)
										{
											if($result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["name"]<>"" and 
												$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["type"] <>"")
											{
												$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["name"]." ";
												$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["type"]." ";
	
												if (!is_array($result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["long"]))
												$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["long"]." ";
	
												if (!is_array($result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["null"]))
												$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["null"]." ";
	
												if (!is_array($result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["opc"]))
												$sql_create.=$result["base_dato"]["tabla"][$i_tabla]["campo"][$i_col]["opc"];
												$sql_create.=" ,";
											}
											else
											{
												$message=" un campo no tiene nombre";
												$error_modulo=true;
											}
										}
										$sql_create.=" primary key (".$result["base_dato"]["tabla"][$i_tabla]["campo"][0]["name"].")";
										$sql_create.=")";
										$sis->dextel_alert($sql_create);
										$base->dex_query($sql_create);
										$message="correcto";
									}
								}
								else
								{
									print_r($result);
									$message="Existe duplicidad de tablas ->".$result["base_dato"]["tabla"]["name"];
//									$error_modulo=true;
								}
							}
							else
							{
								$message="este modulo no esta creado para esta version del sistema";
								$error_modulo=true;
							}
						}
						elseif($result["base_dato"]["tipo"]=="install_base_1")
						{
 							$sis->dextel_alert("Es una archivo de una sola tabla");
							$n_t=0;
							$c_t=0;				
										
							if($result["base_dato"]["tabla"]["name"]=="")
							{
								$c_t++;
							}
							else
							{
								if($base->dex_verifica_exite_tabla($result["base_dato"]["tabla"]["name"]))
								{
									$c_t++;
								}
							}
							$n_t++;	
					
							if($c_t==0)
							{									
								//ensamblando la tabla
								$sql_create="create table ";
								$sql_create.=$result["base_dato"]["tabla"]["name"]." (";
								//ensamblando los campos
								for ($i_col=0;$i_col<count($result["base_dato"]["tabla"]["campo"]);$i_col++)
								{
									if($result["base_dato"]["tabla"]["campo"][$i_col]["name"]<>"" and 
										$result["base_dato"]["tabla"]["campo"][$i_col]["type"] <>"")
									{
										$sql_create.=$result["base_dato"]["tabla"]["campo"][$i_col]["name"]." ";
										$sql_create.=$result["base_dato"]["tabla"]["campo"][$i_col]["type"]." ";

										if (!is_array($result["base_dato"]["tabla"]["campo"][$i_col]["long"]))
										$sql_create.=$result["base_dato"]["tabla"]["campo"][$i_col]["long"]." ";

										if (!is_array($result["base_dato"]["tabla"]["campo"][$i_col]["null"]))
										$sql_create.=$result["base_dato"]["tabla"]["campo"][$i_col]["null"]." ";

										if (!is_array($result["base_dato"]["tabla"]["campo"][$i_col]["opc"]))
										$sql_create.=$result["base_dato"]["tabla"]["campo"][$i_col]["opc"];
										$sql_create.=" ,";
									}
									else
									{
										$message=" un campo no tiene nombre";
										$error_modulo=true;
									}
								}
								$sql_create.=" primary key (".$result["base_dato"]["tabla"]["campo"][0]["name"].")";
								$sql_create.=")";
								$sis->dextel_alert($sql_create);
								$base->dex_query($sql_create);
								$message="correcto";
							}
							else
							{
								print_r($result);
								$message="Existe duplicidad de tablas ->".$result["base_dato"]["tabla"]["name"];
//									$error_modulo=true;
							}
						}
						elseif($result["base_dato"]["tipo"]=="no_install")
						{
							$sis->dextel_alert("Este Modulo es de solo consulta ");	
						}
						else
						{
								$message="este modulo no esta creado para esta version del sistema not";
								$error_modulo=true;
						}
					}
					
					if($error_modulo)							
					{
						$sql="delete from $tabla where $nom_codigo='$val_codigo'";	
						$base->dex_query($sql);	
						$sis->dextel_alert("Error este modulo no es apto para este sistema consulte la version   error->".$message);
					}
				}
				else
				{
					$sis->dextel_alert("Ocurrio un error al guardar el archivo");
				}
				return true;
			}
			else
			{
				$sis->dextel_alert("Este Tipo de archivo no es valido");
				return false;
			}

		}	
		else
		{
			$sis->dextel_alert("Archivo no valido --  Archivo".$_FILES[$archivo]['name']."-- codigo".$val_codigo);
		}
	}
	function titulo_seo($titulo)
	{
		return str_replace(" ","-",$titulo);
	}	//$fun-imprime_select(name,base,tabla,mostrar_columna1,mostrar_columna2,mostrar_columna3,separador1,separador2,separador3,valor_columna,seleccionado);
	function imprime_select($name,$base,$tabla,$mostrar_col1,$mostrar_col2,$mostrar_col3,$separador1,$separador2,$separador3,$valor_col,$select)
	{
		echo "<select name='$name' id='$name' class='form-control'>";
		$sql_01="select * from $tabla";
		$rs_01=$base->dex_query($sql_01);
		while ($dt_01=$base->dex_fetch_array($rs_01))
		{
		 if($dt_01["id_nivel_user"]<>1)	
		  echo "<option value='".$dt_01[$valor_col]."'>".$dt_01[$mostrar_col1].$separador.$dt_01[$mostrar_col2].$separador.$dt_01[$mostrar_col3]."</option>";
		}
		echo "</select>";
	}
	 function rrmdir($dir) {
	 $fun=new functions();
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") $fun->rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 } 
}
?>