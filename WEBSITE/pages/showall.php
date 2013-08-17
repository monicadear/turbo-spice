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




<? include ("../codes/adminconfig.php"); ?>



<?

echo "<div id=sidebar>\r\n";

include ("../library/loggedinmessage.php");


include ("../library/searchmodule.php");
echo "</div>\r\n\r\n";

?>

<?
$pageid=$_REQUEST['pageid'];
$category=$_REQUEST['category'];
$category2=$_REQUEST['category2'];
$category3=$_REQUEST['category3'];

$phrasetoshow=$_REQUEST['phrasetoshow'];

$phrasetodisplay=urldecode($phrasetoshow);
?>


<?
echo "<div id=pagecontentindent>\r";

echo "<div id=pagecontentindenttext>\r";


echo "Page search for: <strong>$phrasetodisplay</strong><BR><BR>\n";

echo "<a name=top></a>\r";

echo "Related Pages:<BR>\n";

?>



<?
$dbpagecontent = "pagecontent";

if (isset($showbysample) && $showbysample==1) {
$query1pagecontent = "select id, category, category2, category3, subcategory, titleshow from $dbpagecontent where category=$category";

}

if (isset($showbysample) && $showbysample==2) {
$query1pagecontent = "select id, category, category2, category3, subcategory, titleshow from $dbpagecontent where category2=$category2";

}

if (isset($showbysample) && $showbysample==3) {
$query1pagecontent = "select id, category, category2, category3, subcategory, titleshow from $dbpagecontent where category3=$category3";
}

else {
$query1pagecontent = "select id, category, category2, category3, subcategory, titleshow from $dbpagecontent where category=1";

}


$result1pagecontent = mysql_db_query($database, $query1pagecontent);while($rowpc = mysql_fetch_object($result1pagecontent)) {$transpc["&amp;"] = "&"; $transpc["&#039;"] = "'";$transpc["&quot;"] = "'";$transpc["&lt;"] = "<";$transpc["&gt;"] = ">";


$titlepc = strtr($rowpc->titleshow, $transpc);$id = $rowpc->id;$category = $rowpc->category;$subcategory = $rowpc->subcategory;$date = $rowpc->date;

$m=0;



	if ($subcategory==1) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level1display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==2) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level2display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==4) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level4display>$titlepc</a><BR>\r";
	}


	else if ($subcategory==5) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level5display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==6) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level6display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==7) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level7display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==10) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level10display>$titlepc</a><BR>\r";
	}

	else if ($subcategory==11) {
	echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=level11display>$titlepc</a><BR>\r";
	}


}

$m++;
?>



<BR><BR><BR><BR>
<div align=center>
[<a href=#top>back to the top</a>]
</div>
<BR>



</div></div>


<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>