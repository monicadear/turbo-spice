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
<? include ("downloads_nav.php"); ?><h1>Admin: Upload Content Edit</h1><p><B>You may edit these downloads within the site.</B></p><?php//global variables //$my_max_file_size 	= "31024000"; # in bytes$image_max_width	= "4000";$image_max_height	= "4000";?><form enctype='multipart/form-data' method='post'  action='upload_handler.php'>Title of file: <input type='text' name='title' value='<?echo"$title";?>' size='18'>(e.g. My Story, by Jane Doe)<BR>
Description of file:<BR><textarea name='text' rows=2 cols=40><?echo"$text";?></textarea><BR><BR>
Enter the weblink, if any, that this document will link to:<input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'>(e.g. http://www.google.com)<BR>
<b>Category:</b><select name="category"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="documentcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value='$categoryid'>$categoryname</option>\n";$c++;}?></select>  <a href=../documentcategories/viewall.php target=new>edit category</a>
<BR>

<b>Subcategory:</b><select name="subcategory"><option></option><?include("../../codes/adminconfig.php");/*Search database for item*/$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase2="documentsubcategory";$sql2 = "SELECT * FROM $tablebase2 ORDER BY subcategoryid ASC"; $sql_result2 = mysql_query($sql2, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow2 = mysql_fetch_array($sql_result2)){                    $subcategoryid=$myrow2["subcategoryid"];                   $subcategoryname=$myrow2["subcategoryname"];echo "<option value=$subcategoryid>$subcategoryname</option>\n";$d++;}?></select>  <a href=../documentsubcategories/viewall.php target=new>edit subcategory</a>
<BR>

<input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> <span class=smalladmintext>Check to include this resource in the live listings.</span><BR>

<input type="checkbox" value="1" name="evt_type" onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> <span class=smalladmintext>Check for MEMBERS-ONLY view.</span><BR><BR>

Tags: 
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"> <span class=smalladmintext>(add some descriptive tags, using commas to separate)</span><BR>


Choose a file, such as a .JPG or .GIF or .PDF file, from your hard drive.<BR>
<span class=smalladmintext>Recommended image size is 800x800 maximum.</span><BR><BR>
File Upload:<BR><input type='file' name='filename' size='18'><BR><input type='hidden' name='id' value='<?echo"$id";?>'><input type='submit' name='enter' value='submit'></form><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><? include ("../adminfooter.php"); ?>

<? }
?>