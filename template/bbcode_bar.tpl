{combine_script id='markitup' require='jquery' load='footer' path=$BBCODE_PATH|@cat:'template/markitup/jquery.markitup.js'}
{combine_css path=$BBCODE_PATH|@cat:'template/markitup/style.markitup.css'}

{footer_script require='markitup'}
BBCodeBar = {strip}{ldelim}
  markupSet: [
    {counter start=0 print=false assign=bbc_counter}
    
    {if $BBC.b}{counter}{ldelim}name:'{'Bold : [b]bold[/b]'|@translate}', key:'B', openWith:'[b]', closeWith:'[/b]', className:'miuIcon miuBold'},{/if}
    {if $BBC.i}{counter}{ldelim}name:'{'Italic : [i]italic[/i]'|@translate}', key:'I', openWith:'[i]', closeWith:'[/i]', className:'miuIcon miuItalic'},{/if}
    {if $BBC.u}{counter}{ldelim}name:'{'Underline : [u]underline[/u]'|@translate}', key:'U', openWith:'[u]', closeWith:'[/u]', className:'miuIcon miuUnderline'},{/if}
    {if $BBC.s}{counter}{ldelim}name:'{'Striped  : [s]striped[/s]'|@translate}', key:'S', openWith:'[s]', closeWith:'[/s]', className:'miuIcon miuStroke'},{/if}
    
    {if $SEP[0]}{counter}{ldelim}separator:'|'},{/if}
    
    {if $BBC.p}{counter}{ldelim}name:'{'Paragraph : [p]Paragraph[/p]'|@translate}', openWith:'[p]', closeWith:'[/p]', className:'miuIcon miuParagraph'},{/if}
    {if $BBC.center}{counter}{ldelim}name:'{'Center : [center]center[/center]'|@translate}', openWith:'[center]', closeWith:'[/center]', className:'miuIcon miuCenter'},{/if}
    {if $BBC.right}{counter}{ldelim}name:'{'Right : [right]right[/right]'|@translate}', openWith:'[right]', closeWith:'[/right]', className:'miuIcon miuRight'},{/if}
    {if $BBC.quote}{counter}{ldelim}name:'{'Quote : [quote]quote[/quote]'|@translate}', openWith:'[quote]', closeWith:'[/quote]', className:'miuIcon miuQuote'},{/if}
    
    {if $SEP[1]}{counter}{ldelim}separator:'|'},{/if}
    
    {if $BBC.ul}{counter}{ldelim}name:'{'Unordered list : [ul][li]element[/li][/ul]'|@translate}', openWith:'[ul]\n', closeWith:'\n[/ul]', className:'miuIcon miuListUL'},{/if}
    {if $BBC.ol}{counter}{ldelim}name:'{'Ordered list : [ol][li]element[/li][/ol]'|@translate}', openWith:'[ol]\n', closeWith:'\n[/ol]', className:'miuIcon miuListOL'},{/if}
    {if $BBC.ul OR $BBC.ol}{counter}{ldelim}name:'{'List element : [li]element[/li]'|@translate}', multiline:true, openWith:'[li]', closeWith:'[/li]', className:'miuIcon miuListLI'},{/if}
    
    {if $SEP[2]}{counter}{ldelim}separator:'|' },{/if}
    
    {if $BBC.img}{counter}{ldelim}name:'{'Picture : [img]picture[/img]'|@translate}', key:'P', replaceWith:'[img][![Source:!:http://]!][/img]', className:'miuIcon miuPicture'},{/if}
    {if $BBC.url}{counter}{ldelim}name:'{'URL : [url=URL]Title[/url]'|@translate}', key:'L', openWith:'[url=[![Url:!:http://]!]]', closeWith:'[/url]', className:'miuIcon miuLink'},{/if}
    {if $BBC.email}{counter}{ldelim}name:'{'E-mail : [email]Email[/email]'|@translate}', key:'M', replaceWith:'[email][![Mail]!][/email]', className:'miuIcon miuMail'},{/if}
    
    {if $SEP[3]}{counter}{ldelim}separator:'|'},{/if}
    
    {if $BBC.size}{counter}
    {ldelim}name:'{'Font size : [size=X]text[/size]'|@translate}', className:'miuIcon miuSize',
      dropMenu :[
        {ldelim}name:'{'tiny font'|@translate}', openWith:'[size=7]', closeWith:'[/size]', className:'miuSizeTiny' },
        {ldelim}name:'{'small font'|@translate}', openWith:'[size=9]', closeWith:'[/size]', className:'miuSizeSmall' },
        {ldelim}name:'{'normal font'|@translate}', openWith:'[size=12]', closeWith:'[/size]', className:'miuSizeNormal' },
        {ldelim}name:'{'large font'|@translate}', openWith:'[size=18]', closeWith:'[/size]', className:'miuSizeLarge' },
        {ldelim}name:'{'huge font'|@translate}', openWith:'[size=24]', closeWith:'[/size]', className:'miuSizeHuge' },
      ]
    },
    {/if}
    {if $BBC.color}{counter}
    {ldelim}name:'{'Font color : [color=color]text[/color]'|@translate}', className:'miuIcon miuColors', openWith:'[color=[![Color]!]]', closeWith:'[/color]', 
      dropMenu: [
        {ldelim}name:'{'Yellow'|@translate}', openWith:'[color=yellow]', closeWith:'[/color]', className:"col1-1" },
        {ldelim}name:'{'Orange'|@translate}', openWith:'[color=orange]', closeWith:'[/color]', className:"col1-2" },
        {ldelim}name:'{'Red'|@translate}', openWith:'[color=red]', closeWith:'[/color]', className:"col1-3" },
        
        {ldelim}name:'{'Blue'|@translate}', openWith:'[color=blue]', closeWith:'[/color]', className:"col2-1" },
        {ldelim}name:'{'Purple'|@translate}', openWith:'[color=purple]', closeWith:'[/color]', className:"col2-2" },
        {ldelim}name:'{'Green'|@translate}', openWith:'[color=green]', closeWith:'[/color]', className:"col2-3" },
        
        {ldelim}name:'{'White'|@translate}', openWith:'[color=white]', closeWith:'[/color]', className:"col3-1" },
        {ldelim}name:'{'Grey'|@translate}', openWith:'[color=gray]', closeWith:'[/color]', className:"col3-2" },
        {ldelim}name:'{'Black'|@translate}', openWith:'[color=black]', closeWith:'[/color]', className:"col3-3" }
      ]
    },
    {/if}
    
    {if $SEP[4]}{counter}{ldelim}separator:'|'},{/if}
  ]
};{/strip}


jQuery('#{$BBCODE_ID}').markItUp(BBCodeBar);
jQuery('.markItUpHeader>ul').css('width', {$bbc_counter}*22);
{/footer_script}