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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("newsletters_nav.php"); ?>

<?$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$title=$_POST['title'];$text=$_POST['text'];$author=$_POST['author'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$date = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into newsletters values ('','$date','$title','$text','','','$author','100')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?>
<?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "<a href=viewall.php>click to view all newsletters</a><BR>";echo "<a href=input_new.php>input new newsletter</a>";echo "</div>";unset ($title);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>