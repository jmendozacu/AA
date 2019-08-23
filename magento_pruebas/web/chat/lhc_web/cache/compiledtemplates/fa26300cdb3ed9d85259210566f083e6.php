<?php  if ($is_activated == true || $is_proactive_based == true) : ?><?php  if ($chat->status == erLhcoreClassModelChat::STATUS_ACTIVE_CHAT && ($user = $chat->user) !== false) : ?><div class="operator-info float-break"><div class="pull-left pr5"><?php  if ($user->has_photo) : ?><img src="<?php  echo $user->photo_path?>" alt="<?php  echo htmlspecialchars($user->name_support)?>" /><?php  else : ?><i class="icon-assistant material-icons">account_box</i><?php  endif;?></div><div class="pl10"><div><strong><?php  echo htmlspecialchars($user->name_support)?></strong></div><?php  if (isset($extraMessage)) : ?><i><?php  echo $extraMessage;?></i><?php  endif;?><?php   ?><?php  if (!isset($hideThumbs) || $hideThumbs == false) : ?><?php  if (!isset($theme) || $theme === false || $theme->show_voting == 1) : ?><i class="material-icons<?php  if ($chat->fbst == 1) : ?> up-voted<?php  endif;?> up-vote-action" role="button" data-id="1" onclick="lhinst.voteAction($(this))" >thumb_up</i><i class="material-icons<?php  if ($chat->fbst == 2) : ?> down-voted<?php  endif;?> down-vote-action" role="button" data-id="2" onclick="lhinst.voteAction($(this))">thumb_down</i><?php  endif;?><?php  if ($user->skype != '') : ?><a href="skype:<?php  echo htmlspecialchars($user->skype)?>?call" class="material-icons" title="Llamada Skype">phone_in_talk</a><?php  endif;?><?php  endif;?><?php   ?></div></div><?php  elseif ($is_proactive_based == true) : ?><h4><?php  if ($theme !== false && $theme->support_joined != '') : ?><?php  echo htmlspecialchars($theme->support_joined)?><?php  else : ?>Un miembro del personal de soporte se ha unido a este chat<?php  endif;?></h4><?php  endif;?><?php  elseif ($is_closed == true) : ?><h4><?php  if ($theme !== false && $theme->support_closed != '') : ?><?php  echo htmlspecialchars($theme->support_closed)?><?php  else : ?>Un miembro del departamento de soporte ha cerrado este chat<?php  endif; ?></h4><?php  elseif ($is_online == true) : ?><h4><?php  if ($chat->number_in_queue > 1) : ?>Tu eres el número <b><?php  echo $chat->number_in_queue?></b> en cola. Por favor espere...<?php  else : ?><?php  if ($theme !== false && $theme->pending_join != '') : ?><?php  echo htmlspecialchars($theme->pending_join)?><?php  else : ?>Esperando mientras un miembro de soporte se une al chat, puede escribir sus preguntas y en cuanto un miembro de soporte se una a este chat le serán respondidas...<?php  endif;?><?php  endif;?></h4><?php  else : ?><h4><?php  if ($theme !== false && $theme->noonline_operators != '') : ?><?php  echo htmlspecialchars($theme->noonline_operators)?><?php  else : ?>No hay personal de soporte en línea por el momento, puede dejar tus mensajes mientras espera<?php  endif;?></h4><?php  endif; ?>