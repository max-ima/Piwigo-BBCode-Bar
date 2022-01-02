<?php
defined('BBCODE_PATH') or die('Hacking attempt!');

// check tags and eventually close malformed tags, return BBCoded String
function bbcode_checktags($str)
{
  global $conf;

  //storage stack
  $tags = array();

  for ($pos = 0; $pos<strlen($str); $pos++)
  {
    if ($str[$pos] == '[')
    {
      $end_pos = strpos($str, ']', $pos);
      $tag = substr($str, ++$pos, $end_pos-$pos);
      //deals with tags which contains arguments (ie quote)
      if ( ($equal_pos = strpos($tag, '=', 0)) !== FALSE)
      $tag = substr($tag, 0, $equal_pos);
      //check whether we have a defined tag or not.
      if (in_array(strtolower($tag), $conf['bbcode_bar_codes']) || in_array(strtolower(substr($tag,1)), $conf['bbcode_bar_codes']))
      {
        //closing tag
        if ($tag[0] == '/')
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
