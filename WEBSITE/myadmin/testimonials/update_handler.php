<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 


}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?>
<? include ("testimonialcontent_nav.php"); ?>

<?
$update=$_POST['update'];

if ($update) {
/*Insert into database */


$id=$_POST['id'];
$text=$_POST['text'];
$author=$_POST['author'];
$location=$_POST['location'];
$showorder=$_POST['showorder'];

$text = ereg_replace("<BR>", "&lt;BR&gt;\n", $text);

$text = htmlspecialchars("$text", ENT_QUOTES);
$text = ereg_replace("\r\n\r\n", "&lt;BR&gt;&lt;BR&gt;\n", $text);
$text = ereg_replace("\r\n", "&lt;BR&gt;\n", $text);
$author = htmlspecialchars("$author", ENT_QUOTES);

$date = date("YmdHis");

?>

<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebase="testimonialcontent";
$sql = "update $tablebase set date='$date', text='$text', author='$author', location='$location',showorder='$showorder'

		  where id='$id'";

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

    mysql_db_query($database,$query2);

   


mysql_close();

}
?>



<?
echo "<BR>Thanks for your update <B>$author</B>.<BR>";



echo "<p align=center><font size=+2><a href=viewall.php>see all testimonials...</a></p>";


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