<?
session_start();
ob_start();
$ruta=1;
include('incluidos_modulos/varconexion.php');
$db=mysql_connect($servidor,$usuario,$clave);
function navegador (){
if (ereg("Netscape", $_SERVER["HTTP_USER_AGENT"]))
               $navegador = "Netscape";
     elseif(ereg("Firefox", $_SERVER["HTTP_USER_AGENT"]))
              $navegador = "FireFox";
     elseif(ereg("MSIE", $_SERVER["HTTP_USER_AGENT"]))
               $navegador = "Microsoft IE";
     elseif(ereg("Opera", $_SERVER["HTTP_USER_AGENT"]))
               $navegador = "Opera";
     elseif(ereg("Konqueror", $_SERVER["HTTP_USER_AGENT"]))
                $navegador = "Konqueror";
     else $navegador = "Estas usando un navegador que lo conoce poca gente.";

return $navegador;
}
/*
| ----------------------------------------------------------------- |
Formato PDF del archivo
*/
$idasociado=$_SESSION['i_id'];
$correo=$_SESSION['i_email'];
$codigo=$_SESSION['i_cedula'];

//
$idx=$_REQUEST['idx'];
$dsx=$_REQUEST['dsx'];
//
$idy=$_REQUEST['idy'];
$dsy=$_REQUEST['dsy'];
//
$idtv=$_REQUEST['idtv'];
$dstv=$_REQUEST['dstv'];
$idtipov=$_REQUEST['idtv'];

// traer la zona electoral
$sql="select dszonaelectoral,dscodigoasociado as dscodigo from tblvotacionasociados_temp where dscodigo='$codigo'";
$vermas=mysql_db_query($database,$sql,$db);
if(mysql_affected_rows()>0){
	$zonaelectoral=mysql_result($vermas,"0","dszonaelectoral");
	$codigo=mysql_result($vermas,"0","dscodigo");
	
}
mysql_free_result($vermas);
$dsnombre= $_SESSION['i_nombre1']." ".$_SESSION['i_nombre2']." ".$_SESSION['i_apellido1']." ".$_SESSION['i_apellido2'];



	// query para la fica y sus imagenes
		$sql5="select a.* from ";
		$sql5.=" tblvotacionfichatecnica a ";
		$sql5.=" where idactivo=1 ";
		$sql5.=" and idtv=$idtv";
		   
   //$sql5="select * from cfvttblfichatecnica where idtipov='$idtipov'";
   // $sql5.=" order by id desc limit 0,1";
    //echo $sql5;
    //exit();
    $vermas5=mysql_db_query($database,$sql5,$db);
    if(mysql_affected_rows()>0){
    $fila5=mysql_fetch_object($vermas5);
	 $encabezado=$fila5->dsimgenc;
	 $enca="../contenidos/images/fichatecnica/".$encabezado;
	 $pie=$fila5->dsimgpie;
	 $pi="../contenidos/images/fichatecnica/".$pie;
	 $cerficha=$fila5->dsdcertvotacion; 
	 
	 }
	 	 
mysql_free_result($vermas5);
// traer los datos de la votacion

$sql6="select id,dsfecha as fecharegistro from tblvotacionresultados_votos where (dscodigo='".$codigo."'  or dscedula='".$codigo."') ";
$sql6.=" and idtipov=$idtv";
//echo $sql6;			

$vermas6=mysql_db_query($database,$sql6,$db);
if(mysql_affected_rows()>0){
 $fila6=mysql_fetch_object($vermas6);
	 $dsfecha=$fila6->fecharegistro;
}
mysql_free_result($vermas6);

define('FPDF_FONTPATH','incluidos_modulos/fuentesPDF/');
require('incluidos_modulos/fpdf.php');

// formato PDF	
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
if (is_file("../contenidos/images/fichatecnica/".$encabezado)){
$pdf->Image($enca,'','','210','','','');
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,"");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

}

$pdf->Ln();
$pdf->MultiCell(0,5,"Se�or(a): ".$dsnombre);
$pdf->Ln();

$pdf->MultiCell(0,5," ".$cerficha);
$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,10,"A continuaci�n el resumen de su votacion para $dstv:");
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5,"Hora de votacion:  ".$dsfecha);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5,"VOTACION PARA ZONA ELECTORAL:  ".$zonaelectoral);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(0,5,"SI DESEA UN REPORTE DE VOTACION IMPRIMA ESTA INFORMACI�N");
if (is_file("../contenidos/images/fichatecnica/".$pie)){
$pdf->Image($pi,'0','280','210','','','');
$nombre_archivo=$_SESSION['i_dsnombre']."_".$_SESSION['i_nombre2']."_".$_SESSION['i_apellido1']."_".$_SESSION['i_apellido2'].".pdf";
//$pdf->Output("$nombre_archivo",'F');

}
$nombre=$_SESSION['i_dsnombre'];
$nombre2=$_SESSION['i_nombre2'];
$apellido1=$_SESSION['i_apellido1'];
$apelllido2=$_SESSION['i_apellido2'];


$navegador = navegador();

//echo $nombre_archivo;
if ($navegador == "Microsoft IE")
{

//$pdf->Output();
$pdf->Output(trim ($nombre."_".$nombre2."_".$apellido."_".$apellido2)."_VOT.pdf",'D');

} 
else
{

$pdf->Output(trim($nombre."_".$nombre2."_".$apellido."_".$apellido2)."_VOT.pdf",'D');

}

ob_end_flush();

?>
	