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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("rotator_nav.php"); ?><h1>Admin: Rotating Page Content Delete</h1><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='delete_handler.php'>"; ?> <?$db = "rotator";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);$picture1=$row->picture1;$picture2=$row->picture2;$showorder=$row->showorder; echo "<tr><th>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";

?>
<tr><th valign=top>Text</th><td>    <?echo "$text";?>

</td></tr>



<?
echo "<tr><th>Picture, if any:</th><td>";if ($picture1 == ""){echo "";}else {echo "<img src=/rotatorimages/$picture1 width=150 border=1>";}echo "</td></tr>";echo "<tr><th width=50>Author: </th><td><input type=text name='author' value='$row->author' size=50></td></tr>";$id = $row->id;$picture1 = $row->picture1;}

echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "<input type=hidden name='picture1' value='$picture1'>";echo "</td></tr></table><p>";?>



<input type=submit name="delete" value="DELETE record"></form>

<?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>