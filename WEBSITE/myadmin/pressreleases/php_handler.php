<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?>


<?

$startmonth=$_REQUEST['startmonth'];
$startday=$_REQUEST['startday'];
$startyear=$_REQUEST['startyear'];


$title=$_REQUEST['title'];
$webslink = "";
}
else {
$webslink = ereg_replace("http://", "", $webslink);


$dateofrelease=$startyear."".$startmonth."".$startday."090000"





<? }
?>