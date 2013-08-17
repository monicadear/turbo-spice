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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("subcategorycontent_nav.php"); ?><h1>Admin: TYPE Content Edit</h1><p><B>You may edit these main types of pages within the site.</B></p><table border=1 width=80%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM subcategory order by subcategoryid"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $subcategoryid=$myrow["subcategoryid"];					   $subcategoryname=$myrow["subcategoryname"];echo "<td>Type Name: <b>$subcategoryname</b></td>";echo "<td>ID: $subcategoryid</td>";
echo "<td><form method=post action=update.php><input type=hidden name=subcategoryid value=$subcategoryid><input type=submit name=submit value=update></form></td>";echo "</tr>";}$e++; ?></table><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>