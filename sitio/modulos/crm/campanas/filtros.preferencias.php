<? 
//$db->debug=true;
$contar = count($_REQUEST['idasoc']);
$idpref=$_REQUEST['idasoc'];
$valno=0;
$preferencias="";
if($_REQUEST['idasoc']<>'' && $contar>0)
{
$datosfiltros= "Buscar por preferencia: ";
for($i=0;$i<$contar;$i++)
{
	$idfiltro.=$idpref[$i].",";
	$dsmoprefe=seldato('nombre','id','crm_preferencias',$idpref[$i],1);
	$datosfiltros.= $dsmoprefe.", ";

	
	$sql="select cliente_asociado from crm_prefencias_por_clientes where preferencia_asociada = ".$idpref[$i]." ";

	$resultPREF=$db->Execute($sql);
	if(!$resultPREF->EOF)
	{
		echo trim($datosfiltros,',');
		?>
		<table align='center' width='100%' border='0' cellpadding='2' cellspacing='1' style='table-layout:fixed;'>
			<form name="xx1">
			<tr class='formabot' bgcolor='#E6E6E6' align='center'>
				<td>
					<input type="checkbox" name="todo" onclick="ActivarTodo('xx1','todo','idclie')">
					Opciones
				</td>
				<td>
					Nombre/Razon social
				</td>
				<td>
					Tipo identificacion
				</td>
				<td>
					identificacion/NIT
				</td>
				<td>
					Tel&eacute;fono
				</td>
				<td>
					Celular
				</td>
				<td>
					Direcci&oacute;n
				</td>
				<td>
					ciudad
				</td>
				<td>
					Fax
				</td>
				<td>
					Email
				</td>
				<td>
					Fecha ingreso
				</td>
				<td>
					Fecha modificacion
				</td>	
			</tr>
			<?
		$clientes="";
		while(!$resultPREF->EOF)
		{
			$idcliente=$resultPREF->fields[0];
			$clientes.=$idcliente.",";

			$sql="select nombre_o_razn_social, apellido_o_nombre_comercial, direccin, telfono_1, tipo_documento,";
			$sql.="cdula_o_nit, fecha_constitucin, fax, celular, identificacin_, correo_email, ciudad_asociada, dsfecha_mod ,id  ";
			$sql.=" from crm_clientes where id= ".$idcliente." " ;

			$resultCLIE=$db->Execute($sql);

			if(!$resultCLIE->EOF)
			{
			
					$nombre = $resultCLIE->fields['nombre_o_razn_social'];
					$apellido = $resultCLIE->fields['apellido_o_nombre_comercial'];
					$direccion = $resultCLIE->fields['direccin'];
					$telefono = $resultCLIE->fields['telfono_1'];
					$tipodoc = $resultCLIE->fields['tipo_documento'];
					$dsmtipodoc=seldato('dsm','idtipoformulario','framecf_tbltiposformulariosxcampos',"1 and idcampo = 99 and id =".$tipodoc,1);
					$CEDNIT = $resultCLIE->fields['cdula_o_nit'];
					$fechaconsti = $resultCLIE->fields['fecha_constitucin'];
					$fax = $resultCLIE->fields['fax'];
					$celular = $resultCLIE->fields['celular'];
					$correo = $resultCLIE->fields['correo_email'];
					$idciudad = $resultCLIE->fields['ciudad_asociada'];
					$dsmciudad=seldato('nombre','id','crm_ciudades',$idciudad,1);
					$dffechamod = $resultCLIE->fields['dsfecha_mod'];
					$id = $resultCLIE->fields['id'];
				?>
							<tr>
								<td style='border:solid 1px #E6E6E6;text-align:center;'>
									<input type="checkbox" id="idclie[]" name="idclie[]" value="<? echo $id; ?>" checked>
									<a href="#" onclick="irAPaginaDN('../vendedor/reportes.php?id=<? echo $id ?>')">Info</a>
								</td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo utf8_decode($nombre).' '.utf8_decode($apellido) ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $dsmtipodoc ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $CEDNIT ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $telefono ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $celular ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo utf8_decode($direccion) ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $dsmciudad ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $fax ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;word-wrap: break-word;' ><? echo utf8_decode($correo) ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $fechaconsti ?></td>
								<td style='border:solid 1px #E6E6E6;text-align:center;' ><? echo $dffechamod ?></td>	
							</tr>
			<?		

			}
			$resultCLIE->Close();
			



		$resultPREF->MoveNext();
		}
		?>
		</form>
	</table>
<?
	$resultPREF->Close();
	}




}
$tipofiltro="1";
echo "<br /><br/>";
echo $dataCLIE;

}


?>