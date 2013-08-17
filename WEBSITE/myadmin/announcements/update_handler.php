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

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$title=$_POST['title'];$description=$_POST['description'];$url=$_POST['url'];$publish=$_POST['publish'];$evt_type=$_POST['evt_type'];$tags=$_POST['tags'];$title = htmlspecialchars("$title", ENT_QUOTES);$description = htmlspecialchars("$description", ENT_QUOTES);$description = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $description);$description = ereg_replace("\r\n", "&lt;BR&gt;\n", $description);



$author = htmlspecialchars("$author", ENT_QUOTES);
$date = date("YmdHis");


$url = ereg_replace("http://", "", $url);

?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="announcements";$sql = "update $tablebase set date='$date', title='$title', description='$description', url='$url', author='$author', publish='$publish', evt_type='$evt_type', tags='$tags' 		  where id='$id'";


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   }?><?echo "<BR>Thanks for your update <B>$author</B>.<BR>";echo "<p align=center><font size=+2><a href=viewallannouncements.php>see all announcements...</a></p>";unset ($date);unset ($title);unset ($description);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>