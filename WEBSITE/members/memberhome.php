<?
/**
 * Memberhome.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>


<? include ("../codes/functions.php"); ?>

<? include ("../codes/adminconfig.php"); ?>




<?
if ($pageid == "") 
{
$pageid="76";
}
 ?>



<?$dbpagecontent = "pagecontent";$query1pagecontent = "select * from $dbpagecontent where id = '$pageid'";?><? include ("../pages/exclusions.php"); ?>




<? include ("pagepartialb.php"); ?>




<? include ("../pages/exclusionsbottom.php"); ?>





<?php include ("../library/myfooter.php"); ?>