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
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?>


<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$enter=$_POST['enter'];if ($enter) {/*Insert into database */$category=$_REQUEST['category'];

$startmonth=$_REQUEST['startmonth'];
$startday=$_REQUEST['startday'];
$startyear=$_REQUEST['startyear'];


$title=$_REQUEST['title'];$text=$_REQUEST['text'];$author=$_REQUEST['author'];$webslink=$_REQUEST['webslink'];$showorder=$_REQUEST['showorder'];if ($webslink =="" || $webslink == null) {
$webslink = "";
}
else {
$webslink = ereg_replace("http://", "", $webslink);}
$title = htmlspecialchars("$title", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$datecreated = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);

$dateofrelease=$startyear."".$startmonth."".$startday."090000"
?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into pressreleases values ('','$datecreated', '$dateofrelease','$category','$title','$text','','$webslink','$author','$showorder')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";echo "<a href=viewall.php>click to view all page content</a><BR>";echo "<a href=input_new.php>input new page</a>";

echo "</div>";unset ($title);unset ($titleshow);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>