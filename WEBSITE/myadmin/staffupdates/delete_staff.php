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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><table border=0><?$aid=$_REQUEST['aid']; ?><form method='post' action='delete_handler.php'><?$db = "staff";$query1 = "select * from $db where aid = '$aid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) { 
echo "<tr><th>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";

echo "<tr><th>Text: </th><td><input type=text name='text' value='$row->text' size=50></td></tr>";

echo "<tr><th>Email: </th><td><input type=text name='email' value='$row->email' size=50></td></tr>";echo "<tr><td colspan=2><br><input type=hidden name='aid' value='$aid'>";echo "</td></tr></table><p>";
}
?><input type=submit name="delete" value="DELETE record?"><A HREF="javascript:history.go(-1)"><input type=button name="nodelete" value="KEEP THIS!"></A></form><? include ("../adminfooter.php"); ?>

<? }
?>