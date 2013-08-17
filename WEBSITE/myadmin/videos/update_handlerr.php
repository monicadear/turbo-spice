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
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("videocontent_nav.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$category=$_POST['category'];$subcategory=$_POST['subcategory'];$title=$_POST['title'];$text=$_POST['text'];$author=$_POST['author'];$picture1=$_POST['picture1'];$weblink=$_POST['weblink'];$showorder=$_POST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);$author = htmlspecialchars("$author", ENT_QUOTES);$weblink = ereg_replace("http://", "", $weblink);$weblink = ereg_replace("https://", "", $weblink);$date = date("YmdHis");?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="videos";$sql = "update $tablebase set date='$date', category='$category', subcategory='$subcategory', title='$title', text='$text', author='$author', weblink='$weblink', showorder='$showorder' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<BR>Thanks for your update <B>$author</B>.<BR>";if ($picture1=="" || $picture1==null) {echo "No picture available.\n";echo "<a href=addphotor.php?id=$id>add a picture for this video?</a><BR><BR><hr>\n";} else {echo "\n<img src=/videoimages/$picture1 border=1 width=150><BR>\n";echo "<a href=addphotor.php?id=$id>change the photo for this video?</a><BR>\n";}echo "<p align=center><font size=+2><a href=viewallvideos.php>see all videos...</a></p>";unset ($date);unset ($title);unset ($text);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>