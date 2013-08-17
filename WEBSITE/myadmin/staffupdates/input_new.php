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
<? include ("../adminheader.php"); ?>
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http:/ggg/developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title.");            return CanSubmit;                     }--> </SCRIPT><h1>ADMINISTRATION: Page Content Input New</h1><p><B>These are the main pages within the site. Enter a new page here.</B></p><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><?phpecho "<FORM method=post action=php_handler.php ONSUBMIT='return ValidateData()';>";?><table width=100% border=0><tr><th width=25%><b>First Name:</b></th><td><input type ="text" name="firstname" value="<?php echo $firstname ?>" size="50"></td></tr><tr><th width=25%><b>Last Name:</b></th><td><input type ="text" name="lastname" value="<?php echo $lastname ?>" size="50"></td></tr><tr><th width=25%><b>Title or position:</b></th><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="50"></td></tr><tr><th valign=top><b>Text (what this staff person handles)</b></th><td><textarea name="text" rows="9" cols="30"><?php echo $text ?></textarea></td></tr><tr><th><b>Email:</b></th><td><input type ="text" name="email" rows="1" value="<?php echo $email ?>" size="30"></td></tr><tr><th><b>Display order:</b></th><td><input type ="text" name="showorder" value="<?php echo $showorder ?>" size="30"> (1 displays higher than 99)</td></tr><tr><th><b>category:</b></th><td><select name="stackorder"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="staffcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}?></select> <a href=../staffcategories/viewall.php target=new>update staff categories</a></td></tr>
<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><!-- -------------- --><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>