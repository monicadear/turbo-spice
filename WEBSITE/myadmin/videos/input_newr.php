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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("videocontent_nav.php"); ?><SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--/* The isEmpty and isWhitespace functions were taken straight from Netscape's JavaScript development site, http://developer.netscape.com.*/// whitespace charactersvar whitespace = " \t\n\r";/****************************************************************/// Check whether string s is empty.function isEmpty(s){ return ((s == null) || (s.length == 0)) }/****************************************************************/function isWhitespace (s){var i;// Is s empty?if (isEmpty(s)) return true;// Search through string's characters one by one// until we find a non-whitespace character.// When we do, return false; if we don't, return true.for (i = 0; i < s.length; i++){     // Check that current character isn't whitespace.     var c = s.charAt(i);     if (whitespace.indexOf(c) == -1) return false;}// All characters are whitespace.return true;                                  }                               /****************************************************************/function ForceEntry(val, str) {var strInput = new String(val.value);if (isWhitespace(strInput)) {     alert(str);     return false;} else     return true;                                  }      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title."); // Check to make sure required information exists.            return CanSubmit;                     }--> </SCRIPT><h1>Admin: Video Content Input New</h1><p><B>These are the main videos within the site. Enter a new video here.</B></p><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><table><?phpecho "<FORM method=post action=php_handlerr.php ONSUBMIT='return ValidateData()';>";?><tr><td><b>category:</b></td><td><select name="category"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="videocategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}?></select> <a href=../linkcategories/viewall.php target=new>update link categories</a></td></tr><tr><td colspan=2><input type=hidden name=subcategory value=1></td></tr><tr><td><b>title:*</b></td><td><input type ="text" name="title" rows="1" value="<?php echo $title ?>" size="50"></td></tr><tr><td><b>description:</b></td><td><textarea name="text" rows="4" cols="30"><?php echo $text ?></textarea></td></tr><tr><td><b>video link:</b></td><td><input type ="text" name="weblink" rows="1" value="<?php echo $weblink ?>" size="30"> (e.g. http://www.youtube.com/watch?v=Ep-wzoQtn4I) just add the link to the actual file</td></tr><tr><td><b>author:</b></td><td><? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"></td></tr><tr><td><b>order:</b></td><td><? $showorder="1";?><input type ="text" name="showorder" rows="1" value="<?php echo $showorder ?>" size="10">(1 shows higher than 100)</td></tr><tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> (press only once)</FORM> </td></tr></table><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
?>