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
<? include ("../adminheader.php"); ?><? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("pressreleasescategorycontent_nav.php"); ?><h1>Admin: Press Release Category Content Edit</h1><p><B>You may edit these main pressrelease categories within the site.</B></p><table border=1 width=80%><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM pressreleasecategory order by categoryid"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); $e=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];					   $categoryname=$myrow["categoryname"];echo "<td>Press Release Category Name: <b>$categoryname</b></td>";echo "<td>ID: $categoryid</td>";
echo "<td><form method=post action=update.php><input type=hidden name=categoryid value=$categoryid><input type=submit name=submit value=update></form></td>";echo "<td><form method=post action=delete.php><input type=hidden name=categoryid value=$categoryid><input type=submit name=submit value=delete></form></td>";
echo "</tr>";}$e++; ?></table><?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>