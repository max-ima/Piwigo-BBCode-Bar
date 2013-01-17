<?php 
/*
Plugin Name: BBCode Bar
Version: auto
Description: Allow use BBCode for comments and descriptions.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=140
Author: Atadilo & P@t & Mistic
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('BBcode_DIR' , basename(dirname(__FILE__)));
define('BBcode_PATH' , PHPWG_PLUGINS_PATH . BBcode_DIR . '/');
define('BBcode_codes', serialize(array('b','i','u','s','p','center','right','quote','ul','ol','img','url','email','size','color')));

include_once(BBcode_PATH.'bbcode_bar.inc.php');
add_event_handler('init', 'init_bbcode_bar');

function init_bbcode_bar()
{
  remove_event_handler('render_comment_content', 'render_comment_content');
  add_event_handler('render_comment_content', 'BBCodeParse');
  add_event_handler('loc_after_page_header', 'add_bbcode_bar');
}

function add_bbcode_bar() 
{
  global $page, $pwg_loaded_plugins;
  
  if (isset($page['body_id']) AND $page['body_id'] == 'thePicturePage') 
  {
    $prefilter = 'picture';
  }
  else if (
    script_basename() == 'index' and isset($pwg_loaded_plugins['Comments_on_Albums'])
    and isset($page['section']) and $page['section'] == 'categories' and isset($page['category'])
    ) 
  {
    $prefilter = 'comments_on_albums';
  }
  else if (isset($page['section']) and $page['section'] == 'guestbook') 
  {
    $prefilter = 'index';
  }
  
  if (isset($prefilter))
  {
    set_bbcode_bar($prefilter);
  }
}

if (script_basename() == 'admin')
{
  add_event_handler('get_admin_plugin_menu_links', 'bbcode_bar_admin_menu');
  function bbcode_bar_admin_menu($menu)
  {
    array_push($menu, array(
      'NAME' => 'BBCode Bar',
      'URL' => get_root_url().'admin.php?page=plugin-' . BBcode_DIR
    ));
    return $menu;
  } 
}

?>