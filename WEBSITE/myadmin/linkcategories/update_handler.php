<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 


}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("linkcategorycontent_nav.php"); ?>

<?$update=$_REQUEST['update'];if ($update) {/*Insert into database */$categoryid=$_REQUEST['categoryid'];$categoryname=$_REQUEST['categoryname'];$showorder=$_REQUEST['showorder'];$categoryname = htmlspecialchars("$categoryname", ENT_QUOTES);?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="linkcategory";$sql = "update $tablebase set categoryname='$categoryname', showorder='$showorder'  
		  where categoryid='$categoryid'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);   mysql_close();}?><?echo "<BR>Thanks for your update.<BR>";echo "<p align=center><font size=+2><a href=viewall.php>see all categories...</a></p>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>