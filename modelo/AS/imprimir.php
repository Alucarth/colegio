<?php 
ob_end_clean();
require('fpdf/fpdf.php');
class MySQL{   
  private static $conexion;  
  private static $total_consultas;   
  public function MySQL()
  {  
    if(!isset($this->conexion)){  
    $this->conexion = (mysql_connect("localhost","root","vertrigo")) or die(mysql_error());  
    mysql_select_db("colegio",$this->conexion) or die(mysql_error());  
    }  
  }  
  
  public function consulta($consulta)
  {  
   $this->total_consultas++;  
   $resultado = mysql_query($consulta,$this->conexion);  
   if(!$resultado)
   {  
    echo 'MySQL Error: ' . mysql_error();  
    exit;  
   }  
   return $resultado;   
  }  
  
  public function fetch_array($consulta)
  {   
    return mysql_fetch_array($consulta);  
  }  
  
  public function num_rows($consulta)
  {
    return mysql_num_rows($consulta);  
  }  
  public function getTotalConsultas()
  {  
    return $this->total_consultas;  
  }  
}
class PDF extends FPDF
{
	var $widths;
	var $aligns;
	
	function SetWidths($w)
	{
		$this->widths=$w;
	}
	
	function SetAligns($a)
	{
		$this->aligns=$a;
	}
	
	function Row($data)
	{
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		$this->CheckPageBreak($h);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			$x=$this->GetX();
			$y=$this->GetY();
			$this->Rect($x,$y,$w,$h);
			$this->MultiCell($w,5,$data[$i],0,$a,'true');
			$this->SetXY($x+$w,$y);
		}
		$this->Ln($h);
	}
	
	function CheckPageBreak($h)
	{
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}
	function NbLines($w,$txt)
	{
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
	function PDF($orientation='P',$unit='mm',$format='letter')
	{
		$this->SetLeftMargin(30);
		$this->SetRightMargin(25);
		$this->FPDF($orientation,$unit,$format);
		$this->B=0;
		$this->I=0;
		$this->U=0;
		$this->HREF='';
	}
	
	function Header()
	{
		$this->SetLeftMargin(15);
		$this->SetFont('Times','I',8);
		$this->Cell(0,0,'',0,1,'L');
		$this->SetFont('Times','I',8);
		$this->Cell(0,5,date("d-m-Y"),0,1,'L');
		$this->Ln(10);
	}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Times','I',7);
		$this->Cell(200,3,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
$db = new MySQL(); 
$i=0;
$paralelo = $db->consulta("select * from alumno_secundaria where id_paralelo ='".$_GET["valor"]."'");
  while($resultados = $db->fetch_array($paralelo))
  {			
	  $carnet[$i]=$resultados["carnet"];
	  $nombre[$i]=$resultados["nombre"]." ".$resultados["ap_paterno"]." ".$resultados[ "ap_materno"];	  
	  $cel[$i]=$resultados["cel"];	
	  $edad[$i]=$resultados["edad"];		    
	  $i++;
  }  
$pdf=new PDF('P','mm','Letter');
$pdf->SetLeftMargin(2);
$pdf->SetRightMargin(2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',2);
$pdf->SetFontSize(14);
$pdf->Cell(0,0,'Lista de Alumnos de Secundaria',0,1,'C');		
$pdf->Ln(10);
			$pdf->SetTextColor(0);
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetLineWidth(.2);
			$pdf->SetFillColor(158, 158, 231);
			$pdf->SetFont('Arial','',8.5); 
			$pdf->SetWidths(array(10,40,60,50,20));
			$pdf->SetTextColor(253, 253, 255);
			$pdf->SetAligns(array('C','C','C','C','C')); 
			$pdf->Row(array('N','Carnet de Identidad','Nombre de alumnos','Numero de emergencias','Edad'));
			$n=1;
			for($j=0;$j<$i;$j++)
			{
			  $pdf->SetFont('Arial','',8,'C');
			  $pdf->SetAligns(array('C','C','C','C','C'));
			  $pdf->SetTextColor(126, 126, 235);
			  $pdf->SetFillColor(253, 253, 255);
			  $pdf->Row(array($n,$carnet[$j],$nombre[$j],$cel[$j],$edad[$j]));
			  $n++;
			}
$pdf->Output();
?>		