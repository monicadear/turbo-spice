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
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?>
Description of file:<BR><textarea name='text' rows=2 cols=40><?echo"$text";?></textarea><BR><BR>
Enter the weblink, if any, that this document will link to:<input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'>(e.g. http://www.google.com)<BR>
<b>Category:</b><select name="category"><option></option>
<BR>

<b>Subcategory:</b><select name="subcategory"><option></option>
<BR>

<input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> <span class=smalladmintext>Check to include this resource in the live listings.</span><BR>

<input type="checkbox" value="1" name="evt_type" onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> <span class=smalladmintext>Check for MEMBERS-ONLY view.</span><BR><BR>

Tags: 
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"> <span class=smalladmintext>(add some descriptive tags, using commas to separate)</span><BR>


Choose a file, such as a .JPG or .GIF or .PDF file, from your hard drive.<BR>
<span class=smalladmintext>Recommended image size is 800x800 maximum.</span><BR><BR>
File Upload:<BR>

<? }
?>