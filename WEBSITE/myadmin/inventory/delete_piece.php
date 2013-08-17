<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include("inventorynav.php");?>



<h2>DELETE</h2>

<B>Delete this item.</B><BR><BR>

<?include("../../codes/adminconfig2.php");?>

<? echo "<form method='post' action='$PHP_SELF'>"; 
?> 

<?
$productid=$_POST['productid'];
$db = "allproducts";
$query1 = "select * from $db where productid = '$productid'";
$result1 = mysql_db_query($database, $query1);
while($row = mysql_fetch_object($result1)) {

$name=html_entity_decode("$row->name", ENT_QUOTES);
$description=html_entity_decode("$row->description", ENT_QUOTES);
$productid="$row->productid";

echo "<b>Unique ID:</b> $productid<BR>\n";
echo "<span class=red><b>Name:</b> $name</span><BR>\n";
echo "<b>Description:</b> $description<BR>\n";


}
echo "<input type=hidden name='productid' value='$productid'>";


?>


<p><span class=red>Are you <B>sure</B> you want to <strong>DELETE</strong> this record?</span><BR>
<input type=submit name="dont" value="No, DON'T DELETE!!">
<input type=submit name="delete" value="Yes, DELETE RECORD"><BR>
</form></p>


<?
$delete=$_POST['delete'];
$productid=$_POST['productid'];

if ($delete) {
    $query2 = "delete from allproducts where productid='$productid'";
    mysql_db_query($database,$query2);
    echo "<p><b><span class=red>YOUR RECORD HAS BEEN DELETED.</span> <a href=viewall.php>[return to all items]</a></b></p>";
} else if ($dont) {
echo "<p><b><span class=red>You did NOT delete it.</span></b> <a href=viewall.php>[return to all items]</a></b></p>";
}
else {
echo "<p></p>";
}



mysql_close();

?>


<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
