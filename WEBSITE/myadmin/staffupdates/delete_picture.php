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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?><table border=0><?$aid=$_REQUEST['aid']; ?><? echo "<form method='post' action='delete_picture_handler.php'>"; ?> <?$db = "staff";$query1 = "select * from $db where aid = '$aid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$picture=$row->picture; echo "<tr><th>Picture, if any:</th><td><img src=/images/faces/$picture width=150 border=1></td></tr>";}echo "<tr><td colspan=2><br><input type=hidden name='aid' value='$aid'>";echo "<input type=hidden name='picture' value='$picture'>";echo "</td></tr></table><p>";?>Delete this picture only: <input type=submit name="delete" value="DELETE picture"></form>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>