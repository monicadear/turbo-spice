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
<? include ("pressreleases_nav.php"); ?>





Author's name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>

 <table border=0><tr> <td width="100" align="right"><span class=red>Release Date:</span></td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option>

<? $todayyear=date(Y);
$todayyearminusone=$todayyear-1;
$todayyearminustwo=$todayyear-2;
$todayyearplusone=$todayyear+1;
?>
<option selected>Year</option>
<option><?echo"$todayyearminusone";?></option>
<option SELECTED><?echo"$todayyear";?></option>
Title of Press Release<BR>(e.g. Organization Announcement): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>
Text of press release:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>

Enter the weblink, if any, that this press release will link to:<BR>(e.g. http://www.website.org/mypressrelease.html): <input type='text' name='webslink' value='<?echo"$webslink";?>' size='30'><BR><BR>

<input type='hidden' name='showorder' value='1'>


<input type='submit' name='enter' value='submit'></form><BR>

<? }
?>