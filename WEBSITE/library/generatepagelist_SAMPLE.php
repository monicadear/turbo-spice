<ul><?
/// CATEGORY  = NOTICE
$dbsubbergeneratesample = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querysubbergeneratesample= "SELECT id, titleshow, category, category2, subcategory, showorder, publish FROM pagecontent where category='3' and subcategory='5' and publish='Y' order by showorder"; $sql_resultsubbergeneratesample = mysql_query($querysubbergeneratesample, $connection) or die ("Couldn't execute query. Please try again later");                 $q = 0;while ($myrowsubbergeneratesample = mysql_fetch_array($sql_resultsubbergeneratesample)){ $idsubbergeneratesample=$myrowsubbergeneratesample["id"];                   		$navtitlesubbergeneratesample=$myrowsubbergeneratesample["titleshow"];	$categorysubbergeneratesample=$myrowsubbergeneratesample["category"];	
$category2subbergeneratesample=$myrowsubbergeneratesample["category2"];	echo "<LI><a href=/pages/main.php?pageid=$idsubbergeneratesample&pagecategory=$categorysubbergeneratesample>";echo "$navtitlesubbergeneratesample";echo "</a>\n";




echo "          <ul>\n";


$dbtrigen = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querytrigen= "SELECT id, titleshow, category, category2 FROM pagecontent where category2='$category2subbergeneratesample' and subcategory='10' order by titleshow"; $sql_resulttrigen = mysql_query($querytrigen, $connection) or die ("Couldn't execute query. Please try again later");                 $p = 0;while ($myrowtrigen = mysql_fetch_array($sql_resulttrigen)){ $idtrigen=$myrowtrigen["id"];                   		$navtitletrigen=$myrowtrigen["titleshow"];	
$pagecategorytrigen=$myrowtrigen["category"];	


echo "            <LI>";
echo "<a href=/pages/main.php?pageid=$idtrigen&pagecategory=$pagecategorytrigen>$navtitletrigen</a>";
echo "</LI>\n";

$p++;
}


echo "          </ul>\n";





echo "     </LI>\n\n";$q++; 
}?></ul>


