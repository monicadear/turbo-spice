<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?><p>Use standard HTML tags for bold and italic.</p><p>To make something bold, but &lt;b&gt; and &lt;/b&gt; around the text, like this &lt;b&gt;<b>bold</b>&lt;/b&gt;.<BR>To make something italic, but &lt;i&gt; and &lt;/i&gt; around the text, like this &lt;i&gt;<i>italic</i>&lt;/i&gt;.</p><BR><table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "productsmall";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";
$text = strtr($row->text,$trans); $moreinfo = strtr($row->moreinfo,$trans); 
$trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";
$text = strtr($text,$trans4);
$moreinfo = strtr($moreinfo,$trans4);

$price = $row->price;
$filename = $row->filename;
$filename2 = $row->filename2;
$webslink = $row->webslink;$author = $row->author;
$showorder = $row->showorder; 

$filenametoshow = substr("$filename", -3, 3);
$filenametoshow2 = substr("$filename2", -3, 3);

echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";echo "<tr><th width=50>Title (more): </th><td><input type=text name='title2' value='$row->title2' size=50></td></tr>";echo "<tr><th width=50>Creator: </th><td><input type=text name='creator' value='$row->creator' size=50></td></tr>";echo "<tr><th width=50>Filename: </th><td>$filename <input type=hidden name=filename value='$filename'></td></tr>";
echo "<tr><td colspan=2>";


if ($filenametoshow == "jpg" || $filenametoshow == "gif" || $filenametoshow == "JPG" || $filenametoshow == "GIF" || $filenametoshow == "png" || $filenametoshow == "PNG") {


echo "<a href=/productsmall/$filename><img src=/productsmall/$filename width=150 border=0></a>";

}


echo "</td></tr>";

echo "<tr><th width=50>Filename: </th><td>$filename2 <input type=hidden name=filename2 value='$filename2'></td></tr>";
echo "<tr><td colspan=2>";


if ($filenametoshow2 == "jpg" || $filenametoshow2 == "gif" || $filenametoshow2 == "JPG" || $filenametoshow2 == "GIF" || $filenametoshow2 == "png" || $filenametoshow2 == "PNG") {


echo "<a href=/productsmall/$filename2><img src=/productsmall/$filename2 width=150 border=0></a>";

}


echo "</td></tr>";



    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=10 cols=50>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";

    echo "<tr><th width=50>More info</th><td><textarea name='moreinfo' rows=10 cols=50>";    echo "$moreinfo</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";


echo "<tr><th width=50>Price: </th><td>$<input type=text name='price' value='$price' size=50></a></td></tr>";

echo "<tr><th width=50>URL: </th><td><input type=text name='webslink' value='$webslink' size=50> <a href=http://$webslink target=new>(check link)</a></td></tr>";echo "<tr><th width=50>Author: </th><td><input type=text name='author' value='$author' size=50></td></tr>";echo "<tr><th width=50>Display Order: </th><td><input type=text name='showorder' value='$showorder' size=10></td></tr>";$id = $row->id;}echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";?><input type=submit name="update" value="UPDATE record"></form><? include ("../adminfooter.php"); ?>

<? }
?>