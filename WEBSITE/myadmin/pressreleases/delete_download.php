<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?><h1>Admin: Press Release FILE Delete Edit</h1><?$submit_delete=$_POST['submit_delete'];if ($submit_delete) {$id=$_POST['id'];} ?><BR><table border=0 cellpadding=2 cellspacing=0 width="100%"><? echo "<form method='post' action='delete_download_handler.php'>"; ?> <?$db = "pressreleases";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($text,$trans);     echo "<tr><th width=50>Title</th><td>$row->title</td></tr>";     echo "<tr><th width=50>Filename</th><td>$row->filename</td></tr>";    echo "<tr><th width=50>Description</th><td>$text</td></tr>";$id = $row->id;}echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";?><p>Are you sure you want to <strong>DELETE</strong> this file?<BR><input type=submit name="dont" value="No, DON'T DELETE!!"><input type=submit name="delete_me" value="Yes, DELETE RECORD"><BR></form><?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>