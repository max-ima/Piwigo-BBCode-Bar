{combine_script id="markitup" require='jquery' path=$BBCODE_PATH|@cat:"template/markitup/jquery.markitup.js"}
{combine_css path=$BBCODE_PATH|@cat:"template/markitup/style.markitup.css"}

{footer_script require='jquery'}
BBCodeBar = {ldelim}
  markupSet: [
    {if isset($BBC_b)}{ldelim}name:'{'b_help'|@translate}', key:'B', openWith:'[b]', closeWith:'[/b]', className:'markItUpBold'},{/if}
    {if isset($BBC_i)}{ldelim}name:'{'i_help'|@translate}', key:'I', openWith:'[i]', closeWith:'[/i]', className:'markItUpItalic'},{/if}
    {if isset($BBC_u)}{ldelim}name:'{'u_help'|@translate}', key:'U', openWith:'[u]', closeWith:'[/u]', className:'markItUpUnderline'},{/if}
    {if isset($BBC_s)}{ldelim}name:'{'s_help'|@translate}', key:'S', openWith:'[s]', closeWith:'[/s]', className:'markItUpStroke'},{/if}
    
    {if isset($BBC_p) OR isset($BBC_center) OR isset($BBC_right) OR isset($BBC_quote)}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_p)}{ldelim}name:'{'p_help'|@translate}', openWith:'[p]', closeWith:'[/p]', className:'markItUpParagraph'},{/if}
    {if isset($BBC_center)}{ldelim}name:'{'center_help'|@translate}', openWith:'[center]', closeWith:'[/center]', className:'markItUpCenter'},{/if}
    {if isset($BBC_right)}{ldelim}name:'{'right_help'|@translate}', openWith:'[right]', closeWith:'[/right]', className:'markItUpRight'},{/if}
    {if isset($BBC_quote)}{ldelim}name:'{'quote_help'|@translate}', openWith:'[quote]', closeWith:'[/quote]', className:'markItUpQuote'},{/if}
    
    {if isset($BBC_ul) OR isset($BBC_ol) OR isset($BBC_li)}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_ul)}{ldelim}name:'{'ul_help'|@translate}', openWith:'[ul]\n', closeWith:'\n[/ul]', className:'markItUpListUL'},{/if}
    {if isset($BBC_ol)}{ldelim}name:'{'ol_help'|@translate}', openWith:'[ol]\n', closeWith:'\n[/ol]', className:'markItUpListOL'},{/if}
    {if isset($BBC_ul) OR isset($BBC_ol)}{ldelim}name:'{'li_help'|@translate}', openWith:'[li]', closeWith:'[/li]', className:'markItUpListLI'},{/if}
    
    {if isset($BBC_img) OR isset($BBC_url) OR isset($BBC_mail)}{ldelim}separator:'|' },{/if}
    
    {if isset($BBC_img)}{ldelim}name:'{'img_help'|@translate}', key:'P', replaceWith:'[img][![Url]!][/img]', className:'markItUpPicture'},{/if}
    {if isset($BBC_url)}{ldelim}name:'{'url_help'|@translate}', key:'L', openWith:'[url=[![Url]!]]', closeWith:'[/url]', className:'markItUpLink'},{/if}
    {if isset($BBC_email)}{ldelim}name:'{'mail_help'|@translate}', key:'M', replaceWith:'[email][![Mail]!][/email]', className:'markItUpMail'},{/if}
    
    {if isset($BBC_size) OR isset($BBC_color) OR isset($BBC_smilies)}{ldelim}separator:'|'},{/if}
    
    {if isset($BBC_size)}
    {ldelim}name:'{'size_help'|@translate}', className:'markItUpSize',
      dropMenu :[
        {ldelim}name:'{'tiny'|@translate}', openWith:'[size=7]', closeWith:'[/size]' },
        {ldelim}name:'{'small'|@translate}', openWith:'[size=9]', closeWith:'[/size]' },
        {ldelim}name:'{'normal'|@translate}', openWith:'[size=12]', closeWith:'[/size]' },
        {ldelim}name:'{'large'|@translate}', openWith:'[size=18]', closeWith:'[/size]' },
        {ldelim}name:'{'huge'|@translate}', openWith:'[size=24]', closeWith:'[/size]' },
      ]
    },
    {/if}
    {if isset($BBC_color)}
    {ldelim}name:'{'color_help'|@translate}', className:'markItUpColors', openWith:'[color=[![Color]!]]', closeWith:'[/color]', 
      dropMenu: [
        {ldelim}name:'{'yellow_help'|@translate}',  openWith:'[color=yellow]',   closeWith:'[/color]', className:"col1-1" },
        {ldelim}name:'{'orange_help'|@translate}',  openWith:'[color=orange]',   closeWith:'[/color]', className:"col1-2" },
        {ldelim}name:'{'red_help'|@translate}',   openWith:'[color=red]',   closeWith:'[/color]', className:"col1-3" },
        
        {ldelim}name:'{'blue_help'|@translate}',   openWith:'[color=blue]',   closeWith:'[/color]', className:"col2-1" },
        {ldelim}name:'{'purple_help'|@translate}',   openWith:'[color=purple]',   closeWith:'[/color]', className:"col2-2" },
        {ldelim}name:'{'green_help'|@translate}',   openWith:'[color=green]',   closeWith:'[/color]', className:"col2-3" },
        
        {ldelim}name:'{'white_help'|@translate}',   openWith:'[color=white]',   closeWith:'[/color]', className:"col3-1" },
        {ldelim}name:'{'grey_help'|@translate}',   openWith:'[color=gray]',   closeWith:'[/color]', className:"col3-2" },
        {ldelim}name:'{'black_help'|@translate}',  openWith:'[color=black]',   closeWith:'[/color]', className:"col3-3" }
      ]
    },
    {/if}
  ]
};

jQuery(document).ready(function() {ldelim}
  jQuery('#{$form_name} textarea').markItUp(BBCodeBar);
});
{/footer_script}