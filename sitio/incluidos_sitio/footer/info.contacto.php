<?
        $rutaImagen=$rut."../contenidos/images/remate/";
        $sql="select id,dsdireccion,dstelefono,dsimg1,dsemail,dsciudad from tblremate where idactivo=1";
        //    echo $sql;
        $result=$db->Execute($sql);
        if(!$result->EOF){
		$id=reemplazar($result->fields[0]);
		$dsdireccion=reemplazar($result->fields[1]);
		$dsimg1=($result->fields[3]);
		$dstelefono=reemplazar($result->fields[2]);

		$dsemail=$result->fields[4];
		$dsciudad=reemplazar($result->fields[5]);

	   ?>


<article class ="cont_info">
	<? if ($dstelefono<>"") {?><p><? echo $dstelefono ?></p><? } ?>
	<? if ($dsdireccion<>"") {?><p><? echo $dsdireccion ?></p><? } ?>
	<? if ($dsemail<>"") {?><p><? echo $dsemail?></p><? } ?>
	<? if ($dsciudad<>"") {?><p><? echo $dsciudad?></p></p><? } ?>
</article>


<?
		}
		$result->Close();
	?>