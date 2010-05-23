<?php /*
Plugin Name: BBCode Bar
Version: auto
Description: Allow use BBCode for comments and descriptions.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=140
Author: Atadilo & P@t
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

include_once(dirname(__FILE__).'/bbcode_bar.inc.php');

add_event_handler('init', 'init_bbcode_bar');

function init_bbcode_bar()
{
  remove_event_handler('render_comment_content', 'parse_comment_content' );
  add_event_handler('render_comment_content', 'BBCodeParse');
  add_event_handler('loc_begin_picture', 'set_bbcode_bar');
}

if (script_basename() == 'admin')
{
  add_event_handler('get_admin_plugin_menu_links', 'bbcode_bar_admin_menu');
  
  function bbcode_bar_admin_menu($menu)
  {
    array_push($menu,
      array('NAME' => 'BBCode Bar',
            'URL' => get_admin_plugin_menu_link(dirname(__FILE__) . '/bbcode_bar_admin.php')));
    return $menu;
  }
}
?>