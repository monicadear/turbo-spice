<?
/**
 * directory.php
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




<h1>Member Directory</h1>
<? include ("../library/searchmembersmodule.php"); ?>
<? include ("../library/mymemberdirectorycode.php"); ?>
</div>


<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>