<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?><? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?><h1>Admin: Input PRODUCT item</h1><p><B>You may input a product for the mini-store within the site.</B></p><SCRIPT LANGUAGE="JavaScript" type="text/javascript"><!--      /****************************************************************/ function ValidateData() {var CanSubmit = false;// Check to make sure that the form fields are not empty.CanSubmit = ForceEntry(document.forms[0].titleshow,"Please enter the title for the navigation."); // Check to make sure required information exists.           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].title,"Please enter the title for the page.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].text,"Please enter the text.");           if (CanSubmit) CanSubmit = ForceEntry(document.forms[0].author,"Please enter your name.");            return CanSubmit;                     }--> </SCRIPT><form enctype='multipart/form-data' method='post'  action='php_handler.php' ONSUBMIT='return ValidateData()';>

Your name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>


Title of item<BR>(e.g. Beautiful Mug): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>

More for Title/Medium<BR>(e.g. ceramic and steel): <input type='text' name='title2' value='<?echo"$title2";?>' size='18'><BR><BR>

Creator of Piece<BR>(e.g. Jane Garcia): <input type='text' name='creator' value='<?echo"$creator";?>' size='18'><BR><BR>


Text description of item:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>

More info:<BR><textarea name='moreinfo' rows=5 cols=20><?echo"$moreinfo";?></textarea><BR>for example, dimensions, or more descriptive text<BR><BR>

<b>Price:</b><span class=red>*</span> $<input type='text' name='price' value='<?echo"$price";?>' size='10'>USD<BR><BR>

Enter the weblink, if any, that the image will link to:<BR>(e.g. http://www.website.org/mypressrelease.html): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'> (NOTE that this link will override generic settings. You may use a PayPal created hosted button link in this box.)<BR><BR>

<input type='submit' name='enter' value='submit'></form><BR><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>