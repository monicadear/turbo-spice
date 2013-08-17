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


<?$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$productsubcategoryid=$_POST['productsubcategoryid'];$productsubcategorysecid=$_POST['productsubcategorysecid'];$productsubcategoryname=$_POST['productsubcategoryname'];$productsubcategoryshoworder=$_POST['productsubcategoryshoworder'];$publishedbox=$_POST['publishedbox'];$productsubcategoryname = htmlspecialchars("$productsubcategoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig.php"); ?><? include ("psccontent_nav.php"); ?>
<?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into productsubcategory values ('','$productsubcategorysecid','$productsubcategoryname','$productsubcategoryshoworder','','$publishedbox')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission.<BR>";echo "<font size=+1>$productsubcategoryname</font><BR><BR>";echo "<a href=viewallpsc.php>click to view all product subcategories</a>.";echo "</div>";unset ($productsubcategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>