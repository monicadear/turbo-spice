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
<? include ("videocontent_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$category=$_POST['category'];$subcategory=$_POST['subcategory'];$title=$_POST['title'];$text=$_POST['text'];$author=$_POST['author'];$weblink=$_POST['weblink'];$showorder=$_POST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$date = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);$weblink = ereg_replace("http://", "", $weblink);$weblink = ereg_replace("https://", "", $weblink);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into videos values ('','$date','$category','$subcategory','$title','$text','$author','','$weblink','$showorder')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();unset ($category);unset ($subcategory);}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";echo "<a href=viewallvideos.php>click to view all video content</a><BR>";echo "<a href=input_newr.php>input new video</a>";echo "</div>";unset ($title);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>