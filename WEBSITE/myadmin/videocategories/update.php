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

<? include ("../adminheader.php"); ?>
<? include ("videocategorycontent_nav.php"); ?>

echo "<tr><th width=50>Display order:<BR></th><td><input type=text name='showorder' value='$showorder' size=10></td></tr>";

echo "<tr><td colspan=2><br><input type=hidden name='categoryid' value='$categoryid'>";
}

<?


<? }
?>