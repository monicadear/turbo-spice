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
<tr><td align="right">PUBLISHED to the site?</td><td>
<input type="radio" value="N" name="publish"> Check to HIDE this from the live listings. <BR>
</td></tr>



<tr><td>MEMBERS-ONLY content<BR>?</td><td>
<input type="radio" value="1" name="evt_type"> Check for MEMBERS-ONLY view.<BR>
</td></tr>

<tr><td>Tags:</td><td>
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>


<tr><td width=85><b>category:</b></td><td><select name="category"><option></option>
<tr><td><b>subcategory:</b></td><td><select name="subcategory"><option></option>



<? }
 ?>