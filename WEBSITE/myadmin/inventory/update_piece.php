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

<?
$submit=$_POST['submit'];



if ($submit) {

$productid=$_POST['productid'];

}
 ?>






<?php include("../adminsmallbox.php"); ?>


<h2>UPDATE PIECE</h2>

<?include("../../codes/adminconfig2.php");?>

Tips: <font color=red>&lt;font color=red&gt;make font red&lt;/font&gt;</font><BR>
<b>&lt;b&gt;bold text&lt;/b&gt;</b><BR>
<i>&lt;i&gt;italic text&lt;/b&gt;</i><BR><BR>


<? echo "<form method='post' action='update_handler_piece.php'>"; ?> 

<?
$db = "allproducts";
$query1 = "select * from $db where productid = '$productid'";
$result1 = mysql_db_query($database, $query1);
while($row = mysql_fetch_object($result1)) {


$productid=$row->productid;

$supercategory=$row->supercategory;
$category=$row->category;
$type=$row->type;

$name=html_entity_decode("$row->name", ENT_QUOTES);






$description=html_entity_decode("$row->description", ENT_QUOTES);
$trans4["\n"]= "";
$trans4["<BR><BR>"] = "\r\r\n";
$trans4["<BR>"] = "\r\n";
$description = strtr($description,$trans4);


$stackorder=$row->stackorder;

$publishedbox=$row->publishedbox;

 echo "<table border=0 width=90%>";
 echo "<tr>";
echo "<td valign=top width=75><h3>Piece Info</h3></td>";
echo "<td>";

echo "<table border=0 cellspacing=0 cellpadding=0>";
 echo "<tr><td>Product ID:</td><td>$productid</td></tr>\n";
 echo "<tr><td>SuperCategory:</td><td>";
echo "<select name=supercategory>";
include("../../codes/adminconfig.php");
include("producttypelist_supercategory.php");
echo "</select></td></tr>\n";

echo "<tr><td>Category:</td><td>";
echo "<select name=category>";
include("../../codes/adminconfig.php");
include("producttypelist_category.php");
echo "</select></td></tr>\n";

    echo "<tr><td>Type:</td><td>";
echo "<select name=type>";
include("../../codes/adminconfig.php");
include("producttypelist_category3.php");
echo "</select><BR><span class=smalladmintext>NOTE! Make sure the number within the category and type match!</span></td></tr>";

 echo "</table>\n";

echo "</td></tr>";

 echo "<tr>";
echo "<td valign=top width=75><h3>Additional Info</h3></td>";
echo "<td>";
 echo "Title: <input type=text name='name' value='$name' size=30><BR>\n";
echo "Description:<BR><textarea name='description' rows=4>$description</textarea><BR>\n";


 echo "Author: $sesssion->username <input type=hidden name='author' value='$session->username'><BR>\n";


echo "Stack Order: <input type=text name='stackorder' value='$stackorder' size=5> choose 1-100<BR>\n";

if ($publishedbox=='Y') {
echo "Published?: <input type=checkbox value=Y name=publishedbox checked>\n";
} else if ($publishedbox=='N'|| $publishedbox=='') {
echo "Published?: NOT PUBLISHED.<BR><input type=checkbox value=Y name=publishedbox> Click to publish.\n";
} else {  echo "Published?: <select name=publishedbox><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";
}
echo "<BR>\n";



echo "</td></tr></table>\n";


$id = $row->id;
}

echo "<input type=hidden name='productid' value='$productid'>\n";

?>

<div align=left><input type=submit name="update" value="UPDATE record"></div>
</form>












</div>

<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
