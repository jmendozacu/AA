<div class="modal-dialog modal-<?php  isset($modalSize) ? print $modalSize : print 'lg'?>"><div class="modal-content"><div class="modal-header<?php  (isset($modalHeaderClass)) ? print ' '.$modalHeaderClass : ''?>"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><span class="material-icons">info_outline</span><?php  isset($modalHeaderTitle) ? print $modalHeaderTitle : ''?></h4></div><div class="modal-body<?php  (isset($modalBodyClass)) ? print ' '.$modalBodyClass : ''?>"><div class="mb0" style="padding:0px 0 10px 0;"><form id="user-action"><input class="form-control form-group" type="text" placeholder="Introduzca su dirección de correo" title="Introduzca su dirección de correo" name="UserEmail" value="<?php  echo htmlspecialchars($chat->email)?>" /><div class="btn-group" role="group" aria-label="..."><input type="button" value="Enviar" class="btn btn-default btn-xs" onclick="lhinst.sendemail()"><input type="button" value="Cancelar" class="btn btn-default btn-xs" onclick="$('#myModal').modal('hide')"></div></form></div></div></div></div>