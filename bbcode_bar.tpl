{combine_script id="bbcodebar" path=$ROOT_URL|@cat:"plugins/bbcode_bar/bbcode.js"}
{combine_css path=$ROOT_URL|@cat:"plugins/bbcode_bar/bbcode_bar.css"}

<div id="outils" width="500pt">
	<table class="outils">	
		<tr>			
			{if isset($BBCode_bar_button_00)}
			<td><img class="bbcbutton" title="{'p_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'p_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="p" src="{$repicon}/p.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_01)}
			<td><img class="bbcbutton" title="{'b_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'b_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="b" src="{$repicon}/b.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_02)}
			<td><img class="bbcbutton" title="{'i_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'i_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="i" src="{$repicon}/i.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_03)}
			<td><img class="bbcbutton" title="{'u_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'u_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="u" src="{$repicon}/u.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_04)}
			<td><img class="bbcbutton" title="{'s_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'s_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="s" src="{$repicon}/s.png" border="0"></td>
			{/if}
			
			{if isset($BBCode_bar_button_05) OR isset($BBCode_bar_button_06) OR isset($BBCode_bar_button_07) OR isset($BBCode_bar_button_08)}
			<td> &nbsp; &nbsp; </td>
			{/if}
			
			{if isset($BBCode_bar_button_05)}
			<td><img class="bbcbutton" title="{'center_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'center_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="center" src="{$repicon}/center.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_06)}
			<td><img class="bbcbutton" title="{'right_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'right_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="right" src="{$repicon}/right.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_07)}
			<td><img class="bbcbutton" title="{'ul_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'ul_help'|@translate}')" onclick="BBClist('{$form_name}','content',this)" name="ul" src="{$repicon}/ul.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_08)}
			<td><img class="bbcbutton" title="{'ol_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'ol_help'|@translate}')" onclick="BBClist('{$form_name}','content',this)" name="ol" src="{$repicon}/ol.png" border="0"></td>
			{/if}
			
			{if isset($BBCode_bar_SmiliesSupport)}
			<td> &nbsp; &nbsp; </td>
			<td>{$BBCode_bar_SmiliesSupport.SMILIESSUPPORT_PAGE}</td>
			{/if}
			
			{if isset($BBCode_bar_button_09) OR isset($BBCode_bar_button_10) OR isset($BBCode_bar_button_11) OR isset($BBCode_bar_button_12)}
			<td> &nbsp; &nbsp; </td>
			{/if}
			
			{if isset($BBCode_bar_button_09)}	
			<td><img class="bbcbutton" title="{'quote_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'quote_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="quote" src="{$repicon}/quote.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_10)}
			<td><img class="bbcbutton" title="{'img_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'img_help'|@translate}')" onclick="BBCcode('{$form_name}','content',this)" name="img" src="{$repicon}/image.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_11)}
			<td><img class="bbcbutton" title="{'url_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'url_help'|@translate}')" onclick="BBCurl('{$form_name}','content')" name="url" src="{$repicon}/link.png" border="0"></td>
			{/if}
			{if isset($BBCode_bar_button_12)}
			<td><img class="bbcbutton" title="{'mail_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'mail_help'|@translate}')" onclick="BBCwmi('{$form_name}','content','email')" name="email" src="{$repicon}/mail.png" border="0"></td>
			{/if}
			
			{if isset($BBCode_bar_button_13) OR isset($BBCode_bar_button_14)}
			<td> &nbsp; &nbsp; </td>
			{/if}
			
			{if isset($BBCode_bar_button_13)}
			<td><select title="{'size_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'size_help'|@translate}')" onchange="BBCfs('{$form_name}','content',this)" title="{'size_help'|@translate}">
				    <option class="genmed" value="7">{'tiny'|@translate}</option>
					<option class="genmed" value="9">{'small'|@translate}</option>
					<option class="genmed" value="12" selected="selected" >{'normal'|@translate}</option>
					<option class="genmed" value="18">{'large'|@translate}</option>
					<option class="genmed" value="24">{'huge'|@translate}</option>
				</select>
			</td>
			{/if}
			{if isset($BBCode_bar_button_14)}
			<td><select title="{'fc_help'|@translate}" onmouseout="helpline('{$form_name}','helpbox', '{'help'|@translate}')" onmouseover="helpline('{$form_name}','helpbox', '{'fc_help'|@translate}')" onchange="BBCfc('{$form_name}','content',this)" title="{'fc_help'|@translate}">
				    <option class="genmed" value="" style="color: black;" selected="selected" >{'default_help'|@translate}</option>
					<option class="genmed" value="maroon" style="color: maroon;">{'maroon_help'|@translate}</option>
					<option class="genmed" value="red" style="color: red;">{'red_help'|@translate}</option>
					<option class="genmed" value="orange" style="color: orange;">{'orange_help'|@translate}</option>
					<option class="genmed" value="brown" style="color: brown;">{'brown_help'|@translate}</option>
					<option class="genmed" value="yellow" style="color: yellow; background-color:inherit;">{'yellow_help'|@translate}</option>
					<option class="genmed" value="green" style="color: green;">{'green_help'|@translate}</option>
					<option class="genmed" value="olive" style="color: olive;">{'olive_help'|@translate}</option>
					<option class="genmed" value="cyan" style="color: cyan;">{'cyan_help'|@translate}</option>
					<option class="genmed" value="blue" style="color: blue;">{'blue_help'|@translate}</option>
					<option class="genmed" value="darkblue" style="color: darkblue;">{'darkblue_help'|@translate}</option>
					<option class="genmed" value="indigo" style="color: indigo;">{'indigo_help'|@translate}</option>
					<option class="genmed" value="violet" style="color: violet;">{'violet_help'|@translate}</option>
					<option class="genmed" value="white" style="color: white; background-color:inherit;">{'white_help'|@translate}</option>
					<option class="genmed" value="black" style="color: black;">{'black_help'|@translate}</option>
				</select>
			</td>			
			{/if}
		</tr>
	</table>
	{if isset($BBCode_bar_button_15)}
	<input class="helpline" type="text" value="{'help'|@translate}" maxlength="150" size="80" name="helpbox"/>
	{/if}
</div>
