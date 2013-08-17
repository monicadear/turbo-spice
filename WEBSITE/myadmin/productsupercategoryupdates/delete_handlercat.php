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

<?$delete=$_POST['delete'];if ($delete) {/*Insert into database */$productsupercategoryid=$_POST['productsupercategoryid'];$productsupercategoryname=$_POST['productsupercategoryname'];$publishedbox=$_POST['publishedbox'];$productsupercategoryname = htmlspecialchars("$productsupercategoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "delete from productsupercategory where productsupercategoryid= '$productsupercategoryid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<p><BR>Thanks for your deletion.<BR>"; echo "$productsupercategoryname</p>";echo "<p align=center><font size=+2><a href=viewallcat.php>see all product super-categories...</a></p>";unset ($productsupercategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>