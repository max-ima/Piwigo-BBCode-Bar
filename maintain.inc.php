<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class bbcode_bar_maintain extends PluginMaintain
{
  private $installed = false;
  
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
      $conf['bbcode_bar'] = serialize($this->default_conf);

      conf_update_param('bbcode_bar', $conf['bbcode_bar']);
    }
    
    $this->installed = true;
  }

  function activate($plugin_version, &$errors=array())
  {
    if (!$this->installed)
    {
      $this->install($plugin_version, $errors);
    }
  }

  function deactivate()
  {
  }

  function uninstall()
  {
    conf_delete_param('bbcode_bar');
  }
}
