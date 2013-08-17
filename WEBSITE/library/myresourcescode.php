<BR><hr><BR><?


$dbshowtags = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalogshowtags= "SELECT * FROM linkcategory order by showorder"; $sql_resultcatalogshowtags = mysql_query($querycatalogshowtags, $connection) or die ("Couldn't execute query. Please try again later");                 $n = 1;while ($myrowcatalogshowtags = mysql_fetch_array($sql_resultcatalogshowtags))
{ 
$cattitleshowtags=$myrowcatalogshowtags["categoryname"];	
echo "<a href=#$cattitleshowtags>$cattitleshowtags</a> &#124; \n\n";
$n++;
}


echo "<BR><BR><table border=0>\n";

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM linkcategory order by showorder"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<tr><td><a name=$cattitle></a><h2 class=sponsors>$cattitle</h2></td></tr>\n";

 include ("../codes/adminconfig.php"); 

$dbresources = "resources";$queryresources = "select * from $dbresources where category=$categoryid order by showorder";$sql_resultresources = mysql_query($queryresources, $connection) or die ("Couldn't execute query. Please try again later"); $j=0;while ($myrowresources = mysql_fetch_array($sql_resultresources)){                    $titleresources=$myrowresources["title"];                   $textresources=$myrowresources["text"];                   $picture1resources=$myrowresources["picture1"];                   $weblinkresources=$myrowresources["weblink"];$transresources["&amp;"] = "&"; $transresources["&#039;"] = "'";$transresources["&lt;"] = "<";$transresources["&gt;"] = ">";$transresources["&lt;input"] = "input_";$textresources = strtr($textresources,$transresources); $titleresources = strtr($titleresources, $transresources);$weblinkresourcesshow = "http://"."".$weblinkresources;

echo "<tr>\n";if ($picture1resources == ""){echo "<td valign=top><div align=center><a name=$titleresources></a><h3>$titleresources</h3></div></td>\n";}else {echo "<td valign=top><div align=center><a name=$titleresources></a><h3>$titleresources</h3><a href=$weblinkresourcesshow target=new><img src=/resourceimages/$picture1resources width=300 border=0 class=pretty></a></div></td>\n";}
echo "</tr>\n\n";
echo "<tr>\n";
echo "<td valign=top>\n";

echo "<div id=indent>\n";
if ($weblinkresources !== ""){
echo "<a href=$weblinkresourcesshow class=heavy target=new>$weblinkresourcesshow</a><BR>\n";
}
else {
echo "";
}
echo "$textresources\n";echo "</div>\n";
echo "<BR><HR width=85% color=#CCCCCC>\n";
echo "</td>\n";echo "</tr>\n\n";echo "<tr><td></td></tr>\n\n";}$j++; 
?>

<?
echo "<tr><td>\n";
echo "<div align=right>\n";
echo "<a href=#top>top of page</a>\n\n";
echo "</div></td></tr>\n";
}
$g++;
?>



</table>
