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
<? include ("../../codes/adminconfig2.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?><table border=0><? echo "<form method='post' action='delete_event_handler.php'>"; ?> <?$id=$_REQUEST['id'];$db = "calendar";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["&lt;input"] = "input_";$text = strtr($text,$trans); echo "<tr>";echo "<th width=50>Date</th><td>$row->startdate</td></tr>";    echo "<tr><th width=50>Title</th><td>$row->title</td></tr>";    echo "<tr><th width=50>Description</th><td>$row->description</td></tr>";    echo "<tr><th width=50>Time</th><td>$row->starttime to $row->endtime</td></tr>";    echo "<tr><th width=50>Location</th><td>$row->location</td></tr>";    echo "<tr><th width=50>Prices</th><td>$row->price members and $row->pricenonmembers nonmembers</td></tr>";$id = $row->id;}echo "<tr><td colspan=2><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";?><p>Are you sure you want to <strong>DELETE</strong> this record?<BR><input type=submit name="dont" value="No, DON'T DELETE!!"><input type=submit name="delete" value="Yes, DELETE RECORD"><BR></form><? unset ($query2);unset ($delete);unset ($dont);unset ($db);unset ($database);unset ($query1);unset ($result1);?>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>