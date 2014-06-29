<?php
defined('BBCODE_ID') or die('Hacking attempt!');

global $conf, $template;

if (isset($_POST['submit']))
{
  $conf['bbcode_bar'] = array();
  foreach ($conf['bbcode_bar_codes'] as $key)
  {
    $conf['bbcode_bar'][$key] = isset($_POST[$key]);
  }
  
  conf_update_param('bbcode_bar', $conf['bbcode_bar']);
  $page['infos'][] = l10n('Information data registered in database');
}

foreach ($conf['bbcode_bar_codes'] as $key)
{
  $template->assign(strtoupper($key).'_STATUS', $conf['bbcode_bar'][$key] ? 'checked="checked"' : '');
}

$template->assign('BBCODE_PATH', BBCODE_PATH);
$template->set_filename('bbcode_bar_conf', realpath(BBCODE_PATH . 'template/bbcode_bar_admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'bbcode_bar_conf');
