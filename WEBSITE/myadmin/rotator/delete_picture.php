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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("rotator_nav.php"); ?><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='delete_picture_handler.php'>"; ?> <?$db = "rotator";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);$picture1=$row->picture1; echo "<tr><th width=50>Title: </th><td>$row->title";    echo "<tr><th width=50>Text</th><td>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";echo "<tr><th>Picture, if any:</th><td><img src=/rotatorimages/$picture1 width=150 border=1></td></tr>";$id = $row->id;$category = $row->category;$subcategory = $row->subcategory;$picture1 = $row->picture1;}echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "<input type=hidden name='category' value='$category'>";echo "<input type=hidden name='subcategory' value='$subcategory'>";echo "<input type=hidden name='picture1' value='$picture1'>";echo "</td></tr></table><p>";?>Delete this picture only: <input type=submit name="delete" value="DELETE picture"></form><? include ("../adminfooter.php"); ?>

<? }
?>