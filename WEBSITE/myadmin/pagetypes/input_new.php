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
<? include ("subcategorycontent_nav.php"); ?>

<tr><td><b>type title:</b></td><td><input type ="text" name="subcategoryname" rows="1" value="<?php echo $subcategoryname ?>" size="50"></td></tr>

<? }
?>