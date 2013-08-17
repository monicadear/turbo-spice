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
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include ("psccontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$productsubcategoryid=$_POST['productsubcategoryid'];$productsubcategorysecid=$_POST['productsubcategorysecid'];$productsubcategoryname=$_POST['productsubcategoryname'];
$productsubcategoryshoworder=$_POST['productsubcategoryshoworder'];$publishedbox=$_POST['publishedbox'];$productsubcategoryname = htmlspecialchars("$productsubcategoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "update productsubcategory set productsubcategorysecid = '$productsubcategorysecid', productsubcategoryname = '$productsubcategoryname', productsubcategoryshoworder = '$productsubcategoryshoworder', publishedbox = '$publishedbox' where productsubcategoryid= '$productsubcategoryid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<p><BR>Thanks for your update.<BR>"; echo "$productsubcategoryname</p>";echo "<p align=center><font size=+2><a href=viewallpsc.php>see all subcategories...</a></p>";unset ($productsubcategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>