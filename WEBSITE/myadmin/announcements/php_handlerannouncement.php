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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$title=$_POST['title'];$description=$_POST['description'];$url=$_POST['url'];$author=$_POST['author'];$publish=$_POST['publish'];$evt_type=$_POST['evt_type'];$tags=$_POST['tags'];$title = htmlspecialchars("$title", ENT_QUOTES);$description = ereg_replace("\r\n\r\n", "\n<BR><BR>", $description);$description = ereg_replace("\r\n", "\n<BR>", $description);$description = htmlspecialchars("$description", ENT_QUOTES);$date = date("Ymdhis");

$author = htmlspecialchars("$author", ENT_QUOTES);$url = ereg_replace("http://", "", $url);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into announcements values ('','$date','$title','$description','$url','0','$author','','$publish','$evt_type','$tags')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); }?><?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";echo "<a href=viewallannouncements.php>click to view all announcements</a><BR>";echo "<a href=input_newannouncement.php>input new announcement</a>";echo "</div>";unset ($title);unset ($titleshow);unset ($description);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>