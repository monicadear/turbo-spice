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

?>
<tr><th valign=top>Text</th><td>    <?echo "$text";?>

</td></tr>



<?


echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";





<?

<? }
?>