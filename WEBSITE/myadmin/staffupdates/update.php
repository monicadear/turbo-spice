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
<? $db = "staff"; ?><? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("staff_nav.php"); ?><table border=0 cellpadding=2 cellspacing=0 width=650><? echo "<form method='post' action='update_handler.php'>"; ?> <?
$aid=$_REQUEST['aid'];$query1 = "select * from $db where aid = '$aid'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);$picture = $row->picture; $stackorder = $row->stackorder; echo "<tr><th width=50>First Name: </th><td width=600><input type=text name='firstname' value='$row->firstname'></td></tr>";
echo "<tr><th width=50>Last Name: </th><td><input type=text name='lastname' value='$row->lastname'></td></tr>";

 echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title'></td></tr>";    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=10 cols=40>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";echo "<tr><th width=50>E-mail: </th><td><input type=text name='email' value='$row->email'></td></tr>";
echo "<tr><th width=50>Picture: </th><td>";

if (isset($picture) && $picture !== "") 
{
echo "<img src=/images/faces/$picture width=100>";
}

else {
echo "No picture available.";
}
echo "</td></tr>";

echo "<tr><th width=50>Display order: </th><td><input type=text name='showorder' value='$row->showorder'></td></tr>";


echo "<tr><th width=50>Category:<BR></th><td>";
echo "<a href=../staffcategories/viewall.php target=new>view all staff categories</a><BR>";

echo "<select name=stackorder>";include("../../codes/adminconfig.php");include("producttypelist_category.php");echo "</select><BR>\n";

echo "</td></tr>";$aid = $row->aid;}echo "<tr><td colspan=2><br><input type=hidden name='aid' value='$aid'><input type=hidden name='picture' value='$picture'>";echo "</td></tr></table>";?><input type=submit name="update" value="UPDATE record"></form><?mysql_free_result($result1); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>