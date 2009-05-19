<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $conf, $template;

load_language('plugin.lang', dirname(__FILE__) . '/');

$conf_bbcode_bar = explode("," , $conf['bbcode_bar']);
// Enregistrement de la configuration
if (isset($_POST['submit'])) {
	if (!isset($_POST['chkb00'])) $_POST['chkb00'] = '0';
	if (!isset($_POST['chkb01'])) $_POST['chkb01'] = '0';
	if (!isset($_POST['chkb02'])) $_POST['chkb02'] = '0';
	if (!isset($_POST['chkb03'])) $_POST['chkb03'] = '0';
	if (!isset($_POST['chkb04'])) $_POST['chkb04'] = '0';
	if (!isset($_POST['chkb05'])) $_POST['chkb05'] = '0';
	if (!isset($_POST['chkb06'])) $_POST['chkb06'] = '0';
	if (!isset($_POST['chkb07'])) $_POST['chkb07'] = '0';
	if (!isset($_POST['chkb08'])) $_POST['chkb08'] = '0';
	if (!isset($_POST['chkb09'])) $_POST['chkb09'] = '0';
	if (!isset($_POST['chkb10'])) $_POST['chkb10'] = '0';
	if (!isset($_POST['chkb11'])) $_POST['chkb11'] = '0';
	if (!isset($_POST['chkb12'])) $_POST['chkb12'] = '0';
	if (!isset($_POST['chkb13'])) $_POST['chkb13'] = '0';
	if (!isset($_POST['chkb14'])) $_POST['chkb14'] = '0';
	if (!isset($_POST['chkb15'])) $_POST['chkb15'] = '0';
	if (!isset($_POST['chkb16'])) $_POST['chkb16'] = '0';
	if (!isset($_POST['text17'])) $_POST['text17'] = 'plugins/bbcode_bar/icon';
	
	$conf_bbcode_bar=array(
		$_POST['chkb00'],
		$_POST['chkb01'],
		$_POST['chkb02'],
		$_POST['chkb03'],
		$_POST['chkb04'],
		$_POST['chkb05'],
		$_POST['chkb06'],
		$_POST['chkb07'],
		$_POST['chkb08'],
		$_POST['chkb09'],
		$_POST['chkb10'],
		$_POST['chkb11'],
		$_POST['chkb12'],
		$_POST['chkb13'],
		$_POST['chkb14'],
		$_POST['chkb15'],
		$_POST['chkb16'],
		$_POST['text17']
		);
		
    $new_value_bbcode_bar = implode ("," , $conf_bbcode_bar);
    $query = '
UPDATE ' . CONFIG_TABLE . '
  SET value="' . $new_value_bbcode_bar . '"
  WHERE param="bbcode_bar"
  LIMIT 1';
    pwg_query($query);
    array_push($page['infos'], l10n('bbcb_config_saved'));
	
}
// Parametrage du template
if ($conf_bbcode_bar[0]  == 1) $template->assign(array('CHKB00_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[1]  == 1) $template->assign(array('CHKB01_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[2]  == 1) $template->assign(array('CHKB02_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[3]  == 1) $template->assign(array('CHKB03_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[4]  == 1) $template->assign(array('CHKB04_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[5]  == 1) $template->assign(array('CHKB05_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[6]  == 1) $template->assign(array('CHKB06_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[7]  == 1) $template->assign(array('CHKB07_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[8]  == 1) $template->assign(array('CHKB08_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[9]  == 1) $template->assign(array('CHKB09_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[10] == 1) $template->assign(array('CHKB10_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[11] == 1) $template->assign(array('CHKB11_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[12] == 1) $template->assign(array('CHKB12_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[13] == 1) $template->assign(array('CHKB13_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[14] == 1) $template->assign(array('CHKB14_STATUS' => 'checked="checked"'));
if ($conf_bbcode_bar[15] == 1) $template->assign(array('CHKB15_STATUS' => 'checked="checked"'));
//if ($conf_bbcode_bar[16] == 1) $template->assign(array('CHKB16_STATUS' => 'checked="checked"'));

$template->assign(array('TEXT17_STATUS' => $conf_bbcode_bar[17]));
		
$template->set_filename('bbcode_bar_conf', dirname(__FILE__) . '/bbcode_bar_admin.tpl');
$template->assign_var_from_handle('ADMIN_CONTENT', 'bbcode_bar_conf');

?>