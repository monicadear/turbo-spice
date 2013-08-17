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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("resourcecontent_nav.php"); ?><p>Use standard HTML tags for bold and italic.</p><p>To make something bold, but &lt;b&gt; and &lt;/b&gt; around the text, like this &lt;b&gt;<b>bold</b>&lt;/b&gt;.<BR>To make something italic, but &lt;i&gt; and &lt;/i&gt; around the text, like this &lt;i&gt;<i>italic</i>&lt;/i&gt;.</p><BR><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='update_handlerr.php'>"; ?> <?$db = "resources";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);$picture1=$row->picture1;$category=$row->category; echo "<tr><th width=50>Category:<BR></th><td>";
echo "<a href=../linkcategories/viewall.php target=new>view all link categories</a><BR>";

echo "<select name=category>";include("../../codes/adminconfig.php");include("producttypelist_category.php");echo "</select><BR>\n";

echo "</td></tr>";echo "<tr><th width=50>Subcategory: </th><td><input type=hidden name='subcategory' value='$row->subcategory'>Regular Link</td></tr>";

echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=5 cols=60>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";echo "<tr><th width=50>URL: </th><td><input type=text name='weblink' value='$row->weblink' size=50></td></tr>";echo "<tr><th>Picture, if any:</th><td>";if ($picture1 == ""){echo "";}else {echo "<img src=/resourceimages/$picture1 width=150 border=1>";}echo "</td></tr>";echo "<tr><th width=50>Last edited by: </th><td>$session->username <input type=hidden name='author' value='$session->username'></td></tr>";echo "<tr><th width=50>Order: </th><td><input type=text name='showorder' value='$row->showorder' size=5> (1 shows higher than 100)</td></tr>";$id = $row->id;$picture1 = $row->picture1;}echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "<input type=hidden name='picture1' value='$picture1'>";echo "</td></tr></table><p>";?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>