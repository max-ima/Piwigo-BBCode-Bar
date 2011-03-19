<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
 
function set_bbcode_bar()
{
	global $template, $conf, $lang, $user, $pwg_loaded_plugins, $page;
	load_language('plugin.lang', dirname(__FILE__) . '/');
	$conf_bbcode_bar = explode("," , $conf['bbcode_bar']);
	$template->set_filename('bbcode_bar', dirname(__FILE__).'/bbcode_bar.tpl');

	// buttons
	for ($i=0; $i<=15; $i++) {
		if ($conf_bbcode_bar[$i] == 1) $template->assign('BBCode_bar_button_'.sprintf("%02d", $i), true);
	}
	$template->assign('repicon', $conf_bbcode_bar[16]);
	
	// edit field has different id
	if (
		(isset($_GET['action']) AND $_GET['action'] == 'edit_comment') 
		OR (isset($page['body_id']) AND $page['body_id'] == 'theCommentsPage')
	) {
		$template->assign('form_name', 'editComment');
	} else {
		$template->assign('form_name', 'addComment');
	}

	// smilies support
	if (isset($pwg_loaded_plugins['SmiliesSupport'])) {
		$template->assign('BBCode_bar_SmiliesSupport', array('SMILIESSUPPORT_PAGE' => SmiliesTable()));
	}

	$lang['Comment'] .= $template->parse('bbcode_bar', true);			
}


//Check tags and eventually close malformed tags, return BBCoded String
function CheckTags($str)
{
	//array of known tags
	$known = array('p','b','i','u','s','center','right','ol','ul','li','quote', 'img','url','email','color', 'size');
	//storage stack
	$tags = array();

	for ($pos = 0; $pos<strlen($str); $pos++)
	{
		if ($str{$pos} == '[')
		{
			$end_pos = strpos($str, ']', $pos);
			$tag = substr($str, ++$pos, $end_pos-$pos);
			//deals with tags which contains arguments (ie quote)
			if ( ($equal_pos = strpos($tag, '=', 0)) !== FALSE)
			$tag = substr($tag, 0, $equal_pos);
			//check whether we have a defined tag or not.
			if (in_array(strtolower($tag),$known) || in_array(strtolower(substr($tag,1)),$known))
			{
				//closing tag
				if ($tag{0} == '/')
				{
					//cleaned tag
					$tag = substr($tag, 1);		
					$before_tag = substr($str, 0, $pos-1);
					$after_tag = substr($str, $end_pos+1);	
					//pop stack
					while (($temp = array_pop($tags)))
					{
						if ($temp != $tag) {
							$before_tag.='[/'.$temp.']';
						} else {
							$before_tag.='[/'.$tag.']';
							break;
						}
					}
					$end_pos += strlen($before_tag)+strlen($after_tag)-strlen($str);
					$str = $before_tag.$after_tag;
				} else { // push stack
					array_push($tags,$tag);
				}
			}
			$pos = $end_pos;	
		}
	}
	// empty stack and closing tags
	while ($temp = array_pop($tags))
	{		
		$str.='[/'.$temp.']';
	}
	return $str;
}

