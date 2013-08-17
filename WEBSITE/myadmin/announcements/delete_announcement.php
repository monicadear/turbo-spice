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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig2.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?><BR>
<h1>Delete this Announcement</h1><table border=0 cellpadding=2 cellspacing=0 width="100%"><form method='post' action='delete_announcementhandler.php'>

<?
$id=$_REQUEST['id'];


$db = "announcements";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";

$title =$row->title;      echo "<tr><th width=50>Title</th><td>$title</td></tr>";$id = $row->id;}echo "<br><input type=hidden name='id' value='$id'>";echo "</table><p>";?><p>Are you sure you want to <strong>DELETE</strong> this record?<BR><input type=submit name="dont" value="No, DON'T DELETE!!"><input type=submit name="delete" value="Yes, DELETE RECORD"><BR></form>

<?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
 ?>