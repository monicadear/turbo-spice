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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig2.php"); ?><? include ("../adminnav.php"); ?>
<? include ("announcements_nav.php"); ?><BR><table border=0 cellpadding=2 cellspacing=0 width="100%"><? 

$id=$_REQUEST['id'];
$delete=$_REQUEST['delete'];

if ($delete) {    $query2 = "delete from announcements where id='$id'";    mysql_db_query($database,$query2);    echo "<p><b><font color=red>THIS ANNOUNCEMENT HAS BEEN DELETED.</font> <a href=viewallannouncements.php>view all announcements</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p></p>";}?><? include ("../adminfooter.php"); ?>

<? }
 ?>