// return string, HTML version of BBCoded $str
function BBCodeParse($str)
{
	global $conf;

	$conf_bbcode_bar = explode("," , $conf['bbcode_bar']);
	$str = CheckTags(nl2br($str));

	$patterns = array();
	$replacements = array();

	if ( $conf_bbcode_bar[0] == 1 )
	{
		//Paragraph
		$patterns[] = '#\[p\](.*?)\[/p\]#is';
		$replacements[] = '<p>\\1</p>';
	}
	if ( $conf_bbcode_bar[1] == 1 )
	{
		// Bold
		$patterns[] = '#\[b\](.*?)\[/b\]#is';
		$replacements[] = '<strong>\\1</strong>';
	}
	if ( $conf_bbcode_bar[2] == 1 )
	{
		//Italic
		$patterns[] = '#\[i\](.*?)\[/i\]#is';
		$replacements[] = '<em>\\1</em>';
	}
	if ( $conf_bbcode_bar[3] == 1 )
	{
		//Underline	
		$patterns[] = '#\[u\](.*?)\[\/u\]#is';
		$replacements[] = '<u>\\1</u>';
	}
	if ( $conf_bbcode_bar[4] == 1 )
	{
		//Strikethrough
		$patterns[] = '#\[s\](.*?)\[/s\]#is';
		$replacements[] = '<del>\\1</del>';
	}
	if ( $conf_bbcode_bar[5] == 1 )
	{
		//Center
		$patterns[] = '#\[center\](.*?)\[/center\]#is';
		$replacements[] = '<div align="center"><p>\\1</p></div>';
	}
	if ( $conf_bbcode_bar[6] == 1 )
	{
		//Right
		$patterns[] = '#\[right\](.*?)\[/right\]#is';
		$replacements[] = '<div align="right"><p>\\1</p></div>';
	}
	if ( $conf_bbcode_bar[7] == 1 )
	{
		//Olist
		$patterns[] = '#\[ol\](.*?)\[/ol\]#is';
		$replacements[] = '<ol>\\1</ol>';
	}
	if ( $conf_bbcode_bar[8] == 1 )
	{
		//Ulist
		$patterns[] = '#\[ul\](.*?)\[/ul\]#is';
		$replacements[] = '<ul>\\1</ul>';
	}
	if (( $conf_bbcode_bar[7] == 1 ) || ( $conf_bbcode_bar[8] == 1 ))
	{
		//List
		$patterns[] = '#\[li\](.*?)\[/li\]#is';
		$replacements[] = '<li>\\1</li>';
	}
	if ( $conf_bbcode_bar[9] == 1 )
	{
		// Quotes
		$patterns[] = "#\[quote\](.*?)\[/quote\]#is";
		$replacements[] = '<blockquote><span style="font-size: 11px; line-height: normal">\\1</span></blockquote>';

		//Quotes with "user"
		$patterns[] = "#\[quote=&quot;(.*?)&quot;\](.*?)\[/quote\]#is";
		$replacements[] = '<blockquote><span style="font-size: 11px; line-height: normal"><b>\\1 : </b><br/>\\2</span></blockquote>';

		//Quotes with user
		$patterns[] = "#\[quote=(.*?)\](.*?)\[/quote\]#is";
		$replacements[] = '<blockquote><span style="font-size: 11px; line-height: normal"><b>\\1 : </b><br/>\\2</span></blockquote>';
	}
	if ( $conf_bbcode_bar[10] == 1 )
	{
		//Images
		$patterns[] = "#\[img\](.*?)\[/img\]#si";
		$replacements[] = '<img src="\\1" />';
	}
	if ( $conf_bbcode_bar[11] == 1 )
	{
		//[url]xxxx://www.zzzz.yyy[/url]
		$patterns[] = "#\[url\]([\w]+?://[^ \"\n\r\t<]*?)\[/url\]#is"; 
		$replacements[] = '<a href="\\1" target="_blank">\\1</a>'; 

		//[url]www.zzzzz.yyy[/url]
		$patterns[] = "#\[url\]((www|ftp)\.[^ \"\n\r\t<]*?)\[/url\]#is"; 
		$replacements[] = '<a href="http://\\1" target="_blank">\\1</a>'; 

		//[url=xxxx://www.zzzzz.yyy]ZzZzZ[/url]
		$patterns[] = "#\[url=([\w]+?://[^ \"\n\r\t<]*?)\](.*?)\[/url\]#is"; 
		$replacements[] = '<a href="\\1" target="_blank">\\2</a>'; 

		// [url=www.zzzzz.yyy]zZzZz[/url]
		$patterns[] = "#\[url=((www|ftp)\.[^ \"\n\r\t<]*?)\](.*?)\[/url\]#is"; 
		$replacements[] = '<a href="http://\\1" target="_blank">\\2</a>'; 

		// [url="www.zzzzz.yyy"]zZzZz[/url]
		$patterns[] = "#\[url=&quot;((www|ftp)\.[^ \n\r\t<]*?)&quot;\](.*?)\[/url\]#is";
		$replacements[] = '<a href="http://\\1" target="_blank">\\3</a>';

		//[url="http://www.zzzzz.yyy"]zZzZz[/url]
		$patterns[] = "#\[url=&quot;([\w]+?://[^ \n\r\t<]*?)&quot;\](.*?)\[/url\]#is";
		$replacements[] = '<a href="\\1" target="_blank">\\2</a>';
	}
	if ( $conf_bbcode_bar[12] == 1 )
	{
		//[email]samvure@gmail.com[/email]
		$patterns[] = "#\[email\]([a-z0-9&\-_.]+?@[\w\-]+\.([\w\-\.]+\.)?[\w]+)\[/email\]#is";
		$replacements[] = '<a href="mailto:\\1">\\1</a>';
	}
	if ( $conf_bbcode_bar[13] == 1 )
	{
		//Size
		$patterns[] = "#\[size=([1-2]?[0-9])\](.*?)\[/size\]#si";
		$replacements[] = '<span style="font-size: \\1px; line-height: normal">\\2</span>';
	}
	if ( $conf_bbcode_bar[14] == 1 )
	{
		//Colours
		$patterns[] = "#\[color=(\#[0-9A-F]{6}|[a-z]+)\](.*?)\[/color\]#si";
		$replacements[] = '<span style="color: \\1">\\2</span>';
	}
	
	return preg_replace($patterns, $replacements, $str);
}

?>