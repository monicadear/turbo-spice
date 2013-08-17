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

<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("rotator_nav.php"); ?><h1>Admin: Rotating Page Content Delete</h1>

<?$delete=$_REQUEST['delete'];$id=$_REQUEST['id'];if ($delete) {/*Insert into database */?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="rotator";$sql = "delete  from $tablebase 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<BR>Thanks for your deletion.<BR>";echo "<p align=center><font size=+2><a href=viewall.php>see all pages...</a></p>";unset ($date);unset ($title);unset ($text);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>