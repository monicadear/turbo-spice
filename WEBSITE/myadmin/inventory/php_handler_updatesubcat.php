<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

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



$productsubcategorysecid=$_POST['productsubcategorysecid'];
$productsubcategoryname=$_POST['productsubcategoryname'];
$productsubcategorytitle=$_POST['productsubcategorytitle'];


$productsubcategoryname = htmlspecialchars("$productsubcategoryname", ENT_QUOTES);
$productsubcategoryname = ereg_replace(" ", "", $productsubcategoryname);

?>


<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$sql = "insert into productsubcategory values ('','$productsubcategorysecid','$productsubcategoryname','$productsubcategorytitle','','')"; 

$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

mysql_close();




}

?>




<div id=indent>

<?

echo "<h1>Entry Confirmation: SUCCESS!</h1>";
echo "<BR>Thanks for your submission!</b>.<BR>";
echo "<b>Category:</b> $productcategoryname<BR>\n";
echo "<b>Type:</b> $productsubcategoryname<BR>\n";

unset ($productsubcategoryname);
unset ($sql);
unset ($sql_result);
unset ($submit_enter);
unset ($db);

mysql_close($connection); 


?>



<a href=/adminproducts/inventory/input_new.php>Back to Inventory: Input new piece...</a>


</div>

<? include ("../adminfooter.php"); ?>

<? }
?>
