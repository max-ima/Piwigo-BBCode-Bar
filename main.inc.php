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

function add_bbcode_bar() {
  global $page;
  
  if (isset($page['body_id']) AND $page['body_id'] == 'thePicturePage') {
    set_bbcode_bar();
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
  
  // version 2.2.a or greater of SmiliesSupport is required
  add_event_handler('loc_end_admin', 'bbcode_bar_check_smilies');
  function bbcode_bar_check_smilies() {
    global $page, $template, $pwg_loaded_plugins;

    if (
      ((isset($_GET['page']) AND $_GET['page'] == 'plugins_list') OR (isset($_GET['section']) AND $_GET['section'] == 'bbcode_bar/admin.php'))
      AND isset($pwg_loaded_plugins['SmiliesSupport']) 
      AND strcmp($pwg_loaded_plugins['SmiliesSupport']['version'], '2.2.a') == -1
    ) {
      $page['warnings'][] = "BBCode Bar : SmiliesSupport has been detected, but is not up to date. Version 2.2.a or greater is required. Please update.";
      $template->assign('warnings', $page['warnings']);
    }
  }
  
}

?>