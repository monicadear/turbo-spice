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

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig2.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("resourcecontent_nav.php"); ?>

<h2>DELETE THIS LINK</h2>

<table border=0>

<?

$id=$_POST['id'];
 ?>



<? echo "<form method='post' action='delete_handler.php'>"; ?> 

<?
$db = "resources";
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
                   $weblink=$row->weblink; 
    echo "<tr><th width=50>Link</th><td>$weblink";
    echo "</td></tr>";


$id = $row->id;






echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";

echo "</td></tr></table><p>";



}

?>

<input type=submit name="update" value="DELETE link">
</form>

<? include ("../adminfooter.php"); ?>

<? }
?>