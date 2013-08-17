<?
/**
 * membersearchresults.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 24, 2009 by Monica Flores 10kwebdesign
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


<h1>Search the Website</h1>

<?

/*
* search.php
*

*/


function keyword2LIKEpattern($keyword)
{
        return "%". str_replace("_", "\\_", str_replace("%", "\\%", $keyword)) . "%";
}



if( $_POST['keyword'] )
{
   /* Connect to the database: */
   mysql_pconnect("LOCALHOST","TABLENAME","TABLEPASS")
       or die("ERROR: Could not connect to database!");
   mysql_select_db("TABLENAME");

   /* Get timestamp before executing the query: */
   $start_time = getmicrotime();

   /* Set $keyword and $results, and use addslashes() to
    *  minimize the risk of executing unwanted SQL commands: */
   $keyword = addslashes( $_POST['keyword'] );


$pattern=keyword2LIKEpattern($keyword);
$transpattern["\'"] = "&#039;"; 
$transpattern["&"] = "&amp;"; 
$pattern=strtr($pattern,$transpattern);
$pattern=explode(" ", $pattern);
$pattern=$pattern[0]."%".$pattern[1]."%"; // piece1



   /* Execute the query that performs the actual search in the DB: */

   $querysearch = "SELECT * from directory where publish='Y' AND firstname LIKE '$pattern' OR lastname LIKE '$pattern' OR bio LIKE 
'$pattern' order by membersince ";


$result = mysql_db_query($database, $querysearch);



   /* Get timestamp when the query is finished: */
   $end_time = getmicrotime();

   /* Present the search-results: */
   print "<h2>Search results for '".$_POST['keyword']."':</h2>\n";


$i=1;

	while($myrow = mysql_fetch_array($result)) 


   {

                   $id=$myrow["id"];	
	           $firstname=$myrow["firstname"];                   $lastname=$myrow["lastname"];				   

      print "$i. <a href='/pages/moreinfo.php?id=$id&keywords=$pattern' class=small  >$firstname $lastname</a><BR>\n";

$i++;

   }




   /* Present how long it took the execute the query: */

   print "<BR><BR>If no matches found, please <a href=/pages/searchresults.php>try again with a more narrow set of keywords</a>.<BR>";


   print "<BR><BR><BR><span class=notice>Query executed in ".(substr($end_time-$start_time,0,5))." seconds.</span>";
}


else
{
   /* If no keyword is defined, present the search page instead: */
   print "<form method='post'> Keyword: 
          <input type='text' size='20' name='keyword'>\n";
   print "Results: <select name='results'>\n";
   print "<option value='10'>10</option><option value='15'>15</option>\n";
   print "<option value='30'>30</option></select>\n";

   print "<input type='submit' value='Search'></form>\n";
}


/* Simple function for retrieving the current timestamp in microseconds: */
function getmicrotime()
{
   list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
}

?>

</div>


<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>