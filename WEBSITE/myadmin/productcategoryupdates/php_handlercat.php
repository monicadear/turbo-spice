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

<?$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$productsupercategoryid=$_POST['productsupercategoryid'];$productcategoryid=$_POST['productcategoryid'];$productcategoryname=$_POST['productcategoryname'];$productcategoryshoworder=$_POST['productcategoryshoworder'];$publishedbox=$_POST['publishedbox'];$productcategoryname = htmlspecialchars("$productcategoryname", ENT_QUOTES);?>
<?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into productcategory values ('','$productsupercategoryid','$productcategoryname','$productcategoryshoworder','','$publishedbox')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission.<BR>";echo "<font size=+1>$productcategoryname</font><BR><BR>";echo "<a href=viewallcat.php>click to view all product categories</a>.";echo "</div>";unset ($productcategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>