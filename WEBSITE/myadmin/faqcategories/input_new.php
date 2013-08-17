<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->isAdmin()){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("faqcategorycontent_nav.php"); ?><SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[0].categoryname,"Please enter the title for this category.");            return CanSubmit;                     }--> </SCRIPT><h1>Admin: FAQ Category Input New</h1><p><B>These are the main FAQ categories within the site. Enter a new FAQ category here.</B></p><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><table><?phpecho "<FORM method=post action=php_handler.php ONSUBMIT='return ValidateData()';>";?>

<tr><td><b>category title:</b></td><td><input type ="text" name="categoryname" rows="1" value="<?php echo $categoryname ?>" size="50"></td></tr><tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
?>