<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?><SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title for this announcement."); // Check to make sure required information exists.           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].description,"Please enter the description.");            return CanSubmit;                     }--> </SCRIPT><h1>Admin: Announcement Content Input New</h1><p><B>These are the main announcements within the site. Enter a new announcement here.</B></p><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><table><?phpecho "<FORM method=post action=php_handlerannouncement.php ONSUBMIT='return ValidateData()';>";?><tr><td><b>Title:</b></td><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="50"></td></tr>

<tr><th valign=top>Description:</th><td><span class=smalladmintext>Use these buttons to format text:</span>	<script type='text/javascript' src='/js/quicktags.js'></script>
	<script type="text/javascript">edToolbar()</script>
	<script type='text/javascript' src='/js/quicktagssecond.js'></script>

<textarea name='description' id='description' rows=5 cols=60>    <?echo "$description";?></textarea>


		<script type="text/javascript">
		//<!--
		edCanvas = document.getElementById('description');
		//-->
		</script>


</td></tr>


<tr><td><b>WEB LINK URL, if any:</b></td><td><input type ="text" name="url" rows="1" value="<?php echo $url ?>" size="50"> e.g. http://www.homepage.com</td></tr>


<tr><td><b>Submitted by:</b></td><td><? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"></td></tr>



<tr><td></td><td><input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> Check to publish this announcement to the live website.</td></tr>




<tr><td></td><td><input type="checkbox" value="1" name="evt_type" onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> Check to include this announcement for logged-in members ONLY.</td></tr>

<tr><td>Tags:</td><td>
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>



<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><!-- -------------- -->
<? include ("../adminfooter.php"); ?>

<? }
 ?>