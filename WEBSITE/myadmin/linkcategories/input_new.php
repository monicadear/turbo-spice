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

<? include ("../adminheader.php"); ?>
<? include ("linkcategorycontent_nav.php"); ?>

<tr><td><b>link category title:</b></td><td><input type ="text" name="categoryname" rows="1" value="<?php echo $categoryname ?>" size="50"></td></tr>

<tr><td><b>display order:</b></td><td><input type ="text" name="showorder" rows="1" value="<?php echo $showorder ?>" size="5"></td></tr>

<tr><td colspan=2><input type="submit" name="submit_enter" value="submit"> 
(press only once)

<? }
?>