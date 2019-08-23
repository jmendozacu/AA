<!DOCTYPE html><html lang="es" dir="ltr"><head><title><?php  if (isset($Result['path'])) : ?><?php $ReverseOrder = $Result['path']; krsort($ReverseOrder); foreach ($ReverseOrder as $pathItem) : ?><?php  echo htmlspecialchars($pathItem['title']).' '?>&laquo;<?php  echo ' ';endforeach;?><?php  endif; ?><?php  echo htmlspecialchars('Live Helper Chat - live support')?></title><meta http-equiv="content-type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"><link rel="icon" type="image/png" href="/chat/lhc_web/design/defaulttheme/images/favicon.ico" /><link rel="shortcut icon" type="image/x-icon" href="/chat/lhc_web/design/defaulttheme/images/favicon.ico"><meta name="Keywords" content="" /><meta name="Description" content="" /><meta name="robots" content="noindex, nofollow"><meta name="copyright" content="Remigijus Kiminas, livehelperchat.com"><?php  if ('ltr' == 'ltr' || 'ltr' == '') : ?><link rel="stylesheet" type="text/css" href="/chat/lhc_web/cache/compiledtemplates/030c12cbaa02208dca65379ef66df40e.css" /><?php  else : ?><link rel="stylesheet" type="text/css" href="/chat/lhc_web/cache/compiledtemplates/eb4f338d6619408712b750dc2f2da4a0.css" /><?php  endif;?><?php  echo isset($Result['additional_header_css']) ? $Result['additional_header_css'] : ''?><?php   ?><?php   $adminThemeId = '0'; if ($adminThemeId > 0 ) { $adminTheme = erLhAbstractModelAdminTheme::fetch($adminThemeId); if ($adminTheme instanceof erLhAbstractModelAdminTheme) { echo $adminTheme->header_content_front; if ($adminTheme->header_css != '') { echo '<style>',$adminTheme->header_css,'</style>'; } }; }; ?><?php   ?><script type="text/javascript">var WWW_DIR_JAVASCRIPT = '/chat/lhc_web/index.php/site_admin/';var WWW_DIR_JAVASCRIPT_FILES = '/chat/lhc_web/design/defaulttheme/sound';var WWW_DIR_LHC_WEBPACK = '/chat/lhc_web/design/defaulttheme/js/lh/dist/';var WWW_DIR_JAVASCRIPT_FILES_NOTIFICATION = '/chat/lhc_web/design/defaulttheme/images/notification';var confLH = {};<?php  $soundData = array (0 => false,'repeat_sound' => 1,'repeat_sound_delay' => 5,'show_alert' => false,'new_chat_sound_enabled' => true,'new_message_sound_admin_enabled' => true,'new_message_sound_user_enabled' => true,'online_timeout' => 300,'check_for_operator_msg' => 10,'back_office_sinterval' => 10,'chat_message_sinterval' => 3.5,'long_polling_enabled' => false,'polling_chat_message_sinterval' => 1.5,'polling_back_office_sinterval' => 5,'connection_timeout' => 30,'browser_notification_message' => false,); ?>confLH.back_office_sinterval = <?php  echo (int)($soundData['back_office_sinterval']*1000) ?>;confLH.chat_message_sinterval = <?php  echo (int)($soundData['chat_message_sinterval']*1000) ?>;confLH.new_chat_sound_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('new_chat_sound',(int)($soundData['new_chat_sound_enabled'])) ?>;confLH.new_message_sound_admin_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_admin_enabled'])) ?>;confLH.new_message_sound_user_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_user_enabled'])) ?>;confLH.new_message_browser_notification = <?php  echo isset($soundData['browser_notification_message']) ? (int)($soundData['browser_notification_message']) : 0 ?>;confLH.transLation = {'new_chat':'Nueva solicitud de chat'};confLH.csrf_token = '<?php  echo erLhcoreClassUser::instance()->getCSFRToken()?>';confLH.repeat_sound = <?php  echo (int)$soundData['repeat_sound']?>;confLH.repeat_sound_delay = <?php  echo (int)$soundData['repeat_sound_delay']?>;confLH.show_alert = <?php  echo (int)$soundData['show_alert']?>;</script><script type="text/javascript" src="/chat/lhc_web/cache/compiledtemplates/ebdfd2a3d74d723e440170f7601dc0a0.js"></script><?php  echo isset($Result['additional_header_js']) ? $Result['additional_header_js'] : ''?><?php   ?></head><body><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><span><a href="/chat/lhc_web/index.php/site_admin/" title="Inicio"><img src="/chat/lhc_web/design/defaulttheme/images/general/logo.png" alt="Live helper Chat" title="Live helper Chat"></a></span></div><div class="modal-body"><?php  echo $Result['content'];?></div></div></div><div class="container-fluid"><div class="row footer-row"><div class="columns col-xs-12"><p class="pull-right"><a target="_blank" href="http://livehelperchat.com">Live Helper Chat &copy; <?php  echo date('Y')?></a></p>
<p><a href="http://livehelperchat.com"><?php  echo htmlspecialchars('Live Helper Chat')?></a></p>
</div></div><script type="text/javascript" language="javascript" src="/chat/lhc_web/cache/compiledtemplates/1db24f8f361d6827470a9398b713c89c.js"></script><?php  echo isset($Result['additional_footer_js']) ? $Result['additional_footer_js'] : ''?><?php   ?></div><?php  if (false == true) { $debug = ezcDebug::getInstance(); echo $debug->generateOutput(); } ?></body></html>