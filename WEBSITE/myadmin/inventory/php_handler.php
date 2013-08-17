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
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include("inventorynav.php");?>

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



$supercategory=$_POST['menuTopics'];
$category=$_POST['menuSubjects'];
$type=$_POST['menuFiles'];

$title=$_POST['title'];
$description=$_POST['description'];
$stackorder=$_POST['stackorder'];



$publishedbox=$_POST['publishedbox'];


$title = htmlspecialchars("$title", ENT_QUOTES);
$description = ereg_replace("\r\n\r\n", "\n<BR><BR>", $description);
$description = ereg_replace("\r\n", "\n<BR>", $description);
$description = htmlspecialchars("$description", ENT_QUOTES);
$dateupdated = date("YmdHis");
$author = htmlspecialchars("$author", ENT_QUOTES);

?>


<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "insert into allproducts values ('','$dateupdated','$supercategory','$category','$type','$title','$description','$author','','$stackorder','$publishedbox')"; 


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 


mysql_close();




}

?>




<div id=indent>

<?

echo "<h1>Entry Confirmation: SUCCESS!</h1>";
echo "<BR><b>Thanks for your submission!</b>.<BR>";
echo "<span class=red>Category:</span> $category<BR>\n";
echo "<span class=red>Type:</span> $type<BR>\n";
echo "<span class=red>Title of item:</span> $title<BR>\n";
echo "<span class=red>Description:</span> $description<BR>\n";
echo "<span class=red>Stack Order?:</span> $stackorder<BR>\n";
echo "<span class=red>Published?:</span> $publishedbox<BR>\n";

unset ($title);
unset ($description);
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);

mysql_close($connection); 


?>



<? include ("../../codes/adminconfig.php"); ?>


<?php
$dbpropic = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$tablebasepropic="allproducts";
$sqlcountpropic= "SELECT * FROM $tablebasepropic ORDER BY productid DESC LIMIT 1"; 
$sql_countresultpropic = mysql_query($sqlcountpropic, $connection) or die ("Couldn't execute query"); 
$totalrowspropic = mysql_num_rows($sql_countresultpropic); 

$t=0;

while ($myrowpropic = mysql_fetch_array($sql_countresultpropic)){ 

                   $productid=$myrowpropic["productid"];				         $pictabledescription=$myrowpropic["description"];			         $pictablename=$myrowpropic["name"];					   

echo "<br clear=all>\n";
echo "<form method=post action=product_enter_file.php>add a file? <input type=hidden name=productid value=$productid><input type=submit name=submit value='add file'></form><BR>\n";



echo "<BR><BR>";
echo "<hr><a href=input_new.php>Enter new resource.</a><BR>";
echo "<a href=viewall.php>View all resources.</a><BR>";



$t++;

} 



?>







</div>


<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
