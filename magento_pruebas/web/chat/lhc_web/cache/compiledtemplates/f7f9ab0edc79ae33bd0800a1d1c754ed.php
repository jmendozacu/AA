<div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="text-center"><ul class="bb-list list-inline"><li><a href="#" title="Imagen" class="material-icons" data-promt="img" data-bb-code="img">image</a></li><li><a href="#" title="Enlace" class="material-icons" data-promt="url" data-bb-code=" [url=http://example.com]Título del enlace[/url] ">link</a></li>
<li><a href="#" title="Negritas" data-bb-code=" [b][/b] "><strong>B</strong></a></li><li><a href="#" title="Itálica" data-bb-code=" [i][/i] "><em>I</em></a></li><li><a href="#" data-bb-code=" :) "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_smile.png" alt=":)" title=":)" /></a></li><li><a href="#" data-bb-code=" :D: "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_happy.png" alt=":D:" title=":D:" /></a></li><li><a href="#" data-bb-code=" :( "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_unhappy.png" alt=":(" title=":(" /></a></li><li><a href="#" data-bb-code=" :o: "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_surprised.png" alt=":o:" title=":o:" /></a></li><li><a href="#" data-bb-code=" :p: "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_tongue.png" alt=":p:" title=":p:" /></a></li><li><a href="#" data-bb-code=" ;) "><img src="/chat/lhc_web/design/defaulttheme/images/smileys/emoticon_wink.png" alt=";)" title=";)" /></a></li></ul><script>$('.bb-list a').click(function(){var caretPos = document.getElementById("CSChatMessage").selectionStart;var textAreaTxt = jQuery("#CSChatMessage").val();var txtToAdd = $(this).attr('data-bb-code');if (typeof $(this).attr('data-promt') != 'undefined' && $(this).attr('data-promt') == 'img') {var link = prompt("Por favor introduzca el enlace a una imagen");if (link) {txtToAdd ='['+txtToAdd+']'+link+'[/'+txtToAdd+']';jQuery("#CSChatMessage").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );$('#myModal').modal('hide');}} else if (typeof $(this).attr('data-promt') != 'undefined' && $(this).attr('data-promt') == 'url') {var link = prompt("Por favor introduzca un enlace");if (link) {txtToAdd ='[url='+link+']Aquí hay un enlace[/url]';jQuery("#CSChatMessage").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );$('#myModal').modal('hide');}} else {jQuery("#CSChatMessage").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );$('#myModal').modal('hide');};return false;});</script></div></div></div></div>