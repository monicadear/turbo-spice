<SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[1].titleannounce,"Please enter the title for this announcement."); // Check to make sure required information exists.           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].description,"Please enter the description.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[1].author,"Please enter the contact.");            return CanSubmit;                     }--> </SCRIPT><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><?


?>

<?
if ($session->userlevel>="2"){?>

<div id=indent3>
<table><?phpecho "<FORM method=post name=myannouncement action=/members/memberphp_handlerannouncement.php ONSUBMIT='return ValidateData()';>";?><?$year=date(Y); $titleannounce="$year Announcement";?>
<tr><th>Title<span class=red>*</span>:</th><td><input type ="text" name="titleannounce" rows="1" value="<?php echo $titleannounce ?>" size="40"></td></tr>

<tr><th valign=top>Description<span class=red>*</span>:</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=40>    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>



<tr><th>Submitted by<span class=red>*</span>:</th><td><input type ="text" name="author" rows="1" value="<?php echo $author ?>" size="30"></td></tr>



<tr><td></td><td><input type="checkbox" value="1" name="evt_type" checked onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> Only members may view this.</td></tr>


<tr><th>Tags:</th><td>
<input type ="text" name="tags" size="40" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>


<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table>

<?
}
else {
echo "You must be logged in to add a listing.<BR>\n";
}
?>
</div>