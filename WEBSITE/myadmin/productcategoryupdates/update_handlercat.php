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
<? include ("catcontent_nav.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$productsupercategoryid=$_POST['productsupercategoryid'];$productcategoryid=$_POST['productcategoryid'];$productcategoryname=$_POST['productcategoryname'];
$productcategoryshoworder =$_POST['productcategoryshoworder'];
$publishedbox=$_POST['publishedbox'];$productcategoryname = htmlspecialchars("$productcategoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "update productcategory set productsupercategoryid = '$productsupercategoryid', productcategoryname = '$productcategoryname', productcategoryshoworder = '$productcategoryshoworder', publishedbox = '$publishedbox' where productcategoryid= '$productcategoryid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<p><BR>Thanks for your update.<BR>"; echo "$productcategoryname</p>";echo "<p align=center><font size=+2><a href=viewallcat.php>see all subcategories...</a></p>";unset ($productcategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>