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
<? include ("staffcategorycontent_nav.php"); ?>

<tr><td><b>staff category title:</b></td><td><input type ="text" name="categoryname" rows="1" value="<?php echo $categoryname ?>" size="50"></td></tr>

<? }
?>