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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("newsletters_nav.php"); ?>
$title = $row->title;
$thumbnail = $row->thumbnail;
echo "<td>";
echo "$thumbnail";
echo "<BR><img src=/newsletters/thumbnails/$thumbnail border=0 width=150 alt=thumbnail>";
echo "</td></tr>";

<? }
?>