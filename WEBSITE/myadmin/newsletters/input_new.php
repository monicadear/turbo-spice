<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?>

Input the title and description of a new newsletter.

<BR>

<FORM method=post action=php_handler.php>
Title of Newsletter: e.g. Spring <? $yeartoday=date(Y); echo "$yeartoday";?> <input type=text name=title value='<?echo"$title";?>' size=25><BR>
Description: <input type=text name=text value='<?echo"$text";?>' size=25><BR>
Author: <? echo $session->username; ?><input type ="hidden" name="author" value="<? echo $session->username; ?>" size="30"><BR>
<input type="submit" name="submit_enter" value="submit"> 




</FORM>


<!--  -------------------------    -->
<!--  -------------------------    -->
<!--  -------------------------    -->






<? include ("../adminfooter.php"); ?>

<? }
?>