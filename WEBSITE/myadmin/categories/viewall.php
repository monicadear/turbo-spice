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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("categorycontent_nav.php"); ?>
echo "<td>Display order: $showorder</td>";
echo "<td><form method=post action=update.php><input type=hidden name=categoryid value=$categoryid><input type=submit name=submit value=update></form></td>";

<? }
 ?>