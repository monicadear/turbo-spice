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

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$category=$_POST['category'];$category2=$_POST['category2'];$subcategory=$_POST['subcategory'];$title=$_POST['title'];$titleshow=$_POST['titleshow'];$text=$_POST['text'];$author=$_POST['author'];$showorder=$_POST['showorder'];$publish=$_POST['publish'];$title = htmlspecialchars("$title", ENT_QUOTES);$titleshow = htmlspecialchars("$titleshow", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$date = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into pagecontent values ('','$date','$date','$category','$category2','$subcategory','$titleshow','$title','$text','$author','$author','','','$showorder','$publish')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();unset ($category);unset ($subcategory);}?>
<?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "<a href=viewall.php>click to view all page content</a><BR>";echo "<a href=input_new.php>input new page</a>";echo "</div>";unset ($title);unset ($titleshow);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>