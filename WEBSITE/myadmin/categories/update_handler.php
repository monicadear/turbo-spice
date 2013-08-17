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
<? include ("categorycontent_nav.php"); ?>

<?$update=$_POST['update'];if ($update) {/*Insert into database */$categoryid=$_POST['categoryid'];$categoryname=$_POST['categoryname'];$showorder=$_POST['showorder'];$categoryname = htmlspecialchars("$categoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="category";$sql = "update $tablebase set categoryname='$categoryname', showorder='$showorder'  
		  where categoryid='$categoryid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?>
<?echo "<BR>Thanks for your update.<BR>";echo "<p align=center><font size=+2><a href=viewall.php>see all categories...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
 ?>