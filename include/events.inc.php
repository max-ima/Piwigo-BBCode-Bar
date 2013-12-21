<?php
defined('BBCODE_ID') or die('Hacking attempt!');

function bbcode_bar_admin_menu($menu)
{
  $menu[] = array(
    'NAME' => 'BBCode Bar',
    'URL' => BBCODE_ADMIN,
    );
  return $menu;
}

function add_bbcode_bar() 
{
  global $page, $pwg_loaded_plugins, $template, $conf;
  
  if (script_basename() == 'picture') 
  {
    $prefilter = 'picture';
    $textarea_id = 'contentid';
  }
  else if (isset($page['section']))
  {
    if (
      script_basename() == 'index' and isset($pwg_loaded_plugins['Comments_on_Albums'])
      and $page['section'] == 'categories' and isset($page['category'])
      ) 
    {
      $prefilter = 'comments_on_albums';
      $textarea_id = 'contentid';
    }
    else if ($page['section'] == 'guestbook') 
    {
      $prefilter = 'guestbook';
      $textarea_id = 'contentid';
    }
    else if ($page['section'] == 'contact') 
    {
      $prefilter = 'contactform';
      $textarea_id = 'cf_content';
    }
  }
  
  if (!isset($prefilter))
  {
    return;
  }
  
  $conf['bbcode_bar']['smilies'] = isset($pwg_loaded_plugins['SmiliesSupport']);
  
  // calculate separators between groups
  $groups = array(
    array('b','i','u','s'),
    array('p','center','right','quote'),
    array('ol','ul'),
    array('img','url','email'),
    array('size','color'),
    array('smilies'),
    );
    
  $tpl_groups = array();
  $count = 0;
  for ($i=0; $i<count($groups)-1; $i++)
  {
    $separator = false;
    foreach ($groups[$i] as $code)
    {
      if ($conf['bbcode_bar'][$code]) $count++;
    }
    if ($count>0)
    {
      foreach ($groups[$i+1] as $code)
      {
        if ($conf['bbcode_bar'][$code]) $separator = true;
      }
    }
    if ($separator)
    {
      $tpl_groups[$i] = true;
      $count = 0;
    }
  }
  
  $template->assign(array(
    'BBCODE_PATH' => BBCODE_PATH,
    'BBCODE' => array(
      'codes' => $conf['bbcode_bar'],
      'separators' => $tpl_groups,
      'textarea_id' => $textarea_id,
      ),
    ));

  $template->set_filename('bbcodebar', realpath(BBCODE_PATH.'/template/bbcode_bar.tpl'));
  $template->parse('bbcodebar');
}

