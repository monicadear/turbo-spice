<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?><p>Use standard HTML tags for bold and italic.</p><p>To make something bold, but &lt;b&gt; and &lt;/b&gt; around the text, like this &lt;b&gt;<b>bold</b>&lt;/b&gt;.<BR>To make something italic, but &lt;i&gt; and &lt;/i&gt; around the text, like this &lt;i&gt;<i>italic</i>&lt;/i&gt;.</p><BR><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "pressreleases";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);

$category = $row->category;

$filename = $row->filename;
$webslink = $row->webslink;$showorder = $row->showorder; 

$filenametoshow = substr("$filename", -3, 3);

echo "<tr><th width=50>Category: $category<BR></th>";
echo "<td>";
echo " <a href=../pressreleasecategories/viewall.php target=new>(view all press release categories)</a><BR>";

echo "<select name=category>";include("../../codes/adminconfig.php");
include("pressreleases_category.php");echo "</select><BR>\n";

echo "</td></tr>";

echo "<tr><th width=50>Release Date: </th><td><input type=text name='dateofrelease' value='$row->dateofrelease' size=50></td></tr>";
echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";echo "<tr><th width=50>Filename: </th><td>$filename</td></tr>";
echo "<tr><td colspan=2>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG") {


echo "<a href=/pressreleases/$filename><img src=/pressreleases/$filename width=150 border=0></a>";

}


echo "</td></tr>";    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=10 cols=50>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";echo "<tr><th width=50>URL: </th><td>";

if (isset($webslink) && $webslink !=="")
echo "<input type=text name='webslink' value='$webslink' size=50> <a href=http://$webslink target=new>(check link)</a>";

else {
echo "<input type=text name='webslink' value='$webslink' size=50>";
}

echo "</td></tr>";echo "<tr><th width=50>Submitted by: </th><td><input type=text name='author' value='$row->author' size=50></td></tr>";

















$id = $row->id;




}


echo "<tr><td>Display Order</td><td><input type=text name='showorder' value='$showorder'></td></tr>";

echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";?><input type=submit name="update" value="UPDATE record"></form>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>