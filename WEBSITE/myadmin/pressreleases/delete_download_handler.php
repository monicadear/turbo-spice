<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig2.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?><?$delete_me=$_POST['delete_me'];$dont=$_POST['dont'];if ($delete_me) {$id=$_POST['id'];    $query2 = "update pressreleases set filename='' 		  where id='$id'";

    mysql_db_query($database,$query2);    echo "<p><b><font color=red>YOUR FILE HAS BEEN DELETED.</font> <a href=viewall.php>[view all pressreleases]</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p>Nothing happened. <a href=viewall.php>See all?</a></p>";}mysql_close();?><? include ("../adminfooter.php"); ?>

<? }
?>