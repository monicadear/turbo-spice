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
<? include ("pressreleasescategorycontent_nav.php"); ?>

<tr><td><b>category title:</b></td><td><input type ="text" name="categoryname" rows="1" value="<?php echo $categoryname ?>" size="50"></td></tr>

<? }
?>