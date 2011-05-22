{html_head}
{literal}
<style type="text/css">
  form.properties span.property {
    width:60%;
  }
</style>
{/literal}
{/html_head}

<div class="titrePage">
  <h2>BBCode Bar</h2>
</div>

<form method="post" action="" class="properties" ENCTYPE="multipart/form-data"> 
  <fieldset>
    <legend>{'Parameters'|@translate}</legend>
    <ul>
      <li>
        <label><span class="property">{'b_help'|@translate}</span>
        <input type="checkbox" name="b" {$B_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/bold.png"></label>
      </li>
      <li>
        <label><span class="property">{'i_help'|@translate}</span>
        <input type="checkbox" name="i" {$I_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/italic.png"></label>
      </li>
      <li>
        <label><span class="property">{'u_help'|@translate}</span>
        <input type="checkbox" name="u" {$U_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/underline.png"></label>
      </li>      
      <li>
        <label><span class="property">{'s_help'|@translate}</span>
        <input type="checkbox" name="s" {$S_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/stroke.png"></label>
      </li>
      <li>
        <label><span class="property">{'p_help'|@translate}</span>
        <input type="checkbox" name="p" {$P_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/p.png"></label>
      </li>
      <li>
        <label><span class="property">{'center_help'|@translate}</span>
        <input type="checkbox" name="center" {$CENTER_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/center.png"></label>
      </li>
      <li>
        <label><span class="property">{'right_help'|@translate}</span>
        <input type="checkbox" name="right" {$RIGHT_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/right.png"></label>
      </li>
      <li>
        <label><span class="property">{'quote_help'|@translate}</span>
        <input type="checkbox" name="quote" {$QUOTE_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/quote.png"></label>
      </li>
      <li>
        <label><span class="property">{'ul_help'|@translate}</span>
        <input type="checkbox" name="ul" {$UL_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/list-bullet.png"></label>
      </li>
      <li>
        <label><span class="property">{'ol_help'|@translate}</span>
        <input type="checkbox" name="ol" {$OL_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/list-numeric.png"></label>
      </li>
      <li>
        <label><span class="property">{'img_help'|@translate}</span>
        <input type="checkbox" name="img" {$IMG_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/picture.png"></label>
      </li>
      <li>
        <label><span class="property">{'url_help'|@translate}</span>
        <input type="checkbox" name="url" {$URL_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/link.png"></label>
      </li>
      <li>
        <label><span class="property">{'mail_help'|@translate}</span>
        <input type="checkbox" name="email" {$EMAIL_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/mail.png"></label>
      </li>
      <li>
        <label><span class="property">{'size_help'|@translate}</span>
        <input type="checkbox" name="size" {$SIZE_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/fonts.png"></label>
      </li>
      <li>
        <label><span class="property">{'color_help'|@translate}</span>
        <input type="checkbox" name="color" {$COLOR_STATUS} value="1"/> <img src="{$BBCODE_PATH}template/markitup/images/colors.png"></label>
      </li>
    </ul>
  </fieldset>
  
  <p><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit"/></p>
</form>
