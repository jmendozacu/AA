<?
/*
| ----------------------------------------------------------------- |
FrameWork Cf Para CMS CRM ECOMMERCE
Desarrollado por Comprandofacil
http://www.comprandofacil.com/
Copyright (c)
Medellin - Colombia
=====================================================================
  Autores:
  Area Investigacion y Desarrollo
  Area Diseno y Maquetacion
  Area Mercadeo
=====================================================================
| ----------------------------------------------------------------- |
*/
// principal

$rutx=1;
if($rutx==1) $rutxx="../";
include($rutxx."../../incluidos_modulos/modulos.globales.php");
//$db->debug=true;
$apagar=1;
$titulomodulo="Constructor de reportes  ";
$tabla="framecf_tbltiposreportes";
$pruta="reportes";
$dsrutap="../crm/reportes/constructor.php";
include("proceso.php");
$papelera=1;
$dsrutaPapelera="../papelera/papelera.php?dstabla=$tabla&titulomodulo=$titulomodulo&xruta=$pruta&idy=$idy&dstoken=$dstokenvalidador";//ruta de la papelera

?>
<html>
    <?include($rutxx."../../incluidos_modulos/head.php");?>
<body>

<?
 include($rutxx."../../incluidos_modulos/navegador.principal.php");
 include($rutxx."../../incluidos_modulos/core.mensajes.php");

// generacion del encabezado de acuerdo a los resultados encontrados
$sql="select a.id,a.dsm,a.idpos,a.idactivo,a.dstabla,a.idfecha,a.idusuario,a.dsruta from $tabla a where id>0 and a.idactivo not in (9) ";
if ($letra<>"") $sql.=" and a.".$_REQUEST['campoletra']." like '$letra%'";
if ($_REQUEST['param']<>"") $sql.=" and a.".$_REQUEST['campo']." like '".$_REQUEST['param']."%'";
$sql.=" order by a.dsm asc ";
//echo $sql;
  // modulo buscador
    // 1. por cual campo se lista cuando se usa letra
    $campoletra="dsm";
    // 2. los tipo de busqueda
    $paramb="dsm";
    $paramn="Reporte";
  // fin modulo buscador
    $rutaPaginacion="param=".$_REQUEST['param']."&campo=".$_REQUEST['campo']."&letra=".$_REQUEST['letra'];
    $rutamodulo="<a href='../../core/default.php?dstoken=$dstokenvalidador' class='textlink' title='Principal'>Principal</a>  /  <span class='text1'>".$titulomodulo."</span>";
    include("constructor.tabla.php");
    include("constructor.ingreso.php");
    include($rutxx."../../incluidos_modulos/navegador.principal.cerrar.php");

//    include($rutxx."../../incluidos_modulos/paginar.php");
//include($rutxx."../../incluidos_modulos/html.remate.php");
include($rutxx."../../incluidos_modulos/navegador.principal.cerrar.php");
    include($rutxx."../../incluidos_modulos/modulos.remate.php");
?>


</body>
</html>