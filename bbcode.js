var bbcode = new Array();
var theSelection = false;

function BBCfs(form, field, box) { 
	BBCwrite(form, field, "[size="+ box.value +"]", "[/size]", true); 
	box.selectedIndex = 2;
}
function BBCfc(form, field, box) { 
	BBCfont(form, field, "color", box); 
	box.selectedIndex = 0;
}

function BBCfont(form, field, code, box) { 
	BBCwrite(form, field, "["+code+"="+box.value+"]", "[/"+code+"]", true); 
}

function BBCwmi(form, field, type) {
	if (type == 'img') { var URL = prompt("Please enter image URL","http://"); }
	else { var URL = prompt("Enter the Email Address",""); }
	if (URL == null) { return; }
	if (!URL) { return alert("Error : You didn't write the Address"); }
	BBCwrite(form, field, '', "["+type+"]"+URL+"[/"+type+"]", true);
}

function BBCcode(form, field, img) {
	var code = img.name;
	if (BBCwrite(form, field, "["+code+"]", "[/"+code+"]")) { return; }
	if (bbcode[form+field+code] == null) {
		ToAdd = "["+code+"]";
		re = new RegExp(code+".(\\w+)$");
		img.src = img.src.replace(re, code+"1.$1");
		bbcode[form+field+code] = 1;
	} else {
		ToAdd = "[/"+code+"]";
		re = new RegExp(code+"1.(\\w+)$");
		img.src = img.src.replace(re, code+".$1");
		bbcode[form+field+code] = null;
	}
	BBCwrite(form, field, '', ToAdd, true);
}

function BBClist(form, field, img) {
	var code = img.name;
	if (BBCwrite(form, field, "["+code+"]\n[li]", "\n[/"+code+"]")) { return; }
	if (bbcode[form+field+code] == null) {
		ToAdd = "["+code+"]\n[li]";
		re = new RegExp(code+".(\\w+)$");
		img.src = img.src.replace(re, code+"1.$1");
		bbcode[form+field+code] = 1;
	} else {
		ToAdd = "[/li]\n[/"+code+"]\n";
		re = new RegExp(code+"1.(\\w+)$");
		img.src = img.src.replace(re, code+".$1");
		bbcode[form+field+code] = null;
	}
	BBCwrite(form, field, '', ToAdd, true);
}

function BBCurl(form, field) {
	var URL = prompt("Enter the URL", "http://");
	if (URL == null) { return; }
	if (!URL) { return alert("Error: You didn't write the URL "); }
	if (BBCwrite(form, field, "[url="+URL+"]", "[/url]")) { return; }
	var TITLE = prompt("Enter the page name", "Web Page Name");
	if (TITLE == null) { return; }
	var Add = "]"+URL;
	if (TITLE) { Add = "="+URL+"]"+TITLE; }
	BBCwrite(form, field, '', "[url"+Add+"[/url]", true);
}

function BBCwrite(form, field, start, end, force) {
	var textarea = document.forms[form].elements[field];
	
	storeCaret(textarea);
	
	if (textarea.caretPos) {
	  textarea.focus();
		// Attempt to create a text range (IE).
		theSelection = document.selection.createRange().text;
		if (force || theSelection != '') {
			document.selection.createRange().text = start + theSelection + end;
			textarea.focus();
			return true;
		}
	} else if (typeof(textarea.selectionStart) != "undefined") {
		// Mozilla text range replace.
		var text = new Array();
		text[0] = textarea.value.substr(0, textarea.selectionStart);
		text[1] = textarea.value.substr(textarea.selectionStart, textarea.selectionEnd-textarea.selectionStart);
		text[2] = textarea.value.substr(textarea.selectionEnd);
		caretPos = textarea.selectionEnd+start.length+end.length;
		if (force || text[1] != '') {
			textarea.value = text[0]+start+text[1]+end+text[2];
			if (textarea.setSelectionRange) {
				textarea.focus();
				textarea.setSelectionRange(caretPos, caretPos);
			}
			return true;
		}
	} else if (force) {		
		// Just put it on the end.
		textarea.value += start+end;
		textarea.focus(textarea.value.length-1);
		return true;
	}
	return false;
}

function storeCaret(text) {
	if (text.createTextRange) text.caretPos = document.selection.createRange().duplicate();
}

function helpline ( form, field, text ) {
  if ( typeof(document.forms[form].elements[field]) != "undefined") {
	  document.forms[form].elements[field].value = text;
  }
}
