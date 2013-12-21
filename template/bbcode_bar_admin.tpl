{html_style}
.miuIcon a {
  display:inline-block;
  width:16px;
  height:16px;
  padding:2px;
  text-decoration:none;
  background-color:rgba(241,241,241,0.9);
  border-radius:2px;
}
{/html_style}

{combine_css path=$BBCODE_PATH|cat:'template/markitup/style.markitup.css'}

<div class="titrePage">
  <h2>BBCode Bar</h2>
</div>

<form method="post" action="" class="properties"> 
  <fieldset>
    <legend>{'Available options'|translate}</legend>
    <ul class="markItUp">
      <li><label>
        <span class="miuIcon miuBold"><a>&nbsp;</a></span>
        <input type="checkbox" name="b" {$B_STATUS} value="1"/>
        {'Bold : [b]bold[/b]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuItalic"><a>&nbsp;</a></span>
        <input type="checkbox" name="i" {$I_STATUS} value="1"/>
        {'Italic : [i]italic[/i]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuUnderline"><a>&nbsp;</a></span>
        <input type="checkbox" name="u" {$U_STATUS} value="1"/>
        {'Underline : [u]underline[/u]'|translate}
      </label></li>      
      <li><label>
        <span class="miuIcon miuStroke"><a>&nbsp;</a></span>
        <input type="checkbox" name="s" {$S_STATUS} value="1"/>
        {'Striped  : [s]striped[/s]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuParagraph"><a>&nbsp;</a></span>
        <input type="checkbox" name="p" {$P_STATUS} value="1"/>
        {'Paragraph : [p]Paragraph[/p]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuCenter"><a>&nbsp;</a></span>
        <input type="checkbox" name="center" {$CENTER_STATUS} value="1"/>
        {'Center : [center]center[/center]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuRight"><a>&nbsp;</a></span>
        <input type="checkbox" name="right" {$RIGHT_STATUS} value="1"/>
        {'Right : [right]right[/right]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuQuote"><a>&nbsp;</a></span>
        <input type="checkbox" name="quote" {$QUOTE_STATUS} value="1"/>
        {'Quote : [quote]quote[/quote]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuListUL"><a>&nbsp;</a></span>
        <input type="checkbox" name="ul" {$UL_STATUS} value="1"/>
        {'Unordered list : [ul][li]element[/li][/ul]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuListOL"><a>&nbsp;</a></span>
        <input type="checkbox" name="ol" {$OL_STATUS} value="1"/>
        {'Ordered list : [ol][li]element[/li][/ol]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuPicture"><a>&nbsp;</a></span>
        <input type="checkbox" name="img" {$IMG_STATUS} value="1"/>
        {'Picture : [img]picture[/img]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuLink"><a>&nbsp;</a></span>
        <input type="checkbox" name="url" {$URL_STATUS} value="1"/>
        {'URL : [url=URL]Title[/url]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuMail"><a>&nbsp;</a></span>
        <input type="checkbox" name="email" {$EMAIL_STATUS} value="1"/>
        {'E-mail : [email]Email[/email]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuSize"><a>&nbsp;</a></span>
        <input type="checkbox" name="size" {$SIZE_STATUS} value="1"/>
        {'Font size : [size=X]text[/size]'|translate}
      </label></li>
      <li><label>
        <span class="miuIcon miuColors"><a>&nbsp;</a></span>
        <input type="checkbox" name="color" {$COLOR_STATUS} value="1"/>
        {'Font color : [color=color]text[/color]'|translate}
      </label></li>
    </ul>
  </fieldset>
  
  <p class="formButtons"><input class="submit" type="submit" value="{'Submit'|translate}" name="submit"/></p>
</form>
