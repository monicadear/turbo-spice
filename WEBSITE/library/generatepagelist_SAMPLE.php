
/// CATEGORY  = NOTICE

$category2subbergeneratesample=$myrowsubbergeneratesample["category2"];	




echo "          <ul>\n";


$dbtrigen = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$pagecategorytrigen=$myrowtrigen["category"];	


echo "            <LI>";
echo "<a href=/pages/main.php?pageid=$idtrigen&pagecategory=$pagecategorytrigen>$navtitletrigen</a>";
echo "</LI>\n";

$p++;
}


echo "          </ul>\n";





echo "     </LI>\n\n";


