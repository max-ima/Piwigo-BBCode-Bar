<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// add BBCodeBar to textarea
function set_bbcode_bar($prefilter='picture', $textarea_id='contentid')
{
  global $template, $conf, $pwg_loaded_plugins, $page;
  
  load_language('plugin.lang', dirname(__FILE__) . '/');
  $conf_bbcode_bar = unserialize($conf['bbcode_bar']);
  
  
  // buttons
  $tpl_codes = array();
  foreach (unserialize(BBcode_codes) as $key) 
  {
    $tpl_codes[$key] = (bool)$conf_bbcode_bar[$key];
  }
  $tpl_codes['smilies'] = isset($pwg_loaded_plugins['SmiliesSupport']);
  
  
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
      if ($tpl_codes[$code]) $count++;
    }
    if ($count>0)
    {
      foreach ($groups[$i+1] as $code)
      {
        if ($tpl_codes[$code]) $separator = true;
      }
    }
    if ($separator)
    {
      $tpl_groups[$i] = true;
      $count = 0;
    }
  }
  
  $template->assign(array(
    'BBC' => $tpl_codes,
    'SEP' => $tpl_groups,
    'BBCODE_PATH' => BBcode_PATH,
    'BBCODE_ID' => $textarea_id,
    ));
  
  $template->set_prefilter($prefilter, 'set_bbcode_bar_prefilter');    

  // smilies support > 2.3 ## must be parsed after bbcode_bar, because the javascript must be after bbc's one
  if (isset($pwg_loaded_plugins['SmiliesSupport'])) 
  {
    set_smiliessupport($prefilter, $textarea_id);
  }  
}

function set_bbcode_bar_prefilter($content, &$smarty)
{
  $search = '#(<div id="guestbookAdd">|<div id="commentAdd">|<div class="contact">)#';
  $replace = file_get_contents(BBcode_PATH.'/template/bbcode_bar.tpl').'$1';
  return preg_replace($search, $replace, $content);
}


// check tags and eventually close malformed tags, return BBCoded String
function CheckTags($str)
{
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
      if (in_array(strtolower($tag),unserialize(BBcode_codes)) || in_array(strtolower(substr($tag,1)),unserialize(BBcode_codes)))
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

  $conf_bbcode_bar = unserialize($conf['bbcode_bar']);
  $str = CheckTags(nl2br($str));

  $patterns = array();
  $replacements = array();

  if ($conf_bbcode_bar['p'])
  {
    //Paragraph
    $patterns[] = '#\[p\](.*?)\[/p\]#is';
    $replacements[] = '<p>\\1</p>';
  }
  if ($conf_bbcode_bar['b'])
  {
    // Bold
    $patterns[] = '#\[b\](.*?)\[/b\]#is';
    $replacements[] = '<b>\\1</b>';
  }
  if ($conf_bbcode_bar['i'])
  {
    //Italic
    $patterns[] = '#\[i\](.*?)\[/i\]#is';
    $replacements[] = '<i>\\1</i>';
  }
  if ($conf_bbcode_bar['u'])
  {
    //Underline  
    $patterns[] = '#\[u\](.*?)\[\/u\]#is';
    $replacements[] = '<u>\\1</u>';
  }
  if ($conf_bbcode_bar['s'])
  {
    //Strikethrough
    $patterns[] = '#\[s\](.*?)\[/s\]#is';
    $replacements[] = '<s>\\1</s>';
  }
  if ($conf_bbcode_bar['center'])
  {
    //Center
    $patterns[] = '#\[center\](.*?)\[/center\]#is';
    $replacements[] = '<div align="center"><p>\\1</p></div>';
  }
  if ($conf_bbcode_bar['right'])
  {
    //Right
    $patterns[] = '#\[right\](.*?)\[/right\]#is';
    $replacements[] = '<div align="right"><p>\\1</p></div>';
  }
  if ($conf_bbcode_bar['ol'])
  {
    //Olist
    $patterns[] = '#\[ol\](.*?)\[/ol\]#is';
    $replacements[] = '<ol>\\1</ol>';
  }
  if ($conf_bbcode_bar['ul'])
  {
    //Ulist
    $patterns[] = '#\[ul\](.*?)\[/ul\]#is';
    $replacements[] = '<ul>\\1</ul>';
  }
  if ($conf_bbcode_bar['ol'] || $conf_bbcode_bar['ul'])
  {
    //List
    $patterns[] = '#\[li\](.*?)\[/li\]#is';
    $replacements[] = '<li>\\1</li>';
  }
  if ($conf_bbcode_bar['quote'])
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
  if ($conf_bbcode_bar['img'])
  {
    //Images
    $patterns[] = "#\[img\](.*?)\[/img\]#is";
    $replacements[] = '<img src="\\1" />';
  }
  if ($conf_bbcode_bar['url'])
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
  if ($conf_bbcode_bar['email'])
  {
    //[email]samvure@gmail.com[/email]
    $patterns[] = "#\[email\]([a-z0-9&\-_.]+?@[\w\-]+\.([\w\-\.]+\.)?[\w]+)\[/email\]#is";
    $replacements[] = '<a href="mailto:\\1">\\1</a>';
  }
  if ($conf_bbcode_bar['size'])
  {
    //Size
    $patterns[] = "#\[size=([1-2]?[0-9])\](.*?)\[/size\]#is";
    $replacements[] = '<span style="font-size: \\1px; line-height: normal">\\2</span>';
  }
  if ($conf_bbcode_bar['color'])
  {
    //Colours
    $patterns[] = "#\[color=(\#[0-9A-F]{6}|\#[0-9A-F]{3}|[a-z]+)\](.*?)\[/color\]#is";
    $replacements[] = '<span style="color: \\1">\\2</span>';
  }
  
  return preg_replace($patterns, $replacements, $str);
}

?>