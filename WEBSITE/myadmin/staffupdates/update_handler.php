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
<?$update=$_POST['update'];if ($update) {/*Insert into database */$aid=$_POST['aid'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$title=$_POST['title'];$text=$_POST['text'];$email=$_POST['email'];$picture=$_POST['picture'];$showorder=$_POST['showorder'];$stackorder=$_POST['stackorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = htmlspecialchars("$text", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);$email = htmlspecialchars("$email", ENT_QUOTES);$date = date("YmdHis");?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="staff";$sql = "update $tablebase set date='$date', picture='$picture', firstname='$firstname', lastname='$lastname', title='$title', text='$text', email='$email', showorder='$showorder', stackorder='$stackorder'		  where aid='$aid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query('$database',$query2);   mysql_close();}?>

<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><?echo "<BR>Thanks for your update!."; echo "<BR>$aid<BR>\nDate: $date<BR>\nPicture: $picture<BR><BR>\nStaff Name: $firstname $lastname<BR>Title: $title<BR>\nDetails: $text<BR>\nE-mail: $email</p>";unset ($date);unset ($title);unset ($text);echo "<p align=center><font size=+2><a href=updatepic.php?aid=$aid>update picture?</a></p>";echo "<p align=center><font size=+2><a href=viewall.php?aid=$aid>view all...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>