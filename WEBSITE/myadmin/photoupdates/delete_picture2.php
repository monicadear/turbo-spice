<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("allphotos_nav.php"); ?>

<table border=0>

<?
$submit=$_POST['submit'];



if ($submit) {

$pid=$_POST['pid'];
}
 ?>



<? echo "<form method='post' action='delete_picture2_handler.php'>"; ?> 

<?
$db = "allphotosextended";
$query1 = "select * from $db where pid = '$pid'";
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
$picture2=$row->picture2;
 
echo "<tr><th width=50>Title: </th><td>$row->title";
    echo "<tr><th width=50>Text</th><td>";
    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";

echo "<tr><th>Picture, if any:</th><td><img src=/photogallery/$picture2 width=150 border=1></td></tr>";

$pid = $row->pid;
$picture2 = $row->picture2;





}

echo "<tr><td colspan=2><br><input type=hidden name='pid' value='$pid'>";
echo "<input type=hidden name='picture2' value='$picture2'>";

echo "</td></tr></table><p>";
?>

Delete this picture only: <input type=submit name="delete" value="DELETE picture">
</form>



<? include ("../adminfooter.php"); ?>

<? }
?>