<?
/**
 * updatemylisting.php
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

<div id=memberdetails>

<h1>Update my Information</h1>

<?
if($session->logged_in){
include ("libraryprofile.php");
}
?>



<FORM method=post action="updatemylistingnow.php">

Enter your e-mail address so we may verify the change to this listing:<BR>
<input type=text size=30 name=emailtopass value="<?echo "$emailtopass";?>">
<input type=hidden name=id value="<?echo "$id";?>">

<input type=submit value=update name=submit>

</form>


</div>

<!-- end of page content -->

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>