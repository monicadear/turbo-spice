<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



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
$title=$_POST['title'];
$description=$_POST['description'];
$author=$_POST['author'];
$showorder=$_POST['showorder'];

$picture1=$_POST['picture1'];
$picture2=$_POST['picture2'];
$picture3=$_POST['picture3'];
$picture4=$_POST['picture4'];
$picture5=$_POST['picture5'];
$picture6=$_POST['picture6'];
$picture7=$_POST['picture7'];
$picture8=$_POST['picture8'];


$title = htmlspecialchars("$title", ENT_QUOTES);
$description = htmlspecialchars("$description", ENT_QUOTES);
$description = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $description);
$description = ereg_replace("\r\n", "&lt;BR&gt;\n", $description);
$author = htmlspecialchars("$author", ENT_QUOTES);

$date = date("YmdHis");

?>

<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="allphotosextended";
$sql = "update $tablebase set date='$date', title='$title', description='$description', author='$author', showorder='$showorder'

		  where pid='$pid'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

    mysql_db_query($database,$query2);

   


mysql_close();

}
?>




<?
echo "<BR>Thanks for your update <B>$author</B>.<BR>";


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