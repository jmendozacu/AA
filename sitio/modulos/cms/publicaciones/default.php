<?
/*
| ----------------------------------------------------------------- |
CF-informer
Desarrollado por Comprandofacil
http://www.comprandofacil.com/
Copyright (c) 2000 - 2009
Medellin - Colombia
=====================================================================
  Autores:
  Juan Fernando Fern�ndez <consultorweb@comprandofacil.com> - Proyectos
  Juan Felipe S�nchez <graficoweb@comprandofacil.com> - Dise�o
  Jos� Fernando Pe�a <soporteweb@comprandofacil.com> - Mercadeo
=====================================================================
| ----------------------------------------------------------------- |
*/
// principal
$rutx=1;
if($rutx==1) $rutxx="../";
include($rutxx."../../incluidos_modulos/modulos.globales.php");

$titulomodulo="Configuraci&oacute;n de publicaciones";
$dsm=$_REQUEST['dsm'];
$ruta=limpieza(strtolower($dsm));
$idpos=$_REQUEST['idpos'];
$idactivo=$_REQUEST['idactivo'];

$letra=$_REQUEST['letra'];
$tabla="tblboletin";
$orderby=$_REQUEST['orderby'];
// eliminacion
include($rutxx."../../incluidos_modulos/modulos.papelera.php");

// insercion
if ($dsm<>"" && $idpos<>"") {
		$sql="select id ";
	 	$sql.=" from $tabla WHERE dsm='$dsm' ";
		 $result = $db->Execute($sql);
		 if (!$result->EOF) {
		 	// no insertar
			$mensajes=$men[0];
				$error=1;

		 } else {
		 	// insertar
			$sql="insert into $tabla (dsm,idpos,idactivo,dsruta)";
			$sql.=" values ('$dsm',$idpos,$idactivo,'$ruta') ";
			if ($db->Execute($sql))  {
				$mensajes="<strong>".$men[1]."</strong>";
				// cargar auditoria
				$dstitulo="Insercion $titulomodulo";
				$dsdesc=" El usuario ".$_SESSION['i_dslogin']." Ingreso un nuevo registro";

				include($rutxx."../../incluidos_modulos/logs.php");
				$error=0;

			} else {
				$mensajes=$men[2].".<br><br>$sql<br>Error:".mysql_error();
				$error=1;
			}
		 }
		 $result->close();
}

// modificacion rapida
		$contarx=count($_REQUEST['id_']);
		$h=0;
			for ($j=0;$j<$contarx;$j++){
				if ($_REQUEST['id_'][$j]<>""){
					//$dsarchivo=limpieza(strtolower($_REQUEST['dsm_'][$j])).".php";
					//$dsrutaPagina=generarPagina($dsarchivo,$carpeta,$_REQUEST['dsm_'][$j],$_REQUEST['id_'][$j],$include);

					$ruta=limpieza(strtolower($_REQUEST['dsm_'][$j]));
					$sql=" update $tabla set ";
					$sql.= "idactivo=".$_REQUEST['idactivo_'][$j];
					$sql.= ",dsm='".$_REQUEST['dsm_'][$j]."'";
					$sql.= ",dsruta='".$ruta."'";
					$sql.= ",idpos=".$_REQUEST['idpos_'][$j]."";
					$sql.= " where id=".$_REQUEST['id_'][$j].";";
					//echo $sql;
					if ($db->Execute($sql)) $h++;
				} // fin si
			} // fin for
		if ($h>0) $mensajes=$men[4];

?>
<html>
		<?include($rutxx."../../incluidos_modulos/head.php");?>
<body>

<? include($rutxx."../../incluidos_modulos/navegador.principal.php");
include($rutxx."../../incluidos_modulos/core.mensajes.php");
	// generacion del encabezado de acuerdo a los resultados encontrados
$sql="select a.id,a.dsm,a.idpos,a.dsimg,a.dsruta,a.idactivo from $tabla a where id>0 and idactivo<>9";
if ($letra<>"") $sql.=" and a.".$_REQUEST['campoletra']." like '$letra%'";
if ($_REQUEST['param']<>"") $sql.=" and a.".$_REQUEST['campo']." like '".$_REQUEST['param']."%'";
if ($orderby<>"") {
	$sql.=" order by a.$orderby asc ";
} else {
	$sql.=" order by a.idpos asc ";
}

	// modulo buscador
		// 1. por cual campo se lista cuando se usa letra
		$campoletra="dsm";
		// 2. los tipo de busqueda
		$paramb="dsm";
		$paramn="Nombre";
		include($rutxx."../../incluidos_modulos/modulos.buscador.php");
	// fin modulo buscador
	$rutaPaginacion="param=".$_REQUEST['param']."&campo=".$_REQUEST['campo']."&letra=".$_REQUEST['letra'];
	$rutaPaginacion.="&idcliente=$idcliente&dscliente=$dscliente&idprograma=$idprograma&dsprograma=$dsprograma";
	include($rutxx."../../incluidos_modulos/paginar.variables.php");
	$rutamodulo="<a href='$rutxx../core/default.php' class='textlink' target='_top' title='Principal'>Principal</a>  /  ";
		$rutamodulo.=" <span class='text1'>".$titulomodulo."</span>";
		$papelera=1;
		$dsrutaPapelera="papelera.php";//ruta de la papelera

		include($rutxx."../../incluidos_modulos/modulos.subencabezado.php");
$result=$db->PageExecute($sql,$maxregistros,$pagina_actual);
	if (!$result->EOF) {

		include("boletin.tabla.php");
		include($rutxx."../../incluidos_modulos/paginar.php");
	} // fin si
$result->Close();
	include("boletin.ingreso.php");
			include($rutxx."../../incluidos_modulos/navegador.principal.cerrar.php");

	include($rutxx."../../incluidos_modulos/modulos.remate.php");
?>

</body>
</html>