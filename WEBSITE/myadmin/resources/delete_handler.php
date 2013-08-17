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
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("resourcecontent_nav.php"); ?>

<?
$update=$_POST['update'];
$id=$_POST['id'];

if ($update) {
/*Insert into database */

?>

<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="resources";
$sql = "delete from $tablebase

		  where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

    mysql_db_query($database,$query2);

   


mysql_close();

}
?>


<?
echo "<BR>This link was deleted.<BR>";

echo "<p align=center><font size=+2><a href=viewallresources.php>see all links...</a></p>";


unset ($date);
unset ($title);
unset ($text);

unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);
?>

<? include ("../adminfooter.php"); ?>

<? }
?>