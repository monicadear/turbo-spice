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


<?

$category=$_POST['category'];

$contact=$_POST['contact'];
$publish=$_POST['publish'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];



$today=date(Ymdhis);

<?


<? }
 ?>