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
<? include ("../../codes/functions.php"); ?><? include ("../../codes/adminconfig2.php"); ?><? include ("../adminnav.php"); ?>
<? include ("documentsubcategorycontent_nav.php"); ?><?$delete_me=$_POST['delete_me'];$dont=$_POST['dont'];if ($delete_me) {$subcategoryid=$_POST['subcategoryid'];    $query2 = "delete from documentsubcategory where subcategoryid='$subcategoryid'";    mysql_db_query($database,$query2);    echo "<p><b><font color=red>YOUR RECORD HAS BEEN DELETED.</font> <a href=viewall.php>[view all]</a></b></p>";} else if ($dont) {echo "<p><b><font color=red>You did NOT delete it.</font></b> <a href=javascript:history.go(-2)>[go back]</a></p>";}else {echo "<p>Nothing happened. <a href=viewall.php>See all multilingual subcategories?</a></p>";}mysql_close();?><? include ("../adminfooter.php"); ?>

<? }
?>