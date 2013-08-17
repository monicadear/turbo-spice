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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("documentsubcategorycontent_nav.php"); ?><h1>Admin: Document Sub-category Content Edit</h1><p><B>You may edit these document sub-categories within the site.</B></p><table border=1 width=80%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM documentsubcategory order by subcategoryid"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $subcategoryid=$myrow["subcategoryid"];					   $subcategoryname=$myrow["subcategoryname"];echo "<td>Subcategory Name: <b>$subcategoryname</b></td>";echo "<td>Subcategory ID: $subcategoryid</td>";
echo "<td><form method=post action=update.php><input type=hidden name=subcategoryid value=$subcategoryid><input type=submit name=submit value=update></form></td>";echo "<td><form method=post action=delete.php><input type=hidden name=subcategoryid value=$subcategoryid><input type=submit name=submit value=delete></form></td>";echo "</tr>";}$e++; ?></table><?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>