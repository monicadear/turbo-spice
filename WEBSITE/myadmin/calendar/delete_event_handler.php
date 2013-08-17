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
<? include ("../../codes/adminconfig2.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?><table border=0><?$id=$_REQUEST['id'];$delete=$_REQUEST['delete'];if (isset($delete) && $delete !=="") {    $query2 = "delete from calendar where id='$id'";    mysql_db_query($database,$query2);    echo "<p><b><font color=red>YOUR RECORD HAS BEEN DELETED.</font> <a href=calendaradmin.php>[view all]</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p></p>";}mysql_close();?><? unset ($query2);unset ($delete);unset ($dont);unset ($db);unset ($database);unset ($query1);unset ($result1);?>

<?mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
 ?>