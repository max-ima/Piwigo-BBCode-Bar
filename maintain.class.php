<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class bbcode_bar_maintain extends PluginMaintain
{
  private $default_conf = array(
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

  function install($plugin_version, &$errors=array())
  {
    global $conf;
    
    if (!isset($conf['bbcode_bar']))
    {
      conf_update_param('bbcode_bar', $this->default_conf, true);
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function uninstall()
  {
    conf_delete_param('bbcode_bar');
  }
}
