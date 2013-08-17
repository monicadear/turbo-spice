




<div id=topmostnavigation>

<div id=topmostnavigationinside>
<ul id="nav">
<?php include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT id,titleshow,category FROM pagecontent where subcategory='1' and publish='Y' order by category"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later");                 $e = 1; $counter = 1;while ($myrow = mysql_fetch_array($sql_result)){ $id=$myrow["id"];                   		$navtitle=$myrow["titleshow"];	$category=$myrow["category"];	echo "     <LI class=tab$counter>\n";


if ($category==$pagecategory)
{
echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=selected>";echo "$navtitle";echo "</a>\n";
}

else if ($id==$pageid) {
echo "<span class=selected>$navtitle</span>";echo "\n";
}

else {
echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category>";echo "$navtitle";echo "</a>\n";
}


?><ul><?$dbsubber = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querysubber= "SELECT id, titleshow, category, category2, subcategory, showorder, publish FROM pagecontent where category='$e' and subcategory='5' and publish='Y' order by showorder"; $sql_resultsubber = mysql_query($querysubber, $connection) or die ("Couldn't execute query. Please try again later");                 $z = 0;while ($myrowsubber = mysql_fetch_array($sql_resultsubber)){ $idsub=$myrowsubber["id"];                   		$navtitlesub=$myrowsubber["titleshow"];	$categorysub=$myrowsubber["category"];	
$category2sub=$myrowsubber["category2"];	echo "<LI><a href=/pages/main.php?pageid=$idsub&pagecategory=$categorysub class=showclass$counter>";echo "$navtitlesub";echo "</a>\n";




echo "          <ul class=showclass$counter>\n";


$dbtri = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querytri= "SELECT id, titleshow, category, category2 FROM pagecontent where category2='$category2sub' and subcategory='10' and publish='Y' order by showorder"; $sql_resulttri = mysql_query($querytri, $connection) or die ("Couldn't execute query. Please try again later");                 $x = 0;while ($myrowtri = mysql_fetch_array($sql_resulttri)){ $idtri=$myrowtri["id"];                   		$navtitletri=$myrowtri["titleshow"];	
$pagecategorytri=$myrowtri["category"];	


echo "            <LI>";
echo "<a href=/pages/main.php?pageid=$idtri&pagecategory=$pagecategorytri class=showclass$counter>$navtitletri</a>";
echo "</LI>\n";

$x++;
}


echo "          </ul>\n";





echo "     </LI>\n\n";$z++; 
}?></ul><?echo "</LI>\n";$e++; 
$counter++;}?>
<LI class=tabsearch>
<?
include ("../library/searchmodule.php");?></LI>
</ul>

</div>
</div>
