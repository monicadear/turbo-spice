<?
/**
 * sitemap.php
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


<h1>Site Map</h1><br><div id=indent><!-- ---------- --><!-- ---------- --><table border=0><tr><td>


<?php include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM pagecontent where subcategory=1 and publish='Y' order by category"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later");                 $f = 2;while ($myrow = mysql_fetch_array($sql_result)){ $id=$myrow["id"];                   		$category=$myrow["category"];                   		$sitemaptitle=$myrow["titleshow"];	echo "<a href=main.php?pageid=$id&pagecategory=$category class=heavy>";echo "$sitemaptitle";echo "</a>\n";?>

<?php include ("../codes/adminconfig.php"); ?><ul><?$dbsubber = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querysubber= "SELECT * FROM pagecontent where category='$f' and subcategory='5'  and publish='Y' order by showorder"; $sql_resultsubber = mysql_query($querysubber, $connection) or die ("Couldn't execute query. Please try again later");                 $z = 0;while ($myrowsubber = mysql_fetch_array($sql_resultsubber)){ $idsub=$myrowsubber["id"];                   		$categorysub=$myrowsubber["category"];                   		$category2sub=$myrowsubber["category2"];                   		$sitemaptitlesub=$myrowsubber["titleshow"];	echo "<li><a href=/pages/main.php?pageid=$idsub&pagecategory=$categorysub>";echo "$sitemaptitlesub";echo "</a>\n\n";
?>

<?php include ("../codes/adminconfig.php"); ?><ul><?
$dbflyout = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $queryflyout= "SELECT id, titleshow, category, category2 FROM pagecontent where category2='$category2sub' and subcategory='10' and publish='Y' order by showorder"; $sql_resultflyout = mysql_query($queryflyout, $connection) or die ("Couldn't execute query. Please try again later");                 $m = 0;while ($myrowflyout = mysql_fetch_array($sql_resultflyout)){ $idflyout=$myrowflyout["id"];                   		$categoryflyout=$myrowflyout["category"];                   		$sitemaptitleflyout=$myrowflyout["titleshow"];	echo "     <li><a href=/pages/main.php?pageid=$idflyout&pagecategory=$categoryflyout>";echo "$sitemaptitleflyout";echo "</a>";
echo "     </li>\n\n";
$m++; }
?>
</ul>

<?

echo "</li>\n\n";





$z++; }?></ul><?$f++; }?><BR>


<?php include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM pagecontent where subcategory=2  and publish='Y' order by showorder"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrow = mysql_fetch_array($sql_result)){ $id=$myrow["id"];                   		$category=$myrow["category"];                   		$sitemaptitle=$myrow["titleshow"];	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=heavy>";echo "$sitemaptitle";echo "</a><BR>\n";}?>


</td></tr></table><!-- ---------- -->

<!-- end indent div --> </div>



<BR clear=all>

<div align=left>
<?php include ("../codes/adminconfig.php"); ?><?$dbcinq = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycinq= "SELECT * FROM pagecontent where subcategory=4 and publish='Y' order by showorder"; $sql_resultcinq = mysql_query($querycinq, $connection) or die ("Couldn't execute query. Please try again later");                 $j = 1;while ($myrowcinq = mysql_fetch_array($sql_resultcinq)){ $id=$myrowcinq["id"];                   		$category=$myrowcinq["category"];                   		$sitemaptitle=$myrowcinq["titleshow"];	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=heavy>";echo "$sitemaptitle";echo "</a><BR>\n";}?>

</div>



<BR clear=all>

<div align=left>
<?php include ("../codes/adminconfig.php"); ?><?$dbseizece = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $queryseizece= "SELECT * FROM pagecontent where subcategory=6 and publish='Y' order by showorder"; $sql_resultseizece = mysql_query($queryseizece, $connection) or die ("Couldn't execute query. Please try again later");                 $k = 1;while ($myrowseizece = mysql_fetch_array($sql_resultseizece)){ $id=$myrowseizece["id"];                   		$category=$myrowseizece["category"];                   		$sitemaptitle=$myrowseizece["titleshow"];	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=heavy>";echo "$sitemaptitle";echo "</a><BR>\n";}?>

</div>




<BR clear=all>




<BR clear=all>

<div align=left>
<?php include ("../codes/adminconfig.php"); ?><?$dbsept = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querysept= "SELECT * FROM pagecontent where subcategory=7 and publish='Y'  order by showorder"; $sql_resultsept = mysql_query($querysept, $connection) or die ("Couldn't execute query. Please try again later");                 $q = 1;while ($myrowsept = mysql_fetch_array($sql_resultsept)){ $id=$myrowsept["id"];                   		$category=$myrowsept["category"];                   		$sitemaptitle=$myrowsept["titleshow"];	echo "<a href=/members/memberhome.php?pageid=$id&pagecategory=$category class=heavy>";echo "$sitemaptitle";echo "</a><BR>\n";}?>

</div>






<!-- end of page content --><? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>