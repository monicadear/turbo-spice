<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->isAdmin()){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("faqcategorycontent_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$submit_enter=$_POST['submit_enter'];if ($delete) {/*Insert into database */$categoryid=$_POST['categoryid'];
$categoryname=$_POST['categoryname'];?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "delete from faqcategory where categoryid='$categoryid'"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>That category was deleted.<BR>";
echo "<a href=viewall.php>click to view all categories</a><BR>";echo "<a href=input_new.php>input new category</a>";echo "</div>";unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<?mysql_free_result($db); mysql_close($connection); ?>


<? include ("../adminfooter.php"); ?>

<? }
?>