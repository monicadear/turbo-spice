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
unset ($database);
unset ($connection);
unset ($db);
unset ($sql);
unset ($sql_result);
unset ($tablebase);
unset ($myrow);

$submit_enter=$_POST['submit_enter'];



if ($submit_enter) {

/*Insert into database */


$title=$_POST['title'];
$description=$_POST['description'];
$author=$_POST['author'];
$showorder=$_POST['showorder'];


$title = htmlspecialchars("$title", ENT_QUOTES);
$description = ereg_replace("\r\n\r\n", "\n<BR><BR>", $description);
$description = ereg_replace("\r\n", "\n<BR>", $description);
$description = htmlspecialchars("$description", ENT_QUOTES);
$date=date(Ymdhis);

?>


<? include ("../../codes/adminconfig2.php"); ?>


<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "insert into allphotosextended values ('','$date','1','1','$title','$description','$author','comingsoon.jpg','comingsoon.jpg','','','','','','','','','','','','','','','','$showorder')"; 

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

mysql_close();




unset ($category);
unset ($subcategory);
}

?>





<?

echo "<div id=indent>";
echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "<a href=viewall.php>click to view all page content</a><BR>";
echo "<a href=input_new.php>input new page</a>";



echo "</div>";

unset ($title);
unset ($description);
unset ($date);
unset ($author);
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);

?>

<? include ("../adminfooter.php"); ?>

<? }
?>