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
<? $dbstaff = "staff"; ?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>

<?
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	

?>

<?
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 
echo "<b>$firstname $lastname</b></td>";
echo "<td valign=top><i>$title:</i></td>\n";

echo "<td valign=top>";
echo "<a href=delete_picture.php?aid=$aid>delete pic?</a>";

echo "</td>";


}
$g++;


?>







<hr>
<span class=red>NOT CATEGORIZED!</span><BR>

<? include ("../../codes/adminconfig.php"); ?>
echo "$firstname $lastname, ";
echo "$titlenot: ";
echo "<form method=post action=update.php><input type=hidden name=aid value=$aidnot><input type=submit name=submit value=update></form><form method=post action=delete_staff.php><input type=hidden name=aid value=$aidnot><input type=submit name=submit value=delete></form><BR>";

}
$z++;
?>





<? }
?>