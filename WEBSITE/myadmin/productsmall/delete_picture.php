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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("productsmall_nav.php"); ?><table border=0><?$id=$_REQUEST['id']; ?><? echo "<form method='post' action='delete_picture_handler.php'>"; ?> <?$db = "productsmall";$query1 = "select * from $db where id = '$id'";
echo "$query1";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$picture1=$row->filename; echo "<tr><th width=50>Title: </th><td>$row->title";echo "<tr><th>Picture, if any:</th><td><img src=/productsmall/$picture1 width=150 border=1></td></tr>";$id = $row->id;$picture1 = $row->filename;}echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "<input type=hidden name='picture1' value='$picture1'>";echo "</td></tr></table><p>";?>Delete this picture only: <input type=submit name="delete" value="DELETE picture"></form>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>