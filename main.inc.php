<?php 
/*
Plugin Name: BBCode Bar
Version: 2.2.a
Description: Allow use BBCode for comments and descriptions.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=140
Author: Atadilo & P@t & Mistic
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('BBcode_DIR' , basename(dirname(__FILE__)));
define('BBcode_PATH' , PHPWG_PLUGINS_PATH . BBcode_DIR . '/');

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
	if ($page['body_id'] == 'theCommentsPage' OR $page['body_id'] == 'thePicturePage') {
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
}

?>