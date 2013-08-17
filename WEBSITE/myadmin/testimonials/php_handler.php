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



$text=$_POST['text'];
$author=$_POST['author'];
$location=$_POST['location'];
$showorder=$_POST['showorder'];

$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);
$text = ereg_replace("\r\n", "\n<BR>", $text);
$text = htmlspecialchars("$text", ENT_QUOTES);
$date = date("YmdHis");
$author = htmlspecialchars("$author", ENT_QUOTES);


?>


<? include ("../../codes/adminconfig2.php"); ?>


<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "insert into testimonialcontent values ('','$date','$text','$author','$location','$showorder')"; 

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

mysql_close();




unset ($category);
unset ($subcategory);
}

?>



<?

echo "<div id=indent>";
echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";
echo "<a href=viewall.php>click to view all testimonial content</a><BR>";
echo "<a href=input_new.php>input new testimonial</a>";



echo "</div>";

unset ($title);
unset ($titleshow);
unset ($text);
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