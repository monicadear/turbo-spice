<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->userlevel >=9){

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
<? include ("../../codes/adminconfig2.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("newsletters_nav.php"); ?><?$delete_me=$_POST['delete_me'];$dont=$_POST['dont'];if ($delete_me) {$id=$_POST['id'];    $query2 = "update newsletters set thumbnail='' 		  where id='$id'";

    mysql_db_query($database,$query2);    echo "<p><b><font color=red>YOUR THUMBNAIL HAS BEEN DELETED.</font> <a href=viewall.php>[view all newsletters]</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p>Nothing happened. <a href=viewall.php>See all newsletters?</a></p>";}mysql_close();?><? include ("../adminfooter.php"); ?>

<? }
?>