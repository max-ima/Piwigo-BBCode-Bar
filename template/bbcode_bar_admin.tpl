{combine_css path=$BBCODE_PATH|@cat:"template/bbcode_bar.css"}

<div class="titrePage">
	<h2>BBCode Bar</h2>
</div>

<form method="post" action="" class="properties" ENCTYPE="multipart/form-data"> 
	<fieldset>
		<legend>{'Parameters'|@translate}</legend>
		<ul>
			<li>
				<span class="property">{'p_help'|@translate}</span>
				<input type="checkbox" name="chkb00" {$CHKB00_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/p.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/p1.png" border="0">
			</li>
			<li>
				<span class="property">{'b_help'|@translate}</span>
				<input type="checkbox" name="chkb01" {$CHKB01_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/b.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/b1.png" border="0">
			</li>
			<li>
				<span class="property">{'i_help'|@translate}</span>
				<input type="checkbox" name="chkb02" {$CHKB02_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/i.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/i1.png" border="0">
			</li>
			<li>
				<span class="property">{'u_help'|@translate}</span>
				<input type="checkbox" name="chkb03" {$CHKB03_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/u.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/u1.png" border="0">
			</li>			
			<li>
				<span class="property">{'s_help'|@translate}</span>
				<input type="checkbox" name="chkb04" {$CHKB04_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/s.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/s1.png" border="0">
			</li>
			<li>
				<span class="property">{'center_help'|@translate}</span>
				<input type="checkbox" name="chkb05" {$CHKB05_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/center.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/center1.png" border="0">
			</li>
			<li>
				<span class="property">{'right_help'|@translate}</span>
				<input type="checkbox" name="chkb06" {$CHKB06_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/right.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/right1.png" border="0">
			</li>
			<li>
				<span class="property">{'ul_help'|@translate}</span>
				<input type="checkbox" name="chkb07" {$CHKB07_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/ul.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/ul1.png" border="0">
			</li>
			<li>
				<span class="property">{'ol_help'|@translate}</span>
				<input type="checkbox" name="chkb08" {$CHKB08_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/ol.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/ol1.png" border="0">
			</li>
			<li>
				<span class="property">{'quote_help'|@translate}</span>
				<input type="checkbox" name="chkb09" {$CHKB09_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/quote.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/quote1.png" border="0">
			</li>
			<li>
				<span class="property">{'img_help'|@translate}</span>
				<input type="checkbox" name="chkb10" {$CHKB10_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/image.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/image1.png" border="0">
			</li>
			<li>
				<span class="property">{'url_help'|@translate}</span>
				<input type="checkbox" name="chkb11" {$CHKB11_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/link.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/link1.png" border="0">
			</li>
			<li>
				<span class="property">{'mail_help'|@translate}</span>
				<input type="checkbox" name="chkb12" {$CHKB12_STATUS} value="1" /> <img src="{$TEXT17_STATUS}/mail.png" border="0"> &nbsp; <img src="{$TEXT17_STATUS}/mail1.png" border="0">
			</li>
			<li>
				<span class="property">{'size_help'|@translate}</span>
				<input type="checkbox" name="chkb13" {$CHKB13_STATUS} value="1" />
			</li>
			<li>
				<span class="property">{'fc_help'|@translate}</span>
				<input type="checkbox" name="chkb14" {$CHKB14_STATUS} value="1" />
			</li>     
			<li>
				<span class="property">{'help'|@translate}</span>
				<input type="checkbox" name="chkb15" {$CHKB15_STATUS} value="1" />
			</li> 
			<li>
				<span class="property">{'repicon'|@translate}</span>
				<input type="text" size="40" name="text17" value="{$TEXT17_STATUS}" />
			</li>
		</ul>
	</fieldset>
	
	<p><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" /></p>
</form>
