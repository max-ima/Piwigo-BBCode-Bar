<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

function plugin_install()
{  
  global $conf;

  if (!isset($conf['bbcode_bar']))
  {
    $q = 'INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment)
VALUES ("bbcode_bar","1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,plugins/bbcode_bar/icon","Parametres BBCode_bar");';
    pwg_query($q);
  }
}

function plugin_uninstall()
{
    global $conf;

    if (isset($conf['bbcode_bar']))
    {
      pwg_query('DELETE FROM ' . CONFIG_TABLE . ' WHERE param="bbcode_bar" LIMIT 1;');
    }
}
