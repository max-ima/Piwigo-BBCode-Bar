<?php 
/*
Plugin Name: BBCode Bar
Version: auto
Description: Allow use BBCode for comments and descriptions.
Plugin URI: auto
Author: Atadilo & P@t & Mistic
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

define('BBCODE_ID' ,   basename(dirname(__FILE__)));
define('BBCODE_PATH' , PHPWG_PLUGINS_PATH . BBCODE_ID . '/');
define('BBCODE_ADMIN', get_root_url() . 'admin.php?page=plugin-' . BBCODE_ID);

include_once(BBCODE_PATH.'include/functions.inc.php');
include_once(BBCODE_PATH.'include/events.inc.php');


add_event_handler('init', 'init_bbcode_bar');

if (defined('IN_ADMIN'))
{
  add_event_handler('get_admin_plugin_menu_links', 'bbcode_bar_admin_menu');
}
else
{
  add_event_handler('loc_after_page_header', 'add_bbcode_bar', EVENT_HANDLER_PRIORITY_NEUTRAL+1);
}

add_event_handler('render_comment_content', 'BBCodeParse');
add_event_handler('render_contact_content', 'BBCodeParse');


function init_bbcode_bar()
{
  global $conf;
  
  $conf['bbcode_bar'] = safe_unserialize($conf['bbcode_bar']);
  $conf['bbcode_bar_codes'] = array('b','i','u','s','p','center','right','quote','ul','ol','img','url','email','size','color');
  
  load_language('plugin.lang', BBCODE_PATH);
  
  remove_event_handler('render_comment_content', 'render_comment_content');
}
