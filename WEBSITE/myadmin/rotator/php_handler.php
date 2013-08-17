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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("rotator_nav.php"); ?>

<?$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$category=$_POST['category'];$subcategory=$_POST['subcategory'];$title=$_POST['title'];$titleshow=$_POST['titleshow'];$text=$_POST['text'];$author=$_POST['author'];$showorder=$_POST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$titleshow = htmlspecialchars("$titleshow", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$date = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into rotator values ('','$date','1','1','$title','$title','$text','$author','','$showorder')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();unset ($category);unset ($subcategory);}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";echo "<a href=viewall.php>click to view all rotating content</a><BR>";echo "<a href=input_new.php>input new rotating item</a>";echo "</div>";unset ($title);unset ($titleshow);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>