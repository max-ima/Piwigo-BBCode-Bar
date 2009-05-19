{html_head}
<link rel="stylesheet" type="text/css" href="{$ROOT_URL|@cat:"plugins/bbcode_bar/bbcode_bar.css"}" >
{/html_head}

<div class="titrePage">
	<h2>BBCode Bar</h2>
</div>
<form method="post" action="" class="properties"  ENCTYPE="multipart/form-data"> 
<div align="center">
	<fieldset>
      <legend>{'admin_liste'|@translate}</legend>	  
	  <UL>
		<LI><input type="checkbox" name="chkb00" {$CHKB00_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/p.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/p1.png" border="0"> &nbsp; {'p_help'|@translate}</LI>
	    <LI><input type="checkbox" name="chkb01" {$CHKB01_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/b.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/b1.png" border="0"> &nbsp; {'b_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb02" {$CHKB02_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/i.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/i1.png" border="0"> &nbsp; {'i_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb03" {$CHKB03_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/u.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/u1.png" border="0"> &nbsp; {'u_help'|@translate}</LI>			
		<LI><input type="checkbox" name="chkb04" {$CHKB04_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/s.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/s1.png" border="0"> &nbsp; {'s_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb05" {$CHKB05_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/center.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/center1.png" border="0"> &nbsp; {'center_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb06" {$CHKB06_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/right.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/right1.png" border="0"> &nbsp; {'right_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb07" {$CHKB07_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/ul.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/ul1.png" border="0"> &nbsp; {'ul_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb08" {$CHKB08_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/ol.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/ol1.png" border="0"> &nbsp; {'ol_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb09" {$CHKB09_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/quote.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/quote1.png" border="0"> &nbsp; {'quote_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb10" {$CHKB10_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/image.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/image1.png" border="0"> &nbsp; {'img_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb11" {$CHKB11_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/link.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/link1.png" border="0"> &nbsp; {'url_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb12" {$CHKB12_STATUS} value="1" /> <img src="plugins/bbcode_bar/icon/mail.png" border="0"> &nbsp; <img src="plugins/bbcode_bar/icon/mail1.png" border="0"> &nbsp; {'mail_help'|@translate}</LI>   
		<LI><input type="checkbox" name="chkb13" {$CHKB13_STATUS} value="1" /> &nbsp; {'size_help'|@translate}</LI>
		<LI><input type="checkbox" name="chkb14" {$CHKB14_STATUS} value="1" /> &nbsp; {'fc_help'|@translate}</LI>     
		<LI><input type="checkbox" name="chkb15" {$CHKB15_STATUS} value="1" /> &nbsp; {'help'|@translate}</LI> 
		<!--<LI><input type="checkbox" name="chkb16" {$CHKB16_STATUS} value="1" /> &nbsp; {'preview'|@translate}</LI>-->
		<LI>{'repicon'|@translate} : <input type="text" size="40" name="text17" value="{$TEXT17_STATUS}" /> </LI>
	  </UL>
	</fieldset>
	<input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" />
</div>
</form>
