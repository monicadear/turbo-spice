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
<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$picture=$_POST['picture'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$title=$_POST['title'];$text=$_POST['text'];$email=$_POST['email'];$showorder=$_POST['showorder'];$stackorder=$_POST['stackorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);$date = date("YmdHis");if ($email == ""){$email="";}else {$email = htmlspecialchars("$email", ENT_QUOTES);}?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into staff values ('','$date','$picture','$firstname', '$lastname','$title','$text','$email','$showorder','$stackorder')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();unset ($picture);}?>
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><?echo "<BR>Thanks for your submission! .<BR><a href=viewall.php>click to view all</a>";echo "<h1>$firstname $lastname</h1>";echo "<h2>$title</h2>";echo "$text<BR>\n";echo "$date<BR>\n";echo "$email"; unset ($title);unset ($text);unset ($date);unset ($email);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>