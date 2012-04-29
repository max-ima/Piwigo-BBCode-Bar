<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

function plugin_install()
{  
  global $conf;
  
  $BBcode_default = array(
    'b' => true,
    'i' => true,
    'u' => true,
    's' => true,
    'p' => true,
    'center' => true,
    'right' => true,
    'quote' => true,
    'ul' => true,
    'ol' => true,
    'img' => true,
    'url' => true,
    'email' => true,
    'size' => true,
    'color' => true,
  );

  if (!isset($conf['bbcode_bar']))
  {
    conf_update_param('bbcode_bar',serialize($BBcode_default));
  }
}

function plugin_activate()
{
  global $conf;
  
  if (strpos($conf['bbcode_bar'],',') !== false)
  {
    $conf_bbcode_bar = explode(',', $conf['bbcode_bar']);
    
    $new_bbcode_bar =  array(
      'b' => $conf_bbcode_bar[1] == '1' ? true : false,
      'i' => $conf_bbcode_bar[2] == '1' ? true : false,
      'u' => $conf_bbcode_bar[3] == '1' ? true : false,
      's' => $conf_bbcode_bar[4] == '1' ? true : false,
      'p' => $conf_bbcode_bar[0] == '1' ? true : false,
      'center' => $conf_bbcode_bar[5] == '1' ? true : false,
      'right' => $conf_bbcode_bar[6] == '1' ? true : false,
      'quote' => $conf_bbcode_bar[9] == '1' ? true : false,
      'ul' => $conf_bbcode_bar[7] == '1' ? true : false,
      'ol' => $conf_bbcode_bar[8] == '1' ? true : false,
      'img' => $conf_bbcode_bar[10] == '1' ? true : false,
      'url' => $conf_bbcode_bar[11] == '1' ? true : false,
      'email' => $conf_bbcode_bar[12] == '1' ? true : false,
      'size' => $conf_bbcode_bar[13] == '1' ? true : false,
      'color' => $conf_bbcode_bar[14] == '1' ? true : false,
    );
    
    conf_update_param('bbcode_bar', serialize($new_bbcode_bar));
  }
}

function plugin_uninstall()
{
  pwg_query('DELETE FROM ' . CONFIG_TABLE . ' WHERE param="bbcode_bar";');
}

?>