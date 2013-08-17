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
<? include ("newsletters_nav.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$title=$_POST['title'];$text=$_POST['text'];$author=$_POST['author'];$showorder=$_POST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);$author = htmlspecialchars("$author", ENT_QUOTES);$date = date("YmdHis");

?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="newsletters";$sql = "update $tablebase set date='$date', title='$title', text='$text',  author='$author', showorder='$showorder' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?>
<?echo "<BR>Thanks for your update <B>$author</B>."; echo "<BR>$id<BR>\n$date<BR>\n<BR>\n$title<BR>\n$text<BR>\n$author</p>";unset ($date);unset ($title);unset ($text);echo "<p align=center><font size=+2><a href=viewall.php>see all newsletters...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>