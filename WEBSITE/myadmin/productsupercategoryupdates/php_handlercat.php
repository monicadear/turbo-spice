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

<?$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$productsupercategoryid=$_POST['productsupercategoryid'];$productsupercategoryname=$_POST['productsupercategoryname'];$productsupercategoryshoworder=$_POST['productsupercategoryshoworder'];$publishedbox=$_POST['publishedbox'];$productsupercategoryname = htmlspecialchars("$productsupercategoryname", ENT_QUOTES);?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into productsupercategory values ('','$productsupercategoryname','$productsupercategoryshoworder','','$publishedbox')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission.<BR>";echo "<font size=+1>$productsupercategoryname</font><BR><BR>";echo "<a href=viewallcat.php>click to view all product super-categories</a>.";echo "</div>";unset ($productsupercategoryname);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>