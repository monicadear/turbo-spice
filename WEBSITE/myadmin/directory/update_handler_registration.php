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
<? include ("../adminnav.php"); ?>

<?

$membersince=$_POST['membersince'];
$typeofcontact=$_POST['typeofcontact'];
$trans["javascript"] = "j_script";



$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 


<?


<? }
 ?>