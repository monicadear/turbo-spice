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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("staff_nav.php"); ?>

<?$delete=$_POST['delete'];if ($delete) {/*Check into database */$aid=$_POST['aid'];
?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="staff";$sql = "delete from $tablebase 		  where aid='$aid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}


?>
<?echo "<BR>";
echo "<font color=red>This name has been deleted.</font><BR><BR>";
echo "<p align=center><font size=+2><a href=viewall.php>see all staff...</a></p>";unset ($date);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>