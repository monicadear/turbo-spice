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
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("faqs_nav.php"); ?>





Author's name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>



Question to ask<BR>(e.g. What are the benefits of joining?): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>
Answer:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>
Enter the weblink, if any, that this faq will link to:<BR>(e.g. http://www.website.org/myfaq.html): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR><BR>

Display order: <input type='text' name='showorder' value='<?echo"$showorder";?>' size='18'> (1 shows higher than 99)<BR><BR>


<input type='submit' name='enter' value='submit'></form><BR>

<? }
?>