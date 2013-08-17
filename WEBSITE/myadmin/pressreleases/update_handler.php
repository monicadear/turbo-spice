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


<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$category=$_POST['category'];$title=$_POST['title'];$text=$_POST['text'];$webslink=$_POST['webslink'];$author=$_POST['author'];$showorder=$_POST['showorder'];
$dateofrelease=$_POST['dateofrelease'];
if ($webslink =="" || $webslink == null) {
$webslink = "";
}
else {
$webslink = ereg_replace("http://", "", $webslink);}

$title = htmlspecialchars("$title", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);$author = htmlspecialchars("$author", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="pressreleases";$sql = "update $tablebase set dateofrelease='$dateofrelease', category='$category', title='$title', text='$text', webslink='$webslink', author='$author', showorder='$showorder' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<BR>Thanks for your update <B>$author</B>."; echo "<BR>$id<BR>\n$date<BR>\n<BR>\n$title<BR>\n$text<BR>\n$author</p>";unset ($date);unset ($title);unset ($text);echo "<p align=center><font size=+2><a href=viewall.php>see all press releases...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>