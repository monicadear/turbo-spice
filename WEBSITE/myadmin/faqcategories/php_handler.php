<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->isAdmin()){
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
<? include ("faqcategorycontent_nav.php"); ?>

<?

<?

<? include ("../adminfooter.php"); ?>

<? }
?>