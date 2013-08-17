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
$update=$_POST['update'];

if ($update) {
/*Insert into database */


$productid=$_POST['productid'];
$supercategory=$_POST['supercategory'];
$category=$_POST['category'];
$type=$_POST['type'];
$name=$_POST['name'];
$description=$_POST['description'];
$author=$_POST['author'];
$stackorder=$_POST['stackorder'];
$publishedbox=$_POST['publishedbox'];


$agent=$_POST['agent'];


$name = htmlentities("$name", ENT_QUOTES);
$description = htmlentities("$description", ENT_QUOTES);


$dateupdatedy=date(Y);
$dateupdatedm=date(m);
$dateupdatedd=date(d);
$dateupdated=$dateupdatedy."-".$dateupdatedm."-".$dateupdatedd;

?>

<?include("../../codes/adminconfig2.php");?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="allproducts";
$sql = "update $tablebase set dateupdated='$dateupdated', supercategory='$supercategory', category='$category', type='$type', name='$name', description='$description', author='$author', stackorder='$stackorder', publishedbox='$publishedbox' 

		  where productid='$productid'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

    mysql_db_query($database,$query2);

mysql_close();


}
?>

<?


echo "<div>";
echo "<h2>UPDATE SUCCESS</h2>\n";
echo "<table border=0 width=90%><tr><td width=50%>";
echo "Thanks for your update.<BR><BR>";
echo "<span class=red>Tite: $name</span><BR>\n";
echo "<b>Category:</b> $category<BR><BR>\n";
echo "<b>Type:</b> $type<BR>\n";
echo "<b>Description:</b> $description<BR>\n";
echo "<b>Stack Order:</b> $stackorder<BR>\n";
echo "<b>Published?</b> $publishedbox<BR>\n";
echo "</td><td valign=top>";
echo "<div id=attentionaddphoto>";
echo "<b>File?</b><BR>";


if ($filename=="" || $filename==null) {
echo "No file available.\n";
echo "<form method=post action=product_enter_file.php>add a file? <input type=hidden name=productid value=$productid><input type=submit name=submit value=update></form><BR>\n";
} else {
echo "\n/downloads/$filename<BR>\n";
echo "<form method=post action=product_enter_file.php>change main file? <input type=hidden name=productid value=$productid><input type=submit name=submit value=update></form><BR>\n";

}



echo "</div>";
echo "</td></tr></table>";

echo "<hr>";

echo "<a href=viewall.php>View all resources...</a><BR>\n";
echo "<a href=../indexadmin.php>Admin homepage</a>";
echo "</div>";

?>


<?
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);
?>


</div>


<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
