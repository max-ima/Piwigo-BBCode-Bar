<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $conf, $template;
load_language('plugin.lang', BBcode_PATH);
$conf_bbcode_bar = explode("," , $conf['bbcode_bar']);

// Enregistrement de la configuration
if (isset($_POST['submit']))
{	
	// nouveau tableau de config
	unset($conf_bbcode_bar);
	for ($i=0; $i<=15; $i++) {
		$conf_bbcode_bar[] = (isset($_POST['chkb'.sprintf("%02d", $i)])) ? $_POST['chkb'.sprintf("%02d", $i)] : 0;
	}
	$conf_bbcode_bar[] = (isset($_POST['text17'])) ? $_POST['text17'] : 'plugins/bbcode_bar/icon';
	
	// enregistrement
    $new_value_bbcode_bar = implode ("," , $conf_bbcode_bar);
    $query = 'UPDATE ' . CONFIG_TABLE . '
		SET value="' . $new_value_bbcode_bar . '"
		WHERE param="bbcode_bar"';
    pwg_query($query);
    array_push($page['infos'], l10n('Information data registered in database'));
}

// Parametrage du template
for ($i=0; $i<=15; $i++) {
	$template->assign('CHKB'.sprintf("%02d", $i).'_STATUS', ($conf_bbcode_bar[$i] == 1) ? 'checked="checked"' : null);
}
$template->assign(array('TEXT17_STATUS' => $conf_bbcode_bar[16]));

$template->set_filename('bbcode_bar_conf', dirname(__FILE__) . '/bbcode_bar_admin.tpl');
$template->assign_var_from_handle('ADMIN_CONTENT', 'bbcode_bar_conf');

?>