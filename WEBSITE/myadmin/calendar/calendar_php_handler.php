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
<? include ("../../codes/functions.php"); ?>

<?
$contact=$_POST['contact'];
$website=$_POST['website'];
$publish=$_POST['publish'];
$evt_type=$_POST['evt_type'];
$tags=$_POST['tags'];
?>
$enddate=$endyear."-".$endmonth."-".$endday;

if ($enddate =="0000-00-00" || $enddate=="$startyear-Month-Day" || $enddate==null || $enddate=="$endyear-Month-Day") {
$enddate="$startdate";
}

else {
$enddate=$endyear."-".$endmonth."-".$endday;
}

$title = ereg_replace("'", "&#39;", $title);

$website = ereg_replace("http://", "", $website);




echo "<h2>$title</h2>";

<?



<? }
 ?>