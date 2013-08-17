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



<h2>DELETE THIS Testimonial</h2>

<table border=0>

<?
$delete=$_POST['delete'];



if ($delete) {

$id=$_POST['id'];
}
 ?>



<? echo "<form method='post' action='delete_handler.php'>"; ?> 

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
$picture1=$row->picture1;
$picture2=$row->picture2;
$showorder=$row->showorder;
 
    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=20 cols=60>";
    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";

echo "<tr><th width=50>Author: </th><td><input type=text name='author' value='$row->author' size=50></td></tr>";
$id = $row->id;





}


echo "<tr><th width=50>Order (list a number from 1 - 10): </th><td><input type=text name='showorder' value='$showorder' size=50></td></tr>";

echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";
echo "<input type=hidden name='picture1' value='$picture1'>";

echo "</td></tr></table><p>";
?>

<input type=submit name="update" value="DELETE page">
</form>

<? include ("../adminfooter.php"); ?>

<? }
?>