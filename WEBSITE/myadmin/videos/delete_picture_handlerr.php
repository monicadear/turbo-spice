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

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("videocontent_nav.php"); ?>

<?$delete=$_POST['delete'];if ($delete) {$id=$_POST['id'];?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="videos";$sql = "update videos set picture1 ='' 		  where id='$id'";$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query");     mysql_db_query($database,$query2);echo "$query2<BR>";   mysql_close();}?><?echo "<BR>The picture was deleted.";echo "<p align=left><font size=+2><a href=viewallvideos.php>see all videos...</a></p>";unset ($date);unset ($title);unset ($text);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?><? include ("../adminfooter.php"); ?>

<? }
?>