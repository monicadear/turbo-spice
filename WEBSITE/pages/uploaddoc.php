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




<h1>Upload a Document to your Profile</h1>

<?
if($session->logged_in){
include ("libraryprofile.php");
}


<? 
if($session->logged_in){
?>

Description of file:<BR><textarea name='text' rows=2 cols=40><?echo"$text";?></textarea><BR><BR>
Enter the weblink for this document:<input type='text' name='weblink' value='<?echo"$weblink";?>' size='30'><BR>(e.g. http://www.google.com/mylink.html)<BR>
<b>Category:</b><select name="category"><option></option>
<BR>

<b>Subcategory:</b><select name="subcategory"><option></option>
<BR>

<input type="checkbox" value="Y" name="publish" checked onClick="if (this.checked) this.form.publish.value=this.value; else this.form.publish.value='N'"> <span class=smaller>Check to include this resource in the live listings.</span><BR>

<input type="checkbox" value="1" name="evt_type" checked onClick="if (this.checked) this.form.evt_type.value=this.value; else this.form.evt_type.value='0'"> <span class=smaller>Only members may view this.</span><BR><BR>

Tags: <input type='text' name='tags' value='<?echo"$tags";?>' size='40'><BR>(add some descriptive tags, using commas to separate)<BR><BR>

Choose a .JPG or .GIF or .PDF file from your hard drive.<BR>
<span class=smaller>Recommended image size is 800x800 maximum.</span><BR>
File Upload:<BR>
<? $id=$_REQUEST['id'] ?>

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