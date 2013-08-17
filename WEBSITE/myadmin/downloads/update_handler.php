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
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$category=$_POST['category'];$subcategory=$_POST['subcategory'];$title=$_POST['title'];$text=$_POST['text'];$url=$_POST['url'];$publish=$_POST['publish'];$evt_type=$_POST['evt_type'];$tags=$_POST['tags'];
$title = htmlspecialchars("$title", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);$author = htmlspecialchars("$author", ENT_QUOTES);$date = date("YmdHis");

$transweb["http://"] = "";$url = strtr($url, $transweb);
?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="downloads";$sql = "update $tablebase set category='$category', subcategory='$subcategory', title='$title', text='$text', dateupdated='$date', publish='$publish', evt_type='$evt_type', tags='$tags' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?>
<?echo "<BR>Thanks for your update <B>$author</B>."; echo "<BR>$id<BR>\n$date<BR>\n<BR>\n$title<BR>\n$text<BR>\n$author</p>";unset ($date);unset ($title);unset ($text);echo "<p align=center><font size=+2><a href=viewall.php>see all pages...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>