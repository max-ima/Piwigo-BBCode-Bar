<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
 
function set_bbcode_bar()
{
  global $template, $conf, $lang, $user, $pwg_loaded_plugins;
  
  load_language('plugin.lang', dirname(__FILE__) . '/');
  
  $conf_bbcode_bar = explode("," , $conf['bbcode_bar']);

  $template->set_filename('bbcode_bar', dirname(__FILE__).'/bbcode_bar.tpl');
  
  if ($conf_bbcode_bar[0]  == 1) $template->assign('BBCode_bar_button_00',true);
  if ($conf_bbcode_bar[1]  == 1) $template->assign('BBCode_bar_button_01',true);			
  if ($conf_bbcode_bar[2]  == 1) $template->assign('BBCode_bar_button_02',true);
  if ($conf_bbcode_bar[3]  == 1) $template->assign('BBCode_bar_button_03',true);
  if ($conf_bbcode_bar[4]  == 1) $template->assign('BBCode_bar_button_04',true);
  if ($conf_bbcode_bar[5]  == 1) $template->assign('BBCode_bar_button_05',true);
  if ($conf_bbcode_bar[6]  == 1) $template->assign('BBCode_bar_button_06',true);
  if ($conf_bbcode_bar[7]  == 1) $template->assign('BBCode_bar_button_07',true);
  if ($conf_bbcode_bar[8]  == 1) $template->assign('BBCode_bar_button_08',true);
  if ($conf_bbcode_bar[9]  == 1) $template->assign('BBCode_bar_button_09',true);
  if ($conf_bbcode_bar[10] == 1) $template->assign('BBCode_bar_button_10',true);
  if ($conf_bbcode_bar[11] == 1) $template->assign('BBCode_bar_button_11',true);
  if ($conf_bbcode_bar[12] == 1) $template->assign('BBCode_bar_button_12',true);
  if ($conf_bbcode_bar[13] == 1) $template->assign('BBCode_bar_button_13',true);
  if ($conf_bbcode_bar[14] == 1) $template->assign('BBCode_bar_button_14',true);
  if ($conf_bbcode_bar[15] == 1) $template->assign('BBCode_bar_button_15',true);
  $template->assign('repicon', $conf_bbcode_bar[17]);
  
  if (isset($pwg_loaded_plugins['SmiliesSupport']))
  {
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
            if ($temp != $tag)
              $before_tag.='[/'.$temp.']';
            else 
            {
              $before_tag.='[/'.$tag.']';
              break;
            }
          }
          $end_pos += strlen($before_tag)+strlen($after_tag)-strlen($str);
          $str = $before_tag.$after_tag;
        } 
        else 
        { // push stack
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
    $replacements[] = '</p><div align="center"><p>\\1</p></div><p>';
  }
  if ( $conf_bbcode_bar[6] == 1 )
  {
    //Right
    $patterns[] = '#\[right\](.*?)\[/right\]#is';
    $replacements[] = '</p><div align="right"><p>\\1</p></div><p>';
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
    $replacements[] = '</p><blockquote><span style="font-size: 11px; line-height: normal">\\1</span></blockquote><p>';

    //Quotes with "user"
    $patterns[] = "#\[quote=&quot;(.*?)&quot;\](.*?)\[/quote\]#is";
    $replacements[] = '</p><blockquote><span style="font-size: 11px; line-height: normal"><b>\\1 : </b><br/>\\2</span></blockquote><p>';

    //Quotes with user
    $patterns[] = "#\[quote=(.*?)\](.*?)\[/quote\]#is";
    $replacements[] = '</p><blockquote><span style="font-size: 11px; line-height: normal"><b>\\1 : </b><br/>\\2</span></blockquote><p>';
  }
  if ( $conf_bbcode_bar[10] == 1 )
  {
    //Images
    $patterns[] = "#\[img\](.*?)\[/img\]#si";
    $replacements[] = "<img src='\\1' alt='' />";
  }
  if ( $conf_bbcode_bar[11] == 1 )
  {
    //[url]xxxx://www.zzzz.yyy[/url]
    $patterns[] = "#\[url\]([\w]+?://[^ \"\n\r\t<]*?)\[/url\]#is"; 
    $replacements[] = '<a href="\\1" target="_blank">\\1</a>'; 

    //[url]www.zzzzz.yyy[/url]
    $patterns[] = "#\[url\]((www|ftp)\.[^ \"\n\r\t<]*?)\[/url\]#is"; 
    $replacements[] = '<a href="http://\\1" target="_blank">\\1</a>'; 

    //[url=xxxx://www.zzzzz.yyy]ZzZzZ[/url] /*No I ain't sleeping yet*/
    $patterns[] = "#\[url=([\w]+?://[^ \"\n\r\t<]*?)\](.*?)\[/url\]#is"; 
    $replacements[] = '<a href="\\1" target="_blank">\\2</a>'; 

    // [url=www.zzzzz.yyy]zZzZz[/url] /*But I'm thinking about*/
    $patterns[] = "#\[url=((www|ftp)\.[^ \"\n\r\t<]*?)\](.*?)\[/url\]#is"; 
    $replacements[] = '<a href="http://\\1" target="_blank">\\2</a>'; 

    // [url="www.zzzzz.yyy"]zZzZz[/url]   /* It's nearly 2 am now */
    $patterns[] = "#\[url=&quot;((www|ftp)\.[^ \n\r\t<]*?)&quot;\](.*?)\[/url\]#is";
    $replacements[] = '<a href="http://\\1" target="_blank">\\3</a>';
    
    //[url="http://www.zzzzz.yyy"]zZzZz[/url] /*I really dislike commenting code*/
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