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

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("testimonialcontent_nav.php"); ?>
<p>Use standard HTML tags for bold and italic.</p>
<p>
To make something bold, but &lt;b&gt; and &lt;/b&gt; around the text, like this &lt;b&gt;<b>bold</b>&lt;/b&gt;.<BR>
To make something italic, but &lt;i&gt; and &lt;/i&gt; around the text, like this &lt;i&gt;<i>italic</i>&lt;/i&gt;.</p>
<BR>
<table border=0>

<?
$submit=$_POST['submit'];



if ($submit) {

$id=$_POST['id'];
}
 ?>



<? echo "<form method='post' action='update_handler.php'>"; ?> 

<?
$db = "testimonialcontent";
$query1 = "select * from $db where id = '$id'";
$result1 = mysql_db_query($database, $query1);
while($row = mysql_fetch_object($result1)) {
$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";
$text = strtr($row->text,$trans); 
$trans4["\n"]= "";
$trans4["<BR><BR>"] = "\r\r\n";
$trans4["<BR>"] = "\r\n";
$text = strtr($text,$trans4);
$showorder=$row->showorder;
 
    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=10 cols=60>";
    echo "$text</textarea><BR>NOTE! The first paragraph will rotate in the topbar of the live website.</td></tr>";


echo "<tr><th width=50>Author: </th><td><input type=text name='author' value='$row->author' size=50></td></tr>";

echo "<tr><th width=50>Location: </th><td><input type=text name='location' value='$row->location' size=50></td></tr>";


$id = $row->id;





}


echo "<tr><th width=50>Order (list a number from 1 - 10): </th><td><input type=text name='showorder' value='$showorder' size=50></td></tr>";

echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";

echo "</td></tr></table><p>";
?>

<input type=submit name="update" value="UPDATE record">
</form>

<? include ("../adminfooter.php"); ?>

<? }
?>