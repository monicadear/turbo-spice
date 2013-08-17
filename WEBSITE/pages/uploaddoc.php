<?
/**
 * uploaddoc.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 by Monica Flores 10kwebdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>



<? include ("exclusions.php"); ?>

<? include ("pagepartial0.php"); ?>




<h1>Upload a Document to your Profile</h1><?php//global variables //$my_max_file_size 	= "1024000"; # in bytes$image_max_width	= "1000";$image_max_height	= "1000";?><div id=memberdetails>

<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>

<? 
if($session->logged_in){
?>
<form enctype='multipart/form-data' method='post'  action='uploaddoc_handler.php'>Title of file: <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR>(e.g. My Story, by Jane Doe)<BR>
Description of file:<BR><textarea name='text' rows=2 cols=40><?echo"$text";?></textarea><BR><BR>
Enter the weblink for this document:<input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR>(e.g. http://www.google.com/mylink.html)<BR>
<b>Category:</b><select name="category"><option></option><? include ("../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="documentcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value='$categoryid'>$categoryname</option>\n";$c++;}?></select>
<BR>

<b>Subcategory:</b><select name="subcategory"><option></option><?include("../codes/adminconfig.php");/*Search database for item*/$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase2="documentsubcategory";$sql2 = "SELECT * FROM $tablebase2 ORDER BY subcategoryid ASC"; $sql_result2 = mysql_query($sql2, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow2 = mysql_fetch_array($sql_result2)){                    $subcategoryid=$myrow2["subcategoryid"];                   $subcategoryname=$myrow2["subcategoryname"];echo "<option value=$subcategoryid>$subcategoryname</option>\n";$d++;}?></select>
<BR>

<input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> <span class=smaller>Check to include this resource in the live listings.</span><BR>

<input type="checkbox" value="1" name="evt_type" checked onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> <span class=smaller>Only members may view this.</span><BR><BR>

Tags: <input type='text' name='tags' value='<?echo"$tags";?>' size='40'><BR>(add some descriptive tags, using commas to separate)<BR><BR>

Choose a .JPG or .GIF or .PDF file from your hard drive.<BR>
<span class=smaller>Recommended image size is 800x800 maximum.</span><BR>
File Upload:<BR><input type='file' name='filename' size='18'><BR>
<? $id=$_REQUEST['id'] ?><input type='hidden' name='id' value='<?echo"$id";?>'><input type='submit' name='enter' value='submit'></form></div>
<!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><?
}
else
{
echo "You must be logged-in.";
}

?>
</div>

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>