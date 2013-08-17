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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("pagecontent_nav.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$id=$_POST['id'];$category=$_POST['category'];$category2=$_POST['category2'];$subcategory=$_POST['subcategory'];$titleshow=$_POST['titleshow'];$title=$_POST['title'];$text=$_POST['text'];$editedby=$_POST['editedby'];$picture1=$_POST['picture1'];$showorder=$_POST['showorder'];$publish=$_POST['publish'];$titleshow = htmlspecialchars("$titleshow", ENT_QUOTES);$title = htmlspecialchars("$title", ENT_QUOTES);
$text = htmlspecialchars("$text", ENT_QUOTES);
$editedby = htmlspecialchars("$editedby", ENT_QUOTES);$date = date("YmdHis");?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="pagecontent";$sql = "update $tablebase set dateedited='$date', category='$category',  category2='$category2', subcategory='$subcategory', titleshow='$titleshow', title='$title', text='$text', editedby='$editedby', showorder='$showorder', publish='$publish' 		  where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<BR>Thanks for your update <B>$author</B>.<BR>";if ($picture1=="" || $picture1==null) {echo "No picture available.\n";echo "<a href=addphoto.php?id=$id>add a picture for this page?</a><BR><BR><hr>\n";} else {echo "\n<img src=/pageimages/$picture1 border=1 width=150><BR>\n";echo "<a href=addphoto.php?id=$id>change the photo for this item?</a><BR>\n";}echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category>See Revised Page!</a><BR><BR>";
echo "<p align=center><font size=+2><a href=viewall.php>see all pages...</a></p><BR>";unset ($date);unset ($title);unset ($text);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>