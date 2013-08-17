<?
/**
 * Main.php
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






<? include ("../codes/functions.php"); ?>



<? include ("../codes/adminconfig2.php"); ?>


<? include ("exclusions.php"); ?>


<? include ("pagepartial0.php"); ?>


<h1>Search the Website</h1>

<?

/*
* search.php
*
* Script for searching a database populated with keywords by the
* populate.php-script.

*/


if( $_POST['keyword'] )
{

   /* Set $keyword and $results, and use addslashes() to
    *  minimize the risk of executing unwanted SQL commands: */
   $keyword = addslashes( $_POST['keyword'] );
   $results = addslashes( $_POST['results'] );

$pieces = explode(" ", $keyword);

$piece1=$pieces[0];
$piece2=$pieces[1];
$piece3=$pieces[2];


if ($piece3 == "" || $piece3 == null) {
$pattern= $piece1." ".$piece2;
}

else if ($piece2 == "" || $piece2 == null) {
$pattern= $piece1;
}

else {
$pattern= $piece1." ".$piece2." ".$piece3;
}

echo "Keyword search for <b>$pattern</b>:<BR>\n";

   /* Execute the query that performs the actual search in the DB: */

$sql = "select id, title, category, text from pagecontent where text LIKE '%$pattern%'";
$sql_result =  mysql_query($sql, $connection) or die ("Couldn't execute search.");



$b=1;while ($myrow = mysql_fetch_array($sql_result)){                   $id=$myrow["id"];
                   $title=$myrow["title"];
                   $category=$myrow["category"];


echo "$b. <a href=/pages/main.php?pageid=$id&pagecategory=$category&keywords=$pattern>$title</a><BR>\n";

$b++;
}



   print "<BR><BR>If no matches found, please try again with a more narrow set of keywords.<BR>";


}


?>

<? include ("../library/searchmodule.php"); ?>

<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>