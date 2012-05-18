{combine_script id="markitup" require='jquery' path=$BBCODE_PATH|@cat:"template/markitup/jquery.markitup.js"}
{combine_css path=$BBCODE_PATH|@cat:"template/markitup/style.markitup.css"}

{footer_script require='jquery'}
BBCodeBar = {strip}{ldelim}
  markupSet: [
    {counter start=0 print=false assign=bbc_counter}
    
    {if isset($BBC_b)}{counter}{ldelim}name:'{'Bold : [b]bold[/b]'|@translate}', key:'B', openWith:'[b]', closeWith:'[/b]', className:'markItUpBold'},{/if}
    {if isset($BBC_i)}{counter}{ldelim}name:'{'Italic : [i]italic[/i]'|@translate}', key:'I', openWith:'[i]', closeWith:'[/i]', className:'markItUpItalic'},{/if}
    {if isset($BBC_u)}{counter}{ldelim}name:'{'Underline : [u]underline[/u]'|@translate}', key:'U', openWith:'[u]', closeWith:'[/u]', className:'markItUpUnderline'},{/if}
    {if isset($BBC_s)}{counter}{ldelim}name:'{'Striped  : [s]striped[/s]'|@translate}', key:'S', openWith:'[s]', closeWith:'[/s]', className:'markItUpStroke'},{/if}
    
    {if (isset($BBC_p) OR isset($BBC_center) OR isset($BBC_right) OR isset($BBC_quote)) AND $bbc_counter>0}{counter start=0 print=false assign=bbc_counter}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_p)}{counter}{ldelim}name:'{'Paragraph : [p]Paragraph[/p]'|@translate}', openWith:'[p]', closeWith:'[/p]', className:'markItUpParagraph'},{/if}
    {if isset($BBC_center)}{counter}{ldelim}name:'{'Center : [center]center[/center]'|@translate}', openWith:'[center]', closeWith:'[/center]', className:'markItUpCenter'},{/if}
    {if isset($BBC_right)}{counter}{ldelim}name:'{'Right : [right]right[/right]'|@translate}', openWith:'[right]', closeWith:'[/right]', className:'markItUpRight'},{/if}
    {if isset($BBC_quote)}{counter}{ldelim}name:'{'Quote : [quote]quote[/quote]'|@translate}', openWith:'[quote]', closeWith:'[/quote]', className:'markItUpQuote'},{/if}
    
    {if (isset($BBC_ul) OR isset($BBC_ol) OR isset($BBC_li)) AND $bbc_counter>0}{counter start=0 print=false assign=bbc_counter}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_ul)}{counter}{ldelim}name:'{'Unordered list : [ul][li]element[/li][/ul]'|@translate}', openWith:'[ul]\n', closeWith:'\n[/ul]', className:'markItUpListUL'},{/if}
    {if isset($BBC_ol)}{counter}{ldelim}name:'{'Ordered list : [ol][li]element[/li][/ol]'|@translate}', openWith:'[ol]\n', closeWith:'\n[/ol]', className:'markItUpListOL'},{/if}
    {if isset($BBC_ul) OR isset($BBC_ol)}{counter}{ldelim}name:'{'List element : [li]element[/li]'|@translate}', openWith:'[li]', closeWith:'[/li]', className:'markItUpListLI'},{/if}
    
    {if (isset($BBC_img) OR isset($BBC_url) OR isset($BBC_mail)) AND $bbc_counter>0}{counter start=0 print=false assign=bbc_counter}{ldelim}separator:'|' },{/if}
    
    {if isset($BBC_img)}{counter}{ldelim}name:'{'Picture : [img]picture[/img]'|@translate}', key:'P', replaceWith:'[img][![Url]!][/img]', className:'markItUpPicture'},{/if}
    {if isset($BBC_url)}{counter}{ldelim}name:'{'URL : [url=URL]Title[/url]'|@translate}', key:'L', openWith:'[url=[![Url]!]]', closeWith:'[/url]', className:'markItUpLink'},{/if}
    {if isset($BBC_email)}{counter}{ldelim}name:'{'E-mail : [email]Email[/email]'|@translate}', key:'M', replaceWith:'[email][![Mail]!][/email]', className:'markItUpMail'},{/if}
    
    {if (isset($BBC_size) OR isset($BBC_color) OR isset($BBC_smilies)) AND $bbc_counter>0}{counter start=0 print=false assign=bbc_counter}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_size)}{counter}
    {ldelim}name:'{'Font size : [size=X]text[/size]'|@translate}', className:'markItUpSize',
      dropMenu :[
        {ldelim}name:'{'tiny'|@translate}', openWith:'[size=7]', closeWith:'[/size]' },
        {ldelim}name:'{'small'|@translate}', openWith:'[size=9]', closeWith:'[/size]' },
        {ldelim}name:'{'normal'|@translate}', openWith:'[size=12]', closeWith:'[/size]' },
        {ldelim}name:'{'large'|@translate}', openWith:'[size=18]', closeWith:'[/size]' },
        {ldelim}name:'{'huge'|@translate}', openWith:'[size=24]', closeWith:'[/size]' },
      ]
    },
    {/if}
    {if isset($BBC_color)}{counter}
    {ldelim}name:'{'Font color : [color=color]text[/color]'|@translate}', className:'markItUpColors', openWith:'[color=[![Color]!]]', closeWith:'[/color]', 
      dropMenu: [
        {ldelim}name:'{'Yellow'|@translate}', openWith:'[color=yellow]', closeWidth:'[/color]', className:"col1-1" },
        {ldelim}name:'{'Orange'|@translate}', openWith:'[color=orange]', closeWidth:'[/color]', className:"col1-2" },
        {ldelim}name:'{'Red'|@translate}', openWith:'[color=red]', closeWidth:'[/color]', className:"col1-3" },
        
        {ldelim}name:'{'Blue'|@translate}', openWith:'[color=blue]', closeWidth:'[/color]', className:"col2-1" },
        {ldelim}name:'{'Purple'|@translate}', openWith:'[color=purple]', closeWidth:'[/color]', className:"col2-2" },
        {ldelim}name:'{'Green'|@translate}', openWith:'[color=green]', closeWidth:'[/color]', className:"col2-3" },
        
        {ldelim}name:'{'White'|@translate}', openWith:'[color=white]', closeWidth:'[/color]', className:"col3-1" },
        {ldelim}name:'{'Grey'|@translate}', openWith:'[color=gray]', closeWidth:'[/color]', className:"col3-2" },
        {ldelim}name:'{'Black'|@translate}', openWith:'[color=black]', closeWidth:'[/color]', className:"col3-3" }
      ]
    },
    {/if}
  ]
};{/strip}

jQuery(document).ready(function() {ldelim}
  jQuery('#contentid').markItUp(BBCodeBar);
});
{/footer_script}