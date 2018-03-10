<?php 
class functions{
	function imprime_select($name,$base,$tabla,$mostrar_col1,$mostrar_col2,$mostrar_col3,$separador1,$separador2,$separador3,$valor_col,$select){
	  echo "<select name='$name' class='form-control'>";
	  $sql_01="select * from $tabla";
	  $rs_01=$base->dex_query($sql_01);
	  while ($dt_01=$base->dex_fetch_array($rs_01)){
	   echo "<option value='".$dt_01[$valor_col]."'>".$dt_01[$mostrar_col1].$separador.$dt_01[$mostrar_col2].$separador.$dt_01[$mostrar_col3]."</option>";}
	  echo "</select>";} 	  
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
					$sql="update $tabla set $campo='$extencion' where $nom_codigo='$val_codigo'";
					$base->dex_query($sql);
				}
				return true;
			}
			else
			{
				$sis->dextel_alert("Este Tipo de archivo no es valido");
				return false;
			}

		}	
	}	  
}
?>