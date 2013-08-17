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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("documentsubcategorycontent_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($submit_enter) {/*Insert into database */$subcategoryname=$_POST['subcategoryname'];$subcategoryname = htmlspecialchars("$subcategoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into documentsubcategory values ('','$subcategoryname')"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission.<BR>";echo "<a href=viewall.php>click to view all subcategories</a><BR>";echo "<a href=input_new.php>input new subcategory</a>";echo "</div>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>