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
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include ("psccontent_nav.php"); ?>
$result1 = mysql_db_query($database, $query1);

echo "<tr><th></th><td>";

echo "<select name=productsubcategorysecid>";

echo "</td></tr>";
echo "<tr><th width=50>Name: </th><td><input type=text name='productsubcategoryname' value='$productsubcategoryname' size=50></td></tr>";

<? }
?>