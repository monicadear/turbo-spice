




<div id=topmostnavigation>

<div id=topmostnavigationinside>

<?php include ("../codes/adminconfig.php"); ?>


if ($category==$pagecategory)
{
echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category class=selected>";
}

else if ($id==$pageid) {
echo "<span class=selected>$navtitle</span>";
}

else {
echo "<a href=/pages/main.php?pageid=$id&pagecategory=$category>";
}



$category2sub=$myrowsubber["category2"];	




echo "          <ul class=showclass$counter>\n";


$dbtri = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$pagecategorytri=$myrowtri["category"];	


echo "            <LI>";
echo "<a href=/pages/main.php?pageid=$idtri&pagecategory=$pagecategorytri class=showclass$counter>$navtitletri</a>";
echo "</LI>\n";

$x++;
}


echo "          </ul>\n";





echo "     </LI>\n\n";

$counter++;
<LI class=tabsearch>
<?
include ("../library/searchmodule.php");


</div>
</div>