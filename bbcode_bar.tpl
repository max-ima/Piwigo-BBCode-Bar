{known_script id="bbcodebar" src=$ROOT_URL|@cat:"plugins/bbcode_bar/bbcode.js"}

{html_head}
<link rel="stylesheet" type="text/css" href="{$ROOT_URL|@cat:"plugins/bbcode_bar/bbcode_bar.css"}" >
{/html_head}

<div id="outils" width="500pt">
	<table class="outils">	
		<tr>			
			{if isset($BBCode_bar_button_00)}
			<td><img class="bbcbutton" title="{'p_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'p_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="p" src="{$repicon}/p.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_01)}
			<td><img class="bbcbutton" title="{'b_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'b_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="b" src="{$repicon}/b.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_02)}
			<td><img class="bbcbutton" title="{'i_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'i_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="i" src="{$repicon}/i.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_03)}
			<td><img class="bbcbutton" title="{'u_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'u_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="u" src="{$repicon}/u.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_04)}
			<td><img class="bbcbutton" title="{'s_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'s_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="s" src="{$repicon}/s.png" border="0"></td>
			{/if}
			<td> &nbsp; &nbsp; </td>
			{if isset($BBCode_bar_button_05)}
			<td><img class="bbcbutton" title="{'center_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'center_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="center" src="{$repicon}/center.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_06)}
			<td><img class="bbcbutton" title="{'right_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'right_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="right" src="{$repicon}/right.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_07)}
			<td><img class="bbcbutton" title="{'ul_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'ul_help'|@translate}')" onclick="BBClist('addComment','content',this)" name="ul" src="{$repicon}/ul.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_08)}
			<td><img class="bbcbutton" title="{'ol_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'ol_help'|@translate}')" onclick="BBClist('addComment','content',this)" name="ol" src="{$repicon}/ol.png" border="0"></td>
			{/if}
			<td> &nbsp; &nbsp; </td>
			{if isset($BBCode_bar_SmiliesSupport)}
			<td>{$BBCode_bar_SmiliesSupport.SMILIESSUPPORT_PAGE}</td>
			<td> &nbsp; &nbsp; </td>
			{/if}
			{if isset($BBCode_bar_button_09)}	
			<td><img class="bbcbutton" title="{'quote_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'quote_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="quote" src="{$repicon}/quote.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_10)}
			<td><img class="bbcbutton" title="{'img_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'img_help'|@translate}')" onclick="BBCcode('addComment','content',this)" name="img" src="{$repicon}/image.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_11)}
			<td><img class="bbcbutton" title="{'url_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'url_help'|@translate}')" onclick="BBCurl('addComment','content')" name="url" src="{$repicon}/link.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_12)}
			<td><img class="bbcbutton" title="{'mail_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'mail_help'|@translate}')" onclick="BBCwmi('addComment','content','email')" name="email" src="{$repicon}/mail.png" border="0"></td>
			{/if}
			<td> &nbsp; &nbsp; </td>
			{if isset($BBCode_bar_button_13)}
			<td><select title="{'size_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'size_help'|@translate}')" onchange="BBCfs('addComment','content',this)" title="{'size_help'|@translate}">
				    <option class="genmed" value="{'tiny'|@translate}">{'tiny'|@translate}</option>
					<option class="genmed" value="{'small'|@translate}">{'small'|@translate}</option>
					<option class="genmed" value="{'normal'|@translate}" selected="selected" >{'normal'|@translate}</option>
					<option class="genmed" value="{'large'|@translate}">{'large'|@translate}</option>
					<option class="genmed" value="{'huge'|@translate}">{'huge'|@translate}</option>
				</select>
			</td>
			{/if}
			{if isset($BBCode_bar_button_14)}
			<td><select title="{'fc_help'|@translate}" onmouseout="helpline('addComment','helpbox', '{'help'|@translate}')" onmouseover="helpline('addComment','helpbox', '{'fc_help'|@translate}')" onchange="BBCfc('addComment','content',this)" title="{'fc_help'|@translate}">
				    <option class="genmed" value="" style="color: black; background-color: rgb(250, 250, 250);" selected="selected" >{'default_help'|@translate}</option>
					<option class="genmed" value="maroon" style="color: maroon; background-color: rgb(250, 250, 250);">{'maroon_help'|@translate}</option>
					<option class="genmed" value="red" style="color: red; background-color: rgb(250, 250, 250);">{'red_help'|@translate}</option>
					<option class="genmed" value="orange" style="color: orange; background-color: rgb(250, 250, 250);">{'orange_help'|@translate}</option>
					<option class="genmed" value="brown" style="color: brown; background-color: rgb(250, 250, 250);">{'brown_help'|@translate}</option>
					<option class="genmed" value="yellow" style="color: yellow; background-color: rgb(250, 250, 250);">{'yellow_help'|@translate}</option>
					<option class="genmed" value="green" style="color: green; background-color: rgb(250, 250, 250);">{'green_help'|@translate}</option>
					<option class="genmed" value="olive" style="color: olive; background-color: rgb(250, 250, 250);">{'olive_help'|@translate}</option>
					<option class="genmed" value="cyan" style="color: cyan; background-color: rgb(250, 250, 250);">{'cyan_help'|@translate}</option>
					<option class="genmed" value="blue" style="color: blue; background-color: rgb(250, 250, 250);">{'blue_help'|@translate}</option>
					<option class="genmed" value="darkblue" style="color: darkblue; background-color: rgb(250, 250, 250);">{'darkblue_help'|@translate}</option>
					<option class="genmed" value="indigo" style="color: indigo; background-color: rgb(250, 250, 250);">{'indigo_help'|@translate}</option>
					<option class="genmed" value="violet" style="color: violet; background-color: rgb(250, 250, 250);">{'violet_help'|@translate}</option>
					<option class="genmed" value="white" style="color: white; background-color: rgb(250, 250, 250);">{'default_help'|@translate}</option>
					<option class="genmed" value="black" style="color: black; background-color: rgb(250, 250, 250);">{'white_help'|@translate}</option>
				</select>
			</td>			
			{/if}
		</tr>
	</table>
	{if isset($BBCode_bar_button_15)}
	<input class="helpline" type="text" value="{'help'|@translate}" maxlength="150" size="80" name="helpbox"/>
	{/if}
</div>
