<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
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
<? include ("inthenews_nav.php"); ?>


<input type=hidden name="category" value=1>


Submitter's name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>

 <table border=0><tr> <td width="100" align="right"><span class=red>Release Date:</span></td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option>

<? $todayyear=date(Y);
$todayyearplusone=$todayyear+1;
?>
<option selected>Year</option>
Title of Link<BR>(e.g. Organization Receives Award): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>

Source (e.g. New York Times): <input type='text' name='source' value='<?echo"$source";?>' size='35'><BR><BR>


Text of news item (keep a copy of the article text in case the original link goes down)<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>

Enter the weblink, if any, that this news link will go to:<BR>(e.g. http://www.nytimes.com): <input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR><BR>

<input type='hidden' name='showorder' value='1'>


<input type='submit' name='enter' value='submit'></form><BR>

<? }
?>