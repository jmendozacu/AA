<?
/*
| ----------------------------------------------------------------- |
Sistema integrado de gestion e informacion administrativa

Desarrollado por Comprandofacil
http://www.comprandofacil.com/
Copyright (c) 2000 - 2012
Medellin - Colombia
=====================================================================
  Autores:
  Juan Fernando Fern�ndez <consultorweb@comprandofacil.com>
  Juan Felipe S�nchez <graficoweb@comprandofacil.com>
  Jos� Fernando Pe�a <soporteweb@comprandofacil.com>
=====================================================================
| ----------------------------------------------------------------- |
 Impresion de pantalla
*/
//include ("../sessiones.php");
//include ("../../incluidos/creditos.php");
$rutx=1;
if($rutx==1) $rutxx="../";

include ($rutxx."../../incluidos_modulos/comunes.php");
include ($rutxx."../../incluidos_modulos/varconexion.php");
include ($rutxx."../../incluidos_modulos/sessiones.php");
include ($rutxx."../../incluidos_modulos/funciones.php");
include ($rutxx."../../incluidos_modulos/func.calendario_2.php"); // funcion nueva del calendario


?>
<html>
<head>
<title>informaci�n de cliente</title>
<link rel="stylesheet" type="text/css" href="../../incluidos/estilos.css">
<? include ($rutxx."../../incluidos_modulos/javageneral.php"); ?>
</head>
<body color=#ffffff  topmargin=5 leftmargin=0>


<table width="100%" border="0" class="textnegrotit">
	<tr>
		<td width="221px"><img style="width:50%" src="../../../images/logo_city_png.png"></td>
		<td align="center">
			<strong>INFORMACI&Oacute;N DE CLIENTES</strong>

		</td>
	</tr>
</table>

<?
$tablax=$prefix."tbltiposformulariosxcampo";
	$tabla="framecf_tblregistro_formularios";
	$idy=$_REQUEST['idy'];

$sqlx="select b.id,b.dsm,b.dscampo from $tablax b where id>0 and idtipoformulario='1' ";
$sqlx.="and idactivo=1";
$sqlx.=" order by idpos";
//echo $sqlx;
$result_campos=$db->Execute($sqlx);
if (!$result_campos->EOF) {
?>
<table width="100%" border="0" class="text1">
<?
	while(!$result_campos->EOF){
		$id=$result_campos->fields[0];
		$dsm=$result_campos->fields[1];
		$dscampo=$result_campos->fields[2];

		$nombrecampos.=$dsm.",";
		$campos.=$dscampo.",";

		$sql=" SELECT $dscampo FROM $tabla WHERE $dscampo !='' and id=$idy ";
		//echo $sql;
		$result=$db->Execute($sql);
		if (!$result->EOF) {
		$dsmvalor=$result->fields[0];
?>
<tr>
	<td><? echo $dsm;?></td>
	<td> <? echo $dsmvalor;?></td>
</tr>
<?
		}
		$result->Close();



  $result_campos->MoveNext();
		 		 }
?>
</table>
<?
	} // fin si
$result_campos->Close();?>



</body>
</html>

