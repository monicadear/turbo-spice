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

?><? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("productsmall_nav.php"); ?>

<?unset ($database);unset ($connection);unset ($db);unset ($sql);unset ($sql_result);unset ($tablebase);unset ($myrow);$enter=$_POST['enter'];if ($enter) {/*Insert into database */$title=$_REQUEST['title'];$title2=$_REQUEST['title2'];$creator=$_REQUEST['creator'];$text=$_REQUEST['text'];$moreinfo=$_REQUEST['moreinfo'];$price=$_REQUEST['price'];$author=$_REQUEST['author'];$weblink=$_REQUEST['weblink'];$showorder=$_REQUEST['showorder'];$title = htmlspecialchars("$title", ENT_QUOTES);$text = ereg_replace("\r\n\r\n", "\n<BR><BR>", $text);$text = ereg_replace("\r\n", "\n<BR>", $text);$text = htmlspecialchars("$text", ENT_QUOTES);

$moreinfo = ereg_replace("\r\n\r\n", "\n<BR><BR>", $moreinfo);$moreinfo = ereg_replace("\r\n", "\n<BR>", $moreinfo);$moreinfo = htmlspecialchars("$moreinfo", ENT_QUOTES);


$date = date("YmdHis");$author = htmlspecialchars("$author", ENT_QUOTES);

if ($weblink=="") {
$weblink = "";
}
else {$weblink = ereg_replace("http://", "", $weblink);}
?><? include ("../../codes/adminconfig2.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $sql = "insert into productsmall values ('','$date','$title','$title2','$creator','$text','$moreinfo','$price','','','$weblink','$author','$showorder')"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); mysql_close();}?><?echo "<div id=indent>";echo "<BR>Thanks for your submission, <B>$author</b>.<BR>";echo "<a href=viewall.php>click to see all product content</a><BR>";echo "<a href=input_new.php>input new product</a>";

echo "</div>";unset ($title);unset ($titleshow);unset ($text);unset ($date);unset ($author);unset ($sql);unset ($sql_result);unset ($submit_enter);unset ($db);?>

<? include ("../adminfooter.php"); ?>

<? }
?>