// return string, HTML version of BBCoded $str
function BBCodeParse($str)
{
  global $conf;

  $str = bbcode_checktags(nl2br($str));

  $patterns = array();
  $replacements = array();

  if ($conf['bbcode_bar']['p'])
  {
    //Paragraph
    $patterns[] = '#\[p\](.*?)\[/p\]#is';
    $replacements[] = '<p>\\1</p>';
  }
  if ($conf['bbcode_bar']['b'])
  {
    // Bold
    $patterns[] = '#\[b\](.*?)\[/b\]#is';
    $replacements[] = '<b>\\1</b>';
  }
  if ($conf['bbcode_bar']['i'])
  {
    //Italic
    $patterns[] = '#\[i\](.*?)\[/i\]#is';
    $replacements[] = '<i>\\1</i>';
  }
  if ($conf['bbcode_bar']['u'])
  {
    //Underline  
    $patterns[] = '#\[u\](.*?)\[\/u\]#is';
    $replacements[] = '<u>\\1</u>';
  }
  if ($conf['bbcode_bar']['s'])
  {
    //Strikethrough
    $patterns[] = '#\[s\](.*?)\[/s\]#is';
    $replacements[] = '<s>\\1</s>';
  }
  if ($conf['bbcode_bar']['center'])
  {
    //Center
    $patterns[] = '#\[center\](.*?)\[/center\]#is';
    $replacements[] = '<div align="center">\\1</div>';
  }
  if ($conf['bbcode_bar']['right'])
  {
    //Right
    $patterns[] = '#\[right\](.*?)\[/right\]#is';
    $replacements[] = '<div align="right">\\1</div>';
  }
  if ($conf['bbcode_bar']['ol'])
  {
    //Olist
    $patterns[] = '#\[ol\](.*?)\[/ol\]#is';
    $replacements[] = '<ol>\\1</ol>';
  }
  if ($conf['bbcode_bar']['ul'])
  {
    //Ulist
    $patterns[] = '#\[ul\](.*?)\[/ul\]#is';
    $replacements[] = '<ul>\\1</ul>';
  }
  if ($conf['bbcode_bar']['ol'] || $conf['bbcode_bar']['ul'])
  {
    //List
    $patterns[] = '#\[li\](.*?)\[/li\]#is';
    $replacements[] = '<li>\\1</li>';
  }
  if ($conf['bbcode_bar']['quote'])
  {
    // Quotes
    $patterns[] = "#\[quote\](.*?)\[/quote\]#is";
    $replacements[] = '<blockquote><span style="font-size:11px;line-height:normal">\\1</span></blockquote>';

    //Quotes with "user"
    $patterns[] = "#\[quote=&quot;(.*?)&quot;\](.*?)\[/quote\]#is";
    $replacements[] = '<blockquote><span style="font-size:11px;line-height:normal"><b>\\1 : </b><br/>\\2</span></blockquote>';

    //Quotes with user
    $patterns[] = "#\[quote=(.*?)\](.*?)\[/quote\]#is";
    $replacements[] = '<blockquote><span style="font-size:11px;line-height:normal"><b>\\1 : </b><br/>\\2</span></blockquote>';
  }
  if ($conf['bbcode_bar']['img'])
  {
    //Images
    $patterns[] = "#\[img\](.*?)\[/img\]#is";
    $replacements[] = '<img src="\\1" />';
  }
  if ($conf['bbcode_bar']['url'])
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

    //[url=www.zzzzz.yyy]zZzZz[/url]
    $patterns[] = "#\[url=((www|ftp)\.[^ \"\n\r\t<]*?)\](.*?)\[/url\]#is"; 
    $replacements[] = '<a href="http://\\1" target="_blank">\\2</a>'; 

    //[url="www.zzzzz.yyy"]zZzZz[/url]
    $patterns[] = "#\[url=&quot;((www|ftp)\.[^ \n\r\t<]*?)&quot;\](.*?)\[/url\]#is";
    $replacements[] = '<a href="http://\\1" target="_blank">\\3</a>';

    //[url="http://www.zzzzz.yyy"]zZzZz[/url]
    $patterns[] = "#\[url=&quot;([\w]+?://[^ \n\r\t<]*?)&quot;\](.*?)\[/url\]#is";
    $replacements[] = '<a href="\\1" target="_blank">\\2</a>';
  }
  if ($conf['bbcode_bar']['email'])
  {
    //[email]samvure@gmail.com[/email]
    $patterns[] = "#\[email\]([a-z0-9&\-_.]+?@[\w\-]+\.([\w\-\.]+\.)?[\w]+)\[/email\]#is";
    $replacements[] = '<a href="mailto:\\1">\\1</a>';
  }
  if ($conf['bbcode_bar']['size'])
  {
    //Size
    $patterns[] = "#\[size=([1-2]?[0-9])\](.*?)\[/size\]#is";
    $replacements[] = '<span style="font-size: \\1px; line-height: normal">\\2</span>';
  }
  if ($conf['bbcode_bar']['color'])
  {
    //Colours
    $patterns[] = "#\[color=(\#[0-9A-F]{6}|\#[0-9A-F]{3}|[a-z]+)\](.*?)\[/color\]#is";
    $replacements[] = '<span style="color: \\1">\\2</span>';
  }
  
  return preg_replace($patterns, $replacements, $str);
}