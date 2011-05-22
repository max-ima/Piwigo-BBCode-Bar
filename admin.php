<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $conf, $template;
load_language('plugin.lang', BBcode_PATH);

// Met à jour la configuration si necessaire
if (strpos($conf['bbcode_bar'],',') !== false)
{
  include(BBcode_PATH .'maintain.inc.php');
  plugin_activate();
}

$conf_bbcode_bar = unserialize($conf['bbcode_bar']);

// Enregistrement de la configuration
if (isset($_POST['submit']))
{  
  // nouveau tableau de config
  unset($conf_bbcode_bar);
  foreach(unserialize(BBcode_codes) as $key) {
    $conf_bbcode_bar[$key] = (isset($_POST[$key])) ? true : false;
  }
  
  // enregistrement
  conf_update_param('bbcode_bar', serialize($conf_bbcode_bar));
  array_push($page['infos'], l10n('Information data registered in database'));
}

// Parametrage du template
foreach(unserialize(BBcode_codes) as $key) {
  $template->assign(strtoupper($key).'_STATUS', ($conf_bbcode_bar[$key] == 1) ? 'checked="checked"' : null);
}

$template->assign('BBCODE_PATH', BBcode_PATH);
$template->set_filename('bbcode_bar_conf', dirname(__FILE__) . '/template/bbcode_bar_admin.tpl');
$template->assign_var_from_handle('ADMIN_CONTENT', 'bbcode_bar_conf');

?>