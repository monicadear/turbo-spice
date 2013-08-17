<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";

include ("../../library/logmein_members.php"); 


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
<? include ("allphotos_nav.php"); ?>

<?
$update=$_POST['update'];

if ($update) {
/*Insert into database */


$pid=$_POST['pid'];
$picture4description=$_POST['picturedescription'];
$picture4description = htmlspecialchars("$picture4description", ENT_QUOTES);
$picture4description = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $picture4description);
$picture4description = ereg_replace("\r\n", "&lt;BR&gt;\n", $picture4description);

$date = date("YmdHis");

?>

<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="allphotosextended";
$sql = "update $tablebase set date='$date', picture4description='$picture4description'

		  where pid='$pid'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

    mysql_db_query($database,$query2);

   


mysql_close();

}
?>




<?
echo "<BR>Thanks for your update.<BR>";


echo "<p align=center><font size=+2><a href=viewall.php>see all photo galleries...</a></p>";


unset ($date);
unset ($title);
unset ($description);

unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);
?>

<? include ("../adminfooter.php"); ?>

<? }
?>