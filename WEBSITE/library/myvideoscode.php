


<?


$dbshowtags = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalogshowtags= "SELECT * FROM videocategory order by showorder"; $sql_resultcatalogshowtags = mysql_query($querycatalogshowtags, $connection) or die ("Couldn't execute query. Please try again later");                 $n = 1;while ($myrowcatalogshowtags = mysql_fetch_array($sql_resultcatalogshowtags))
{ 
$cattitleshowtags=$myrowcatalogshowtags["categoryname"];	
echo "<a href=#$cattitleshowtags>$cattitleshowtags</a> &#124; \n\n";
$n++;
}


echo "<BR><BR><table border=0>\n";

$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $querycatalog= "SELECT * FROM videocategory order by showorder"; $sql_resultcatalog = mysql_query($querycatalog, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 1;while ($myrowcatalog = mysql_fetch_array($sql_resultcatalog))
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	
echo "<tr><td><a name=$cattitle></a><h2 class=sponsors>$cattitle</h2></td></tr>\n";

 include ("../codes/adminconfig.php"); 

$dbvideos = "videos";$queryvideos = "select * from $dbvideos where category=$categoryid order by showorder";$sql_resultvideos = mysql_query($queryvideos, $connection) or die ("Couldn't execute query. Please try again later"); $j=0;while ($myrowvideos = mysql_fetch_array($sql_resultvideos)){                    $titlevideos=$myrowvideos["title"];                   $textvideos=$myrowvideos["text"];                   $picture1videos=$myrowvideos["picture1"];                   $weblinkvideos=$myrowvideos["weblink"];$transvideos["&amp;"] = "&"; $transvideos["&#039;"] = "'";$transvideos["&lt;"] = "<";$transvideos["&gt;"] = ">";$transvideos["&lt;input"] = "input_";$textvideos = strtr($textvideos,$transvideos); $titlevideos = strtr($titlevideos, $transvideos);$weblinkvideosshow = "http://"."".$weblinkvideos;

echo "<tr>\n";if ($picture1videos == ""){echo "<td valign=top><div align=center><a name=$titlevideos></a><h3>$titlevideos</h3></div></td>\n";}else {echo "<td valign=top><div align=center><a name=$titlevideos></a><h3>$titlevideos</h3><a href=$weblinkvideosshow target=new><img src=/resourceimages/$picture1videos width=300 border=0 class=pretty></a></div></td>\n";}
echo "</tr>\n\n";
echo "<tr>\n";
echo "<td valign=top>\n";

echo "<div id=indent>\n";
if ($weblinkvideos !== ""){
echo "<a href=$weblinkvideosshow class=heavy target=new>$weblinkvideosshow</a><BR>\n";
}
else {
echo "";
}
echo "$textvideos\n";echo "</div>\n";
